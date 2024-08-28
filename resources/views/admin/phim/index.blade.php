@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top: 20px">
            <table class="table table-striped" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col">Số tập</th>
                    {{-- <th scope="col">Tên tiếng anh</th> --}}
                    <th scope="col">Ảnh</th>
                    {{-- <th scope="col">Mô tả</th> --}}
                    {{-- <th scope="col">Slug</th> --}}
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Độ phân giải</th>
                    <th scope="col">Phụ đề</th>
                    <th scope="col">Năm phim</th>
                    <th scope="col">Top view</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $mv)
                      <tr>
                        <th scope="row"><br>{{$key}}</th>
                        <td><br>{{$mv -> title}}</td>
                        <td><br>{{$mv -> thoiluong}}</td>
                        <td><br>{{$mv -> sotap}}</td>
                        {{-- <td><br>{{$mv -> title_es}}</td> --}}
                        <td width="5%"><img width="100%" src="{{asset('uploads/phim/'.$mv->image)}}"></td>
                        {{-- <td width="25%">{{$mv -> description}}</td> --}}
                        {{-- <td><br>{{$mv -> slug}}</td> --}}
                        <td><br>
                            @if ($mv -> status)
                                hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td><br>{{$mv -> danhmuc -> title}}</td>
                        <td><br>{{$mv -> theloai -> title}}</td>
                        <td><br>{{$mv -> quocgia -> title}}</td>
                        <td><br>
                            @if ($mv -> phim_hot)
                                Có
                            @else
                                Không
                            @endif
                        </td>
                        <td><br>
                            @if ($mv -> dophangiai)
                                SD
                            @else
                                HD
                            @endif
                        </td>
                        <td><br>
                            @if ($mv -> phude==0)
                                Vietsub
                            @else
                                Thuyết minh
                            @endif
                        </td>
                        <td><br>
                            {!! Form::selectYear('year', 2000,2022, isset($mv->year) ? $mv->year : '', ['class' => 'select-year', 'id' => $mv->id])!!}
                        </td>
                        <td><br>
                            {!! Form::select('topview', ['0' => 'ngay', '1' => 'tuan', '2' => 'thang'], isset($mv->topview) ? $mv -> topview  : '',
                            ['class' => 'select_topview', 'id' => $mv->id]) !!}
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['phims.destroy', $mv -> id], 'onsubmit' => 'return confirm("ban muon xoa khong")'  ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('phims.edit', $mv -> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="card">
                <a href="{{route('phims.create')}}" class="btn btn-primary">Thêm phim mới</a>
              </div>
        </div>
    </div>
</div>
@endsection
