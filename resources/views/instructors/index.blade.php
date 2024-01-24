@extends('components.main')

@section('content')

    <h3>Lista de cadastros</h3>
    @if (!$dados->isEmpty())
        <div class="accordion accordion-flush mt-3" id="accordionFlush">
            @foreach ($dados as $dado)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#id{{ $dado->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                            Data da instrução:<b>{{ date('d/m/Y', strtotime($dado->data_instrucao)) }}</b>
                        </button>
                    </h2>
                    <div id="id{{ $dado->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Data de cadastro:</b>
                                    {{ date('d/m/Y H:i', strtotime($dado->created_at)) }}</li>
                                <li class="list-group-item"><b>Instrutor:</b> {{ $dado->usuario }}</li>
                                <li class="list-group-item"><b>Status:</b> {{ $dado->status }}</li>
                                <li class="list-group-item"><b>Motorista:</b> {{ $dado->motorista }}</li>
                                <li class="list-group-item"><b>Início Percurso:</b> {{ $dado->inicio_percurso }}</li>
                                <li class="list-group-item"><b>Final Percurso:</b> {{ $dado->final_percurso }}</li>
                                <li class="list-group-item"><b>Carro:</b> {{ $dado->carro }}</li>
                                <li class="list-group-item"><b>Linha:</b> {{ $dado->linha }}</li>
                                <li class="list-group-item"><b>Obs:</b> {{ $dado->observacoes }}</li>
                            </ul>
                            @if (Auth::user()->id == $dado->usuario || Auth::user()->is_admin == 2)
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('instructors.edit', $dado->id) }}"
                                        class="btn btn-primary btn-lg align-item">Editar</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center">
            <h4>Nenhum registro...</h4>
        </div>
    @endif
@endsection
