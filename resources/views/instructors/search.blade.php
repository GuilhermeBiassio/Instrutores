@extends('components.main')

@section('content')
    <form action="{{ route('instructors.filter') }}" method="get">
        @csrf
        <div class="row">
            <div class="col">
                <label for="ini">Data inicial</label>
                <input type="date" id="ini" name="start" class="form-control form-control-lg"
                    @if ($errors->any()) value="{{ old('start') }}" @endif required>
            </div>
            <div class="col">
                <label for="end">Data final</label>
                <input type="date" id="end" name="end" class="form-control form-control-lg"
                    @if ($errors->any()) value="{{ old('end') }}" @endif required>
            </div>
        </div>
        @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
            <div class="row">
                <label for="">Funcionário</label>
                <div class="col">
                    <input type="text" name="employee" class="form-control form-control-lg" placeholder="Código">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg" placeholder="Nome" disabled>
                </div>
            </div>
            <div class="row">
                <label for="">Motorista</label>
                <div class="col">
                    <input type="text" name="driver" class="form-control form-control-lg" placeholder="Código">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg" placeholder="Nome" disabled>
                </div>
            </div>
        @endif
        <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
        </div>
    </form>
@endsection
