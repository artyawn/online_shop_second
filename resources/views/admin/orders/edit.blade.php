@extends('admin.main')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Номер заказа: {{ $order->id }}</h1>
            </div><!-- /.col -->
        </div>
    </div>
    <div class="col-6">
        <form action="{{ route('orders.update', $order) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <select name="status">
                    @foreach( $statuses as $status )
                        <option {{ $status->value === $order->status ? 'selected' : '' }} value="{{ $status->value }}">{{ $status->value }}</option>
                    @endforeach
                </select>
            </div>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" name="track_number" placeholder="Номер отслеживания">{{ $order->track_number }}</input>
            </div>
            @error('track_number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
