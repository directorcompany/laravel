@extends('layouts.app')
@section('content')
 <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Список заявок</h3>
            </div>
           
        </div>
    </div>
@if($message= Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table  table-hover table-bordered">
    <thead class="table-light text-center">
        <th scope="col">#</th>
        <th scope="col">Тема</th>
        <th scope="col">Сообщение</th>
        <th scope="col">Имя клиента</th>
        <th scope="col">Почта клиента</th>
        <th scope="col">Файл</th>
        <th scope="col">Время</th>
        <th scope="col">Статус</th>
    </thead>
    <tbody>
        @foreach($applied as $apply)
        <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$apply->title}}</td>
            <td>{{$apply->message}}</td>
            <td>{{\App\Models\User::find($apply->user_id)->name}}</td>
            <td>{{\App\Models\User::find($apply->user_id)->email}}</td>
            <td><a href="{{asset('/public/uploads')}}/{{$apply->file}}">{{$apply->file}}</a></td>
            <td>{{$apply->created_at}}</td>
            <td class="text-center"><a href="{{route('update',$apply->id)}}" class="btn btn-{{$apply->status ? 'success' : 'primary'}}">{{$apply->status ? 'Отмечено' : 'Ответил' }}</a></td>
        </tr>
        @endforeach
    </tbody>

</table>


    {!! $applied->links('vendor.pagination.bootstrap-4') !!}
@endsection