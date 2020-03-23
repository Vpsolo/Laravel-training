@extends('layout.layout')

@section('content')
  <div>
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

    <h1>Редактирование материала</h1>
    <form method="POST" action="{{ route('admin_update_post') }}">
      @cannot('update', $article)
        <div class="alert alert-danger">
          У вас нет прав
        </div>
      <!-- @else -->
      
      @endcan


    <input type="hidden" name="id" value="{{ $article->id }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" value="{{ $article->name }}" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">pictere</label>
        <input type="text" value="{{ $article->img }}" class="form-control" id="exampleFormControlInput1" placeholder="name" name="img">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">
          {{ $article->text }}
        </textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="form-control">
      </div>
    </form>
  </div>
@endsection