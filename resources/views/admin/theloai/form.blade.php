@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($theloai))
                    {!! Form::open(['route' => 'theloai.store', 'method' => 'POST']) !!}
                    @else
                    {!! Form::open(['route' => ['theloai.update', $theloai -> id], 'method' => 'PUT']) !!}
                    @endif
                    {!! Form::open(['route' => 'theloai.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tên thể loại',  []) !!}
                            {!! Form::text('title', isset($theloai) ? $theloai -> title : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả',  []) !!}
                            {!! Form::textarea('description', isset($theloai) ? $theloai -> description : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug',  []) !!}
                            {!! Form::text('slug', isset($theloai) ? $theloai -> slug : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ...', 'id' => 'chuyen_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái',  []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($theloai) ? $theloai -> status  : '', ['class' => 'form-control']) !!}
                        </div>
                        @if (!isset($theloai))
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
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $tl)
                      <tr>
                        <th scope="row"><br>{{$key}}</th>
                        <td><br>{{$tl -> title}}</td>
                        <td><br>{{$tl -> description}}</td>
                        <td><br>{{$tl -> slug}}</td>
                        <td><br>
                            @if ($tl -> status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['theloai.destroy', $tl -> id], 'onsubmit' => 'return confirm("ban muon xoa khong")'  ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('theloai.edit', $tl -> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
