<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add City Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cities.store') }}">
          <div class="form-group">
              @csrf
              <label for="country_name">City Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="cases">Countrycode :</label>
              <input type="text" class="form-control" name="countrycode"/>
          </div>
          <div class="form-group">
              <label for="cases">District :</label>
              <input type="text" class="form-control" name="district"/>
          </div>
          <div class="form-group">
              <label for="cases">Population :</label>
              <input type="number" class="form-control" name="population"/>
          </div>
          <button type="submit" class="btn btn-primary">Add City</button>
      </form>
  </div>
</div>
@endsection