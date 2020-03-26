@extends('layout.layout')

@section('navbar')

@endsection

@section('content')
  <div class="col-md-8">
    <!-- <pre>
      {{ print_r(Session::All()) }}
    </pre> -->

    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach()
        </ul>
      </div>
    @endif 

    <div class="alert alert-success">
      {{ dump(Session::all()) }}
    </div>

    <form method="POST" action="{{ route('contact') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" value="{{ old('name') }}" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" value="{{ old('email') }}" class="form-control" id="exampleFormControlInput1" placeholder="email" name="email">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">site</label>
        <input type="text" value="{{ old('site') }}" class="form-control" id="exampleFormControlInput1" placeholder="name" name="site">
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