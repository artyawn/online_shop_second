@extends('admin.main')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Новая категория</h1>
            </div><!-- /.col -->
        </div>
    </div>
    <div class="col-6">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <input type="text" name="name" value="{{ old('name')}}" placeholder="название">
            </div>
            <br>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
