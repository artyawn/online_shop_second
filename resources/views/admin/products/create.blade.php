@extends('admin.main')
@section('content')
    <div class="col-6">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0">Новый товар</h1>
                </div><!-- /.col -->
            </div>
        </div>
        <form action="{{ route('products.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="название">
            </div>
            <br>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('$category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
            <textarea type="text" name="description" placeholder="описание"></textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
            <input type="text" name="price" value="{{ old('price') }}" placeholder="цена">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="file" class="form-control" name="photo">
            @error('photo')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
