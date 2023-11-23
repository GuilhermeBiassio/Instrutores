@extends('components.main')

@section('content')

<form action="{{ route('instrutores.index') }}" class="border-bottom" method="get">
  @csrf
  @method('GET')
  <div class="row">
    <div class="col">
      <label for="ini">Data início</label>
      <input type="date" id="ini" class="form-control form-control-lg" placeholder="Data início" aria-label="First name">
    </div>
    <div class="col">
      <label for="end">Data final</label>
      <input type="date" id="end" class="form-control form-control-lg" placeholder="Data final" aria-label="Last name">
    </div>
  </div>
  <div class="col-12 m-2">
    <button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
  </div>
</form>

@endsection