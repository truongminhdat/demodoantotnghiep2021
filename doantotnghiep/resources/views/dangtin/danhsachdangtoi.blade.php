@section('title')
  Trang đăng tin của tôi
@endsection
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div id="notify_dangtin"></div>
                <div class="pull-right" style="margin-top: 20px;">
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('thongbao'))
            <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

        @endif
        @if(session('baoloi'))
            <span class="alert alert-danger">
                <strong>{{session('baoloi')}}</strong>
            </span>

        @endif
{{--        <form action="" class="form-inline">--}}
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="key" placeholder="Tìm kiếm.."/>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                <i class="fas fa-search"></i>--}}
{{--            </button>--}}
{{--        </form>--}}


        <h2 class="align-content-md-center" style="color: red;align-items: center">Danh sách các bài đăng của tôi</h2>
        <table class="table table-bordered mt-5">
            <tr>
                <th>Tiêu đề</th>
                <th>Địa chỉ</th>
                <th>Giá</th>
                <th>Người đăng</th>
                <th>Ảnh</th>
                <th>Diện tích</th>
                <th>Số lượng phòng</th>
                <th>Tình trạng</th>
                <th>Thời gian</th>
                <th>Hành động</th>
            </tr>
            @foreach ($dangtin as $data)
                    <td>{{ $data->Tieude }}</td>
                    <td>{{$data->Diachi}}</td>
                    <td>{{number_format($data->Giaphong)}}vnđ</td>
                    <td>{{$data->user->name}}</td>
                    <td><img src="/upload/dangtin/{{$data->Hinhanh}}" width="120"></td>
                    <td>{{$data->Dientich}}m<sup>2</sup></td>
                    <td>{{$data->soluongphong}} phòng</td>
                <td>
                    @if($data->soluongphongcontrong == 0)
                        <span style="color: red">Đã cho thuê hết phòng</span>
                    @else
                        <span style="color: blue">Số lượng phòng còn {{$data->soluongphongcontrong}} </span>
                    @endif
                </td>
                    <td>{{date('d/m/Y H:i', strtotime($data->created_at))}}</td>

                    <td>
                        <a href="{{route('trangchitiet',$data->id) }}">
                            <i class="fas fa-eye">Xem</i>
                        </a>
                        <a  href="{{route('capnhat.dangtin',$data->id)}}">
                            <i class="fas fa-edit">Chỉnh sửa</i>
                        </a>
                        @csrf
                        <a href="{{route('delete.baidang',$data->id)}}">
                            <i class="fas fa-trash">Xóa</i>
                        </a>
                    </td>
                    @csrf
                </tr>
            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                {{ $dangtin->appends(request()->all())->links()}}
                </li>
                </ul>

            </nav></nav>
    </div>

@endsection
