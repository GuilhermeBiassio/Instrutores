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
            @if ($errors->any()) value="{{ old('data_instrucao') }}" @endif @required(true)>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="status" class="form-label">Status</label>
        <input type="text" list="sugestions" class="form-control" id="status" name="status"
            @isset($dados) value="{{ $dados->status }}" @endisset
            @if ($errors->any()) value="{{ old('status') }}" @endif @required(true)>
        <datalist id="sugestions">
            <option value="FERIAS">
            <option value="FOLGA">
            <option value="ACOMPANHAMENTO">
        </datalist>
    </div>

    <div class="mb-3 input-group-lg">
        <label for="motorista" class="form-label">Motorista</label>
        <select class="select form-select" name="motorista" aria-label="Default select example" @required(true)>
            <option selected disabled value="">Selecione</option>
            @if (isset($drivers))
                @foreach ($drivers as $driver)
                    <option value="{{ $driver['ID_FUNCIONARIO'] }}" @if (isset($dados) && $dados->motorista == $driver['ID_FUNCIONARIO']) selected @endif
                        @if ($errors->any() && old('motorista') == $driver['ID_FUNCIONARIO'] && !isset($dados)) selected @endif>
                        {{ $driver['ID_FUNCIONARIO'] . ' - ' . $driver['NOME_FUNCIONARIO'] }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="mb-3 input-group-lg">
        <label for="carro" class="form-label">Carro</label>
        <select class="select form-select" name="carro" aria-label="Default select example" @required(true)>
            <option selected disabled value="">Selecione</option>
            @if (isset($cars))
                @foreach ($cars as $car)
                    <option value="{{ $car['idcarro'] }}" @if (isset($dados) && $dados->carro == $car['idcarro']) selected @endif
                        @if ($errors->any() && old('carro') == $car['idcarro']) selected @endif>
                        {{ $car['idcarro'] }}</option>
                @endforeach
            @endif
        </select>
    </div>


    <div class="mb-3 input-group-lg">
        <label for="linha" class="form-label">Linha</label>
        <select class="select form-select" name="linha" aria-label="Default select example" @required(true)>
            <option selected disabled value="">Selecione</option>
            @if (isset($bus_lines))
                @foreach ($bus_lines as $bus_line)
                    <option value="{{ $bus_line['ID_LINHA'] }}" @if (isset($dados) && $dados->linha == $bus_line['ID_LINHA']) selected @endif
                        @if ($errors->any() && old('linha') == $bus_line['ID_LINHA']) selected @endif>
                        {{ $bus_line['ID_LINHA'] . ' - ' . $bus_line['NOME_LINHA'] }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="mb-3 input-group-lg">
        <label for="ini" class="form-label">Início Percurso</label>
        <input type="time" class="form-control" id="ini" name="inicio_percurso"
            @isset($dados) value="{{ $dados->inicio_percurso }}" @endisset
            @if ($errors->any()) value="{{ old('inicio_percurso') }}" @endif @required(true)>
    </div>
    <div class="mb-3 input-group-lg">
        <label for="fim" class="form-label">Final Percurso</label>
        <input type="time" class="form-control" id="fim" name="final_percurso"
            @isset($dados) value="{{ $dados->final_percurso }}" @endisset
            @if ($errors->any()) value="{{ old('final_percurso') }}" @endif @required(true)>
    </div>
    <div class="form-floating mb-2">
        <textarea class="form-control" maxlength="400" placeholder="Observações" id="obs" style="height: 200px"
            name="observacoes">
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
