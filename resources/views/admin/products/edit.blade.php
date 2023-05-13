@extends('admin.main')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">{{ $product->name }}</h1>
            </div><!-- /.col -->
        </div>
    </div>
    <div class="col-6">
        <form action="{{ route('products.update', $product) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" name="name" value="{{ $product->name }}" placeholder="название">
            </div>
            <br>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option {{ $category->id === $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('$category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <textarea type="text" name="description" placeholder="описание">{{ $product->description }}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" name="price" value="{{ $product->price }}" placeholder="цена">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
