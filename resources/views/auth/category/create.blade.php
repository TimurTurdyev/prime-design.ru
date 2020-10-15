@extends('layouts.admin_app')
@section('script')
    @include('auth.master.tinymce')
@endsection
@section('content')
    <div class="container">
        <form class="card" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>Создать категорию</div>
                    <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-dark">Назад</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="input-slug">Урл</label>
                            <input type="text" id="input-slug" name="slug" value="{{old('slug')}}" class="form-control">
                            @error('slug')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-name">Имя</label>
                            <input type="text" id="input-name" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-title">Тайтл</label>
                            <input type="text" id="input-title" name="title" value="{{old('title')}}"
                                   class="form-control">
                            @error('title')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-description">Дескрипшен</label>
                            <textarea type="text" id="input-description" name="description"
                                      class="form-control">{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-body">Полное описание</label>
                            <textarea type="text" id="input-body" name="body" class="form-control js_editor_html"
                                      rows="10">{{old('body')}}</textarea>
                            @error('body')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-sort_order">Сортировка</label>
                            <input type="text" id="input-sort_order" name="sort_order" value="{{old('sort_order')}}"
                                   class="form-control">
                            @error('sort_order')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-type">Тип</label>
                            <select name="type" id="input-type" class="form-control">
                                <option value="">-- Без типа --</option>
                                @foreach($category_type as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-image">Загрузить/Сменить картинку</label>
                            <input type="file" name="image" accept="image/*" class="form-control-file" id="input-image">
                            @error('image')
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
@endsection
