@extends('admin.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0">Товары</h1>
                </div><!-- /.col -->
                <div class="col-sm-3">
                    <form action="{{ route('products.index') }}" method="get">
                        <input type="text" name="name" placeholder="название товара">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <a href="{{ route('products.create') }}" class="link-dark">
                        <h6>Добавить продукт</h6>
                    </a>
                </div>
                <div class="col-sm-3">
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
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td><div class="row">
                                    <div class="col"><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Изменить</a></div>
                                    <div class="col"><form action="{{ route('products.destroy', $product->id) }}" method="post">
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
                <div class="row">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
