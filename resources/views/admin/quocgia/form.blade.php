@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý quốc gia</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($quocgia))
                    {!! Form::open(['route' => 'quocgia.store', 'method' => 'POST']) !!}
                    @else
                    {!! Form::open(['route' => ['quocgia.update', $quocgia -> id], 'method' => 'PUT']) !!}
                    @endif
                    {!! Form::open(['route' => 'quocgia.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tên quốc gia',  []) !!}
                            {!! Form::text('title', isset($quocgia) ? $quocgia -> title : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả',  []) !!}
                            {!! Form::textarea('description', isset($quocgia) ? $quocgia -> description : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug',  []) !!}
                            {!! Form::text('slug', isset($quocgia) ? $quocgia -> slug : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'chuyen_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái',  []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($quocgia) ? $quocgia -> status  : '', ['class' => 'form-control']) !!}
                        </div>
                        @if (!isset($quocgia))
                        {!! Form::submit('Them du lieu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cap nhat', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên quốc gia</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $qg)
                      <tr>
                        <th scope="row"><br>{{$key}}</th>
                        <td><br>{{$qg -> title}}</td>
                        <td><br>{{$qg -> description}}</td>
                        <td><br>{{$qg -> slug}}</td>
                        <td><br>
                            @if ($qg -> status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['quocgia.destroy', $qg -> id], 'onsubmit' => 'return confirm("ban muon xoa khong")'  ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('quocgia.edit', $qg -> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
