@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <form class="card" action="{{route('menu.update', $menu->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>Создать пункт меню</div>
                            <a href="{{route('menu.index')}}" class="btn btn-sm btn-outline-dark">Назад</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input-name">Название</label>
                            <input type="text" id="input-name" name="name" value="{{$menu->name}}"
                                   class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-name">Урл</label>
                            <input type="text" id="input-url" name="url" value="{{$menu->url}}"
                                   class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input-parent">Родительский элемент</label>
                                    <select name="parent_id" id="input-parent" class="form-control">
                                        <option value="">-- Выберите --</option>
                                        @foreach($menus as $item)
                                            @if($item->id == $menu->parent_id)
                                                <option value="{{$item->id}}" selected>{{$item->id}}
                                                    | {{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->id}} | {{$item->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="input-name">Сортировка</label>
                                <input type="text" id="input-name" name="sort_order" value="{{$menu->sort_order}}"
                                       class="form-control">
                                @error('sort_order')
                                <div class="alert alert-danger mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input-status">Статус - {{$menu->status}}</label>
                                    <select name="status" id="input-status" class="form-control">
                                        @if($menu->status)
                                            <option value="0">Выкл</option>
                                            <option value="1" selected>Вкл</option>
                                        @else
                                            <option value="0" selected>Выкл</option>
                                            <option value="1">Вкл</option>
                                        @endif
                                    </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
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
