@extends('layouts.app')

@section('content')
@auth
    <div  class="container bgcont center-block">
        <h3>Название пластинки: {{$data->name}}</h3>
        <p>Описание: {{$data->description}}</p>
        <a href="/delete/{{$data->id}}"><button class="btn btn-danger">Удалить</button></a>
    </div>
    <h1 class="blockquote text-center">Редактровать пластинку</h1>
    <form method="POST" action="{{ route('editPlate', $data->id) }}">
    @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Новое название пластинки') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}">
            </div>
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Новое описание') }}</label>
            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description"  value="{{$data->description}}">
            </div>
            <div class="col-md-6 offset-md-4">
                <a href="/edit/{{$data->id}}">
                    <button type="submit" class="btn btn-warning">
                        {{ __('Редактировать') }}
                    </button>
                </a>    
            </div>
        </div>
    </form> 
@if(session('success')) 
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@endauth
@endsection