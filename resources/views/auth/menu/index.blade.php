@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Меню</div>
                    <div class="card-body">
                        <form action="" id="form-delete" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Урл</th>

                                <th scope="col">Sort</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                           @include('auth.menu.table')
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    <a href="{{route('menu.create')}}"
                                       class="btn btn-lg btn-success btn-block">Добавить</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
