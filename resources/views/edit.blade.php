@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Game Data
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
      <form method="post" action="{{ route('cities.update', $game->ID ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">City Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $game->Name }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Countrycode :</label>
              <input type="text" class="form-control" name="countrycode" value="{{ $game->CountryCode }}"/>
          </div>
          <div class="form-group">
              <label for="cases">District :</label>
              <input type="text" class="form-control" name="district" value="{{ $game->District }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Population :</label>
              <input type="number" class="form-control" name="population" value="{{ $game->Population }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection