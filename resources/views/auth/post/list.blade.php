@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Список статей</div>
                    <div class="card-body">
                        <form action="" id="form-delete" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Урл</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Тайтл</th>
                                    <th scope="col">Тип</th>
                                    <th scope="col" style="width: 10rem;">
                                        <select name="" class="form-control form-control-sm" style="max-width: 150px;">
                                            <option value="">-- Категории --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th scope="col">Сорт</th>
                                    <th scope="col" style="width: 16.7rem;">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->id}}</th>
                                        <td>{{$post->slug}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            @if($post->category && $post->category->type)
                                                {{$post->category->type}}
                                            @else
                                                ...
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->category)
                                                {{$post->category->name}}
                                            @else
                                                ...
                                            @endif
                                        </td>
                                        <td>{{$post->sort_order}}</td>
                                        <td>
                                            @if($post->category && $post->category->type)

                                                <a href="{{url($post->category->type, [$post->category->slug,
                                                $post->slug])}}" target="_blank" class="btn btn-sm btn-primary">На
                                                    сайт</a>
                                            @endif
                                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-sm
                                            btn-primary">Редактировать</a>
                                            <button type="button" onclick="$('#form-delete').attr('action', '{{route('post.destroy', $post->id)}}').submit();" class="btn btn-sm btn-danger">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <a href="{{route('post.create')}}" class="btn btn-lg btn-success btn-block">Добавить</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if($posts->hasPages())
                        <div class="card-footer">
                            {{$posts->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
