@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (!isset($danhmuc))
                    {!! Form::open(['route' => 'danhmuc.store', 'method' => 'POST']) !!}
                    @else
                    {!! Form::open(['route' => ['danhmuc.update', $danhmuc -> id], 'method' => 'PUT']) !!}
                    @endif
                    {!! Form::open(['route' => 'danhmuc.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tên danh mục',  []) !!}
                            {!! Form::text('title', isset($danhmuc) ? $danhmuc -> title : '',  ['class' => 'form-control', 'placeholder' => 'Nhập tên danh mục ...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả',  []) !!}
                            {!! Form::textarea('description', isset($danhmuc) ? $danhmuc -> description : '',  ['class' => 'form-control', 'placeholder' => 'Nhập mô tả ...', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug',  []) !!}
                            {!! Form::text('slug', isset($danhmuc) ? $danhmuc -> slug : '',  ['class' => 'form-control', 'placeholder' => 'Nhập trường slug ...', 'id' => 'chuyen_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái',  []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($danhmuc) ? $danhmuc -> status  : '', ['class' => 'form-control']) !!}
                        </div>
                        @if (!isset($danhmuc))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $dm)
                      <tr>
                        <th scope="row"><br>{{$key}}</th>
                        <td><br>{{$dm -> title}}</td>
                        <td><br>{{$dm -> description}}</td>
                        <td><br>{{$dm -> slug}}</td>
                        <td><br>
                            @if ($dm -> status)
                                hiển thị
                            @else
                                Không
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['danhmuc.destroy', $dm -> id], 'onsubmit' => 'return confirm("ban muon xoa khong")'  ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('danhmuc.edit', $dm -> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
