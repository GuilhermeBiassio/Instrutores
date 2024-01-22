@extends('components.main')

@section('content')
    <form action="{{ route('instructors.index') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="ini">Data inicial</label>
                <input type="date" id="ini" class="form-control form-control-lg" placeholder="Data início"
                    aria-label="First name">
            </div>
            <div class="col">
                <label for="end">Data final</label>
                <input type="date" id="end" class="form-control form-control-lg" placeholder="Data final"
                    aria-label="Last name">
            </div>
        </div>
        <div class="row">
            <label for="">Funcionário</label>
            <div class="col w-100">
                <input type="text" name="employee" class="form-control form-control-lg" placeholder="Código">
            </div>
            <div class="col">
                <input type="text" class="form-control form-control-lg" placeholder="Nome" disabled>
            </div>
        </div>
        <div class="row">
            <label for="">Motorista</label>
            <div class="col w-100">
                <input type="text" name="driver" class="form-control form-control-lg" placeholder="Código">
            </div>
            <div class="col">
                <input type="text" class="form-control form-control-lg" placeholder="Nome" disabled>
            </div>
        </div>
        <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
        </div>
    </form>
@endsection
