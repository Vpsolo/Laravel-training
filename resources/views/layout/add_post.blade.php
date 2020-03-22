@extends('layout.layout')

@section('content')
  <div class="col-md-3">
    <h2>Добавление нового материала</h2>
  </div>

    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach()
        </ul>
      </div>
    @endif 

    @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif

  <div class="col-md-3">
    <form method="POST" action="{{ route('admin_post_p') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" value="{{ old('name') }}" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Picter</label>
        <input type="text" value="{{ old('email') }}" class="form-control" id="exampleFormControlInput1" placeholder="email" name="img">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">{{ old('text') }}</textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="form-control">
      </div>
    </form>
  </div>
@endsection