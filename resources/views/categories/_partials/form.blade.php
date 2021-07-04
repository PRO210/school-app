
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="CATEGORIA" class="form-control" placeholder="Nome:"  required value="{{ $category->CATEGORIA ?? old('CATEGORIA') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-dark">Enviar</button>
</div>
