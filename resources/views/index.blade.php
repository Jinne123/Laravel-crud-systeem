<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>City Name</td>
          <td>Countrycode</td>
          <td>District</td>
          <td>Population</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{$game->ID}}</td>
            <td>{{$game->Name}}</td>
            <td>{{$game->CountryCode}}</td>
            <td>{{$game->District}}</td>
            <td>{{$game->Population}}</td>
            <td><a href="{{ route('cities.edit', $game->ID)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('cities.destroy', $game->ID)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection