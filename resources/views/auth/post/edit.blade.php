@extends('layouts.admin_app')
@section('style')
    <style>
        .additional-images {
            max-height: 31rem;
            overflow-y: auto;
        }
    </style>
@endsection
@section('script')
    @include('auth.master.tinymce')
@endsection
@section('content')
    <div class="container">
        <form class="card" action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @method('PUT')
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>Обновить статью - {{$post->name}}</div>
                    <a href="{{route('post.index')}}" class="btn btn-sm btn-outline-dark">Назад</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="input-slug">Урл</label>
                                    <input type="text" id="input-slug" name="slug" value="{{$post->slug}}"
                                           class="form-control">
                                    @error('slug')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input-sort_order">Сортировка</label>
                                    <input type="text" id="input-sort_order" name="sort_order" value="{{$post->sort_order}}" class="form-control">
                                    @error('sort_order')
                                    <div class="alert alert-danger mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-name">Имя</label>
                            <input type="text" id="input-name" name="name" value="{{$post->name}}" class="form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-h1">H1</label>
                            <input type="text" id="input-h1" name="h1" value="{{$post->h1}}" class="form-control">
                            @error('h1')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-sub_h1">Sub H1</label>
                            <input type="text" id="input-sub_h1" name="sub_h1" value="{{$post->sub_h1}}"
                                   class="form-control">
                            @error('sub_h1')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-title">Тайтл</label>
                            <input type="text" id="input-title" name="title" value="{{$post->title}}"
                                   class="form-control">
                            @error('title')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-description">Дескрипшен</label>
                            <textarea type="text" id="input-description" name="description"
                                      class="form-control">{{$post->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-body">Полное описание</label>
                            <textarea type="text" id="input-body" name="body" class="form-control js_editor_html"
                                      rows="10">{{$post->body}}</textarea>
                            @error('body')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-category">Главная категория</label>
                            <select name="category_id" id="input-category" class="form-control">
                                <option value="0">-- Категории --</option>
                                @foreach($categories as $category)
                                    @if($post->category && $post->category->id === $category->id)
                                        <option value="{{$category->id}}"
                                                selected>{{$category->type}} / {{$category->name}}</option>
                                    @else
                                        <option
                                            value="{{$category->id}}">{{$category->type}} /
                                            {{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <b>Основная картинка</b>
                        <div>
                            @if($post->image)
                                <p>
                                    <img src="{{url($post->image)}}" alt="" class="img-thumbnail">
                                    <input type="hidden" name="image" value="{{$post->image}}">
                                </p>
                                <button type="button" class="btn btn-sm btn-danger btn-block remove" onclick="$(this)
                            .parent().remove();
">Удалить гл.фото
                                </button>
                                <hr>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="input-image">Загрузить</label>
                            <input type="file" name="image" accept="image/*" class="form-control-file" id="input-image">
                            @error('image')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="additional-images">
                            @forelse($post->images as $image)
                                <div>
                                    <p class="additional_photo">
                                        <b>Доп картинка #{{$loop->index}}</b>
                                        <img src="{{url($image->image)}}" alt="" class="img-thumbnail">
                                        <input type="hidden" name="images[]" value="{{$image->image}}"
                                               class="d-none">
                                    </p>
                                    <button type="button" class="btn btn-sm btn-danger btn-block remove" onclick="$(this)
                            .parent().remove();
">Удалить фото #{{$loop->index}}</button>
                                    <hr>
                                </div>
                            @empty
                                <p>
                                    <b>Доп картинки</b>
                                </p>
                            @endforelse
                        </div>


                        <div class="form-group">
                            <label for="input-images">Загрузить, мульти</label>
                            <input type="file"
                                   name="images[]"
                                   accept="image/*"
                                   multiple
                                   class="form-control-file"
                                   id="input-images"
                                   value=""
                            >
                            @error('images')
                            <div class="alert alert-danger mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <hr>
                        @if($post->icons)
                            <div class="d-flex flex-wrap">
                                @foreach($post->icons as $key => $icon)

                                    <p class="additional_photo w-50">
                                        <b>Icon #{{$loop->index}}</b>
                                        <img src="{{url($icon)}}" alt="" class="img-thumbnail">
                                        <input type="hidden" name="icons[{{$key}}]" value="{{$icon}}" class="d-none">
                                    </p>
                                    <hr>

                                @endforeach

                                <button type="button" class="btn btn-sm btn-danger btn-block remove" onclick="$(this)
                            .parent().remove();
">Удалить иконки
                                </button>

                            </div>
                            <hr>
                        @endif
                        <div class="form-group">
                            <label for="input-images">Icon 1 - White</label>
                            <input type="file"
                                   name="icons[white]"
                                   accept="image/*"
                                   class="form-control-file"
                                   id="input-icon--white"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label for="input-images">Icon 2 - White Hover</label>
                            <input type="file"
                                   name="icons[hover-white]"
                                   accept="image/*"
                                   class="form-control-file"
                                   id="input-icon--white_hover"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label for="input-images">Icon 3 - Black</label>
                            <input type="file"
                                   name="icons[black]"
                                   accept="image/*"
                                   class="form-control-file"
                                   id="input-icon--black"
                                   value=""
                            >
                        </div>
                        <div class="form-group">
                            <label for="input-images">Icon 4 - Black Hover</label>
                            <input type="file"
                                   name="icons[hover-dark]"
                                   accept="image/*"
                                   class="form-control-file"
                                   id="input-icon--black_hover"
                                   value=""
                            >
                        </div>
                        @error('icons')
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
@endsection
