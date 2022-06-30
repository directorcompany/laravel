@extends('layouts.app')
@section('content')
<h1 class="text-center">Обратная связь</h1>
@if($message= Session::get('success') ?? Session::get('warning'))
<div class="alert alert-{{Session::get('success') ? 'success' : 'warning'}}">
    <p>{{$message}}</p>
</div>
@endif
<div class="container">
    <form action="{{route('store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Название:</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Сообщение:</label>
            <textarea name="message" class="form-control" id="message" rows="3"></textarea>
          </div>
        <div class="mb-3">
             <label for="" class="form-label">Выберите файл: </label>
             <input name="file" class="form-control" type="file" id="picture">
        </div>
        <input type="submit" class="btn btn-primary" value="Отправить">
    </form>
</div>
@endsection