@extends('admin.main')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">{{ $category->name }}</h1>
            </div><!-- /.col -->
        </div>
    </div>
    <div class="col-6">
        <form action="{{ route('categories.update', $category) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" name="name" value="{{ $category->name }}" placeholder="название">
            </div>
            <br>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
