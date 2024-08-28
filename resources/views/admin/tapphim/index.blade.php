@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">tập phim</th>
                    <th scope="col">link phim</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($listtapphim as $key => $tp)
                      <tr>
                        <th scope="row"><br>{{$key}}</th>
                        <td><br>{{$tp ->phim->title}}</td>
                        <td width="10%"><img width="100%" src="{{asset('uploads/phim/'.$tp->phim->image)}}"></td>
                        <td><br>{{$tp ->tap}}</td>
                        <td>

                              {!! $tp->linkphim !!}

                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['tapphim.destroy', $tp -> id], 'onsubmit' => 'return confirm("ban muon xoa khong")'  ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('tapphim.edit', $tp -> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

