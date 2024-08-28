@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Quản lý tập phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($tapphim))
                    {!! Form::open(['route' => 'tapphim.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route' => ['tapphim.update', $tapphim -> id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    {!! Form::open(['route' => 'tapphim.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('phim', 'Tên phim',  []) !!}
                            {!! Form::select('phim_id', ['0' => 'Chọn phim', 'Phim mới nhất' => $listphim], isset($tapphim) ? $tapphim -> phim_id  : '', ['class' => 'form-control', 'id' => 'chontapphim']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link phím',  []) !!}
                            {!! Form::text('link', isset($tapphim) ? $tapphim -> linkphim : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tapphim', 'Tập phim', []) !!}
                            {!! Form::text('tapphim', isset($tapphim) ? $tapphim -> tap : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....', 'readonly']) !!}
                        </div>
                        @if (!isset($tapphim))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
                <a href="{{route('tapphim.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
            </div>
        </div>
    </div>
</div>

@endsection
