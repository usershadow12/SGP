@csrf
<div>
    <label for="">Diagóstico</label>
    <textarea name="diagnostico" id="" cols="30" rows="10">{{ $hconsulta->diagnostico ?? old('diagnostico') }}</textarea>
</div>
<div>
    <label for="">Exames</label>
    <textarea name="exame" id="" cols="30" rows="10">{{ $hconsulta->exame ?? old('exame') }}</textarea>
</div>
<div>
    <label for="">Observações</label>
    <textarea name="observacoes" id="" cols="30" rows="10">{{ $hconsulta->observacoes ?? old('observacoes') }}</textarea>
</div>
<input type="submit" value="ok">
