@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <form class="card" action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>Создать пункт меню</div>
                            <a href="{{route('menu.index')}}" class="btn btn-sm btn-outline-dark">Назад</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input-name">Название</label>
                            <input type="text" id="input-name" name="name" value="{{old('name')}}"
                                   class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-name">Урл</label>
                            <input type="text" id="input-url" name="url" value="{{old('url')}}"
                                   class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="input-parent">Родительский элемент</label>
                                        <select name="parent_id" id="input-parent" class="form-control">
                                            <option value="">-- Выберите --</option>
                                            @foreach($menus as $item)
                                                <option value="{{$item->id}}">{{$item->id}} | {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="input-name">Сортировка</label>
                                <input type="text" id="input-name" name="sort_order" value="{{old('sort_order')}}"
                                       class="form-control">
                                @error('sort_order')
                                <div class="alert alert-danger mt-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-lg btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
