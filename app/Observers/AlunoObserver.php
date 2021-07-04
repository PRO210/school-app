<?php

namespace App\Observers;

use App\Models\Aluno;
use Illuminate\Support\Str;

class AlunoObserver
{
    /**
     * Handle the Aluno "created" event.
     *
     * @param  \App\Models\Models\Aluno  $aluno
     * @return void
     */
    public function creating(Aluno $aluno)
    {
        $aluno->uuid = Str::uuid();
    }

    /**
     * Handle the Aluno "updated" event.
     *
     * @param  \App\Models\Models\Aluno  $aluno
     * @return void
     */
    public function updated(Aluno $aluno)
    {
        //
    }

    /**
     * Handle the Aluno "deleted" event.
     *
     * @param  \App\Models\Models\Aluno  $aluno
     * @return void
     */
    public function deleted(Aluno $aluno)
    {
        //
    }

    /**
     * Handle the Aluno "restored" event.
     *
     * @param  \App\Models\Models\Aluno  $aluno
     * @return void
     */
    public function restored(Aluno $aluno)
    {
        //
    }

    /**
     * Handle the Aluno "force deleted" event.
     *
     * @param  \App\Models\Models\Aluno  $aluno
     * @return void
     */
    public function forceDeleted(Aluno $aluno)
    {
        //
    }
}
