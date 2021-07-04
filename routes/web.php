<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\{
    AlunoController,
    CategoryController,
    DetailPlanController,
    PermissionController,
    PermissionProfileController,
    PermissionRoleController,
    PlanController,
    PlanProfileController,
    ProfileController,
    RoleController,
    RoleUserController,
    SiteController,
    SolicitationController,
    TurmaAlunoController,
    TurmaController,
    TenantController,
    UserController,
    UsersController,
};

use Illuminate\Support\Facades\Route;

//Original do laravel
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('dashboard/users/export/',  [UsersController::class, 'export']);


Route::prefix('dashboard/alunos')
    ->middleware('auth')
    ->group(function () {

        Route::put('{uuid}/update', [AlunoController::class, 'update'])->name('aluno.update');
        Route::any('{uuid}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
        Route::any('search', [AlunoController::class, 'search'])->name('alunos.search');
        Route::get('/', [AlunoController::class, 'index'])->name('alunos.index');
        Route::post('aluno', [AlunoController::class, 'store'])->name('aluno.store');
        Route::get('create', [AlunoController::class, 'create'])->name('alunos.create');
    });
/*
         Turmas
         */
Route::prefix('dashboard/turmas')
    ->middleware('auth')
    ->group(function () {

        Route::put('{id}/update', [TurmaController::class, 'update'])->name('turmas.update');
        Route::get('/alunos', [TurmaAlunoController::class, 'index'])->name('turmas.alunos');
        Route::any('{id}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
        Route::any('search', [TurmaController::class, 'search'])->name('turmas.search');
        Route::get('/', [TurmaController::class, 'index'])->name('turmas.index');
        Route::post('turmas',  [TurmaController::class, 'store'])->name('turmas.store');
        Route::get('create', [TurmaController::class, 'create'])->name('turmas.create');
        // Route::get('/{id}/delete', 'TurmaController@delete')->name('turmas.delete');

    });
/*
         Categorias
         */
Route::prefix('dashboard/')
    ->middleware('auth')
    ->group(function () {
        Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
        Route::resource('categories', CategoryController::class);
    });
/*
         Turmas Alunos
         */
Route::prefix('dashboard/alunos')
    ->middleware('auth')
    ->group(function () {

        Route::post('turmas/update/bloco', [TurmaAlunoController::class, 'update'])->name('turmas.aluno.update.bloco');
        Route::post('turmas/edit/bloco', [TurmaAlunoController::class, 'edit'])->name('turmas.aluno.edit.bloco');
        Route::post('turmas/{uuid}', [TurmaAlunoController::class, 'attachTurmasAluno'])->name('turmas.aluno.attach');
        Route::get('turmas/{uuid}/show', [TurmaAlunoController::class, 'show'])->name('turmas.aluno.show');
        Route::get('turmas/{uuid}/PdfMatricula/{id}', [TurmaAlunoController::class, 'PdfMatricula'])->name('turmas.aluno.PdfMatricula');
    });

/*
    Solicitações Alunos Transferências
     */
Route::prefix('dashboard/transferidos')
    ->middleware('auth')
    ->group(function () {

        Route::get('/alunos', [SolicitationController::class, 'index'])->name('transferencias.index');
        Route::post('/alunos/edit', [SolicitationController::class, 'edit'])->name('transferencias.edit');
        Route::put('/alunos/update', [SolicitationController::class, 'update'])->name('transferencias.update');
        Route::get('/alunos/{uuid}/delete', [SolicitationController::class, 'delete'])->name('transferencias.delete');
        Route::post('/alunos/store', [SolicitationController::class, 'store'])->name('transferencias.store');
        Route::get('/alunos/{uuid}/create/{id}', [SolicitationController::class, 'create'])->name('transferencias.create');
    });

Route::prefix('dashboard/')
    ->middleware('auth')
    ->group(function () {
        /**
         * Routes Roles
         */
        Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
        Route::resource('roles', RoleController::class);
        /**
         * Permission x Role
         */
        Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');
        Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
        Route::get('permissions/{id}/role', [PermissionRoleController::class, 'roles'])->name('permissions.roles');
        /**
         * Routes Tenants
         */
        Route::any('tenants/search', [TenantController::class, 'search'])->name('tenants.search');
        Route::resource('tenants', TenantController::class);
        /**
         * Routes Profiles
         */
        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);
        /**
         * Routes Permissions
         */
        Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);
        /*
         *Permissions x Profile
        */
        Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
        Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
        /**
         * Role x User
         */
        Route::get('users/{id}/role/{idRole}/detach', [RoleUserController::class, 'detachRoleUser'])->name('users.role.detach');
        Route::post('users/{id}/roles', [RoleUserController::class, 'attachRolesUser'])->name('users.roles.attach');
        Route::any('users/{id}/roles/create', [RoleUserController::class, 'rolesAvailable'])->name('users.roles.available');
        Route::get('users/{id}/roles', [RoleUserController::class, 'roles'])->name('users.roles');
        Route::get('roles/{id}/users', [RoleUserController::class, 'users'])->name('roles.users');
        /**
         * Routes Users
         */
        Route::any('users/search', [UserController::class, 'search'])->name('users.search');
        Route::resource('users', UserController::class);
        /*
        * Routes Plan
        */
        Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
        Route::resource('plans', PlanController::class);
        /**
         * Routes Details Plans
         */
        Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
        Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
        Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
        Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
        /**
         * Plan x Profile
         */
        Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
        Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');
    });
/**
 * Site
 */
Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class, 'index'])->name('site.home');



require __DIR__ . '/auth.php';
