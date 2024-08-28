@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($phim))
                    {!! Form::open(['route' => 'phims.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route' => ['phims.update', $phim -> id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    {!! Form::open(['route' => 'phims.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tên phím',  []) !!}
                            {!! Form::text('title', isset($phim) ? $phim -> title : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title_es', 'Tên tiếng anh',  []) !!}
                            {!! Form::text('title_es', isset($phim) ? $phim -> title_es : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thoiluong', 'Thời lượng',  []) !!}
                            {!! Form::text('thoiluong', isset($phim) ? $phim -> thoiluong : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sotap', 'Số tập phim',  []) !!}
                            {!! Form::text('sotap', isset($phim) ? $phim -> sotap : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer',  []) !!}
                            {!! Form::text('trailer', isset($phim) ? $phim -> trailer : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả',  []) !!}
                            {!! Form::textarea('description', isset($phim) ? $phim -> description : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug',  []) !!}
                            {!! Form::text('slug', isset($phim) ? $phim -> slug : '',  ['class' => 'form-control', 'placeholder' => 'Nhập đầy đủ dữ liệu ....', 'id' => 'chuyen_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái',  []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($phim) ? $phim -> status  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('danhmuc', 'Danh mục phim',  []) !!}
                            {!! Form::select('danhmuc_id', $danhmuc, isset($phim) ? $phim -> danhmuc_id  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('theloai', 'Thể loại phim',  []) !!}
                            {!! Form::select('theloai_id', $theloai, isset($phim) ? $phim -> theloai_id  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('quocgia', 'Quốc gia',  []) !!}
                            {!! Form::select('quocgia_id', $quocgia, isset($phim) ? $phim -> quocgia_id   : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Hot', 'Phim hot ?',  []) !!}
                            {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($phim) ? $phim -> phim_hot  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dophangiai', 'Độ phân giải',  []) !!}
                            {!! Form::select('dophangiai', ['1' => 'SD', '0' => 'HD'], isset($phim) ? $phim -> dophangiai  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề',  []) !!}
                            {!! Form::select('phude', ['1' => 'Thuyết minh', '0' => 'Vietsub'], isset($phim) ? $phim -> phude  : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Ảnh bìa',  []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($phim))
                                <img width="20%" src="{{asset('uploads/phim/'.$phim->image)}}">
                            @endif
                        </div>
                        @if (!isset($phim))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
                <a href="{{route('phims.index')}}" class="btn btn-primary">Liệt kê chi tiết phim</a>
            </div>
        </div>
    </div>
</div>
@endsection
