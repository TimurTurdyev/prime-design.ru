@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Список категорий</div>
                    <div class="card-body">
                        <form action="" id="form-delete" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Урл</th>
                                <th scope="col">Название</th>
                                <th scope="col">Тайтл</th>
                                <th scope="col">Сорт</th>
                                <th scope="col" width="250">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->type ?? '...'}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->sort_order}}</td>
                                    <td>
                                        @if($category->type)
                                            <a href="{{url($category->type, $category->slug)}}"
                                               target="_blank"
                                               class="btn btn-sm btn-primary">Открыть</a>
                                        @else
                                            <a class="btn btn-sm btn-primary disabled">Открыть</a>
                                        @endif
                                        <a href="{{route('category.edit', $category->id)}}"
                                           class="btn btn-sm btn-primary">Обновить</a>
                                        <button type="button"
                                                onclick="$('#form-delete').attr('action', '{{route('category.destroy', $category->id)}}').submit();"
                                                class="btn btn-sm btn-danger">Удалить
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="{{route('category.create')}}" class="btn btn-lg btn-success btn-block">Добавить</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if($categories->hasPages())
                        <div class="card-footer">
                            {{$categories->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
