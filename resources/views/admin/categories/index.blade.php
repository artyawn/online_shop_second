@extends('admin.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <a href="{{ route('categories.create') }}" class="link-dark">
                        <h6>Добавить категорию</h6>
                    </a>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Названия</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                 @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                        <td><div class="row">
                            <div class="col"><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Изменить</a></div>
                            <div class="col"><form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                        </form></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.row -->
            <!-- Main row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
