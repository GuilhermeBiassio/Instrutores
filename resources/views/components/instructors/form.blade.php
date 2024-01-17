@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="p-3" method="post" action="{{ $action }}">
    @csrf
    @isset($dados)
        @method('PUT')
    @endisset

    <div class="mb-3 input-group-lg">
        <label for="status" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data_instrucao"
            @isset($dados) value="{{ $dados->data_instrucao }}"  @endisset
            @if ($errors->any()) value="{{ old('data_instrucao') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status"
            @isset($dados) value="{{ $dados->status }}" @endisset
            @if ($errors->any()) value="{{ old('status') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="motorista" class="form-label">Motorista</label>
        <input type="text" class="form-control" id="motorista" name="motorista"
            @isset($dados) value="{{ $dados->motorista }}" @endisset
            @if ($errors->any()) value="{{ old('motorista') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="carro" class="form-label">Carro</label>
        <input type="text" class="form-control" id="carro" name="carro"
            @isset($dados) value="{{ $dados->carro }}" @endisset
            @if ($errors->any()) value="{{ old('carro') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="linha" class="form-label">Linha</label>
        <input type="text" class="form-control" id="linha" name="linha"
            @isset($dados) value="{{ $dados->linha }}" @endisset
            @if ($errors->any()) value="{{ old('linha') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="ini" class="form-label">Início Percurso</label>
        <input type="text" class="form-control" id="ini" name="inicio_percurso"
            @isset($dados) value="{{ $dados->inicio_percurso }}" @endisset
            @if ($errors->any()) value="{{ old('inicio_percurso') }}" @endif>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="fim" class="form-label">Final Percurso</label>
        <input type="text" class="form-control" id="fim" name="final_percurso"
            @isset($dados) value="{{ $dados->final_percurso }}" @endisset
            @if ($errors->any()) value="{{ old('final_percurso') }}" @endif>
    </div>
    <div class="form-floating mb-2">
        <textarea class="form-control" placeholder="Observações" id="obs" style="height: 200px" name="observacoes">
@isset($dados)
{{ $dados->observacoes }}
@endisset @if ($errors->any())
{{ old('observacoes') }}
@endif
</textarea>
        <label for="obs">Observações</label>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
    </div>
</form>
