@extends('components.main')

@section('content')
<form class="p-3" method="post" action="{{ route('instrutores.store') }}">
    @csrf
    <div class="mb-3 input-group-lg">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" required>        
    </div>
    <div class="mb-3 input-group-lg">
        <label for="motorista" class="form-label">Motorista</label>
        <input type="text" class="form-control" id="motorista" name="motorista" required>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="carro" class="form-label">Carro</label>
        <input type="text" class="form-control" id="carro" name="carro" required>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="linha" class="form-label">Linha</label>
        <input type="text" class="form-control" id="linha" name="linha" required>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="ini" class="form-label">Início Percurso</label>
        <input type="text" class="form-control" id="ini" name="inicio_percurso" required>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="fim" class="form-label">Final Percurso</label>
        <input type="text" class="form-control" id="fim" name="final_percurso" required>
    </div>
    <div class="form-floating mb-2">
        <textarea class="form-control" placeholder="Observações" id="obs" style="height: 200px" name="observacoes"></textarea>
        <label for="obs">Observações</label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
</form>
@endsection