@extends('components.main')

@section('content')
    <form action="{{ route('instructors.filter') }}" method="get" class="row p-3">
        @csrf
        <div class="col-md-6">
            <label for="ini">Data inicial</label>
            <input type="date" id="ini" name="start" class="form-control form-control-lg"
                @if ($errors->any()) value="{{ old('start') }}" @endif required>
        </div>
        <div class="col-md-6">
            <label for="end">Data final</label>
            <input type="date" id="end" name="end" class="form-control form-control-lg"
                @if ($errors->any()) value="{{ old('end') }}" @endif required>
        </div>
        @if (Auth::user()->is_admin == (1 || 2))
            <div class="col-md-3">
                <label for="">Instrutor</label>
                <input type="text" id="employee" name="employee" class="form-control form-control-lg"
                    placeholder="Código">
            </div>
            <div class="col-md-9">
                <label for="employeeAuto"></label>
                <input type="text" id="employeeAuto" class="form-control form-control-lg" placeholder="Nome" disabled>
            </div>
            <div class="col-md-3">
                <label for="">Motorista</label>
                <div class="col">
                    <input type="text" id="driver" name="driver" class="form-control form-control-lg"
                        placeholder="Código">
                </div>
            </div>
            <div class="col-md-9">
                <label for="driverAuto"></label>
                <input type="text" id="driverAuto" class="form-control form-control-lg" placeholder="Nome" disabled>
            </div>
        @endif
        <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
        </div>
    </form>
@endsection
