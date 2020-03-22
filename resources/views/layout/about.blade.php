@extends('layout.layout')

@section('navbar') 
  @parent
@endsection


@section('sidebar')
  
@endsection

@section('content')
  <div class="jumbotron">
    @foreach($info as $k)
      <h2 class="blog-post-title">{{ $k->name }}</h2>
      {!! $k->text !!}
    @endforeach
  </div>
@endsection