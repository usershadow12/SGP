@csrf
<div>
    <label for="">Duração da Medicação</label>
    <input type="number" name="duracao"value={{ $prescricao->duracao ?? old('duracao') }}>
</div>
<div>
    <label for="">Descrição da Medicação </label>
    <textarea name="descricao" id="" cols="30" rows="10">{{ $prescricao->descricao ?? old('descricao') }}</textarea>
</div>
<div>
    <label for="">Indicação Especial</label>
    <textarea name="indicacao_especial" id="" cols="30" rows="10">{{ $prescricao->indicacao_especial ?? old('indicacao_especial') }}</textarea>
</div>
<input type="hidden" name="consulta_id" value="{{ $id ?? old('consulta_id') }}">
<input type="submit" value="ok">
