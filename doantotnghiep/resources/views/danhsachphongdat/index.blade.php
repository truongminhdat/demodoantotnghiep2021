@section('title')
    Danh sách đặt phòng
@endsection
@extends('welcome')
@section('content')
<div class="container py-5">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-left mb-3">
        <div class="col-md-12 col-xl-12">
            <h2 style="font-weight: bold">Danh sách phòng trọ đã đặt</h2>
            <div class="col-md-12 align-content-md-center">

            </div>
            @if(count( $datphongs))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Chủ phòng trọ</th>
                        <th>Tiêu đề</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ảnh phòng trọ</th>
                       <th>Loại phòng</th>
                        <th>Giá phòng</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($datphongs as $item)
                            <tr>
                                <td>{{$item->dangtin->user->name}}</td>
                                <td>{{$item->dangtin->Tieude}}</td>
                                <td>{{$item->dangtin->Diachi}}</td>
                                <td>{{$item->dangtin->Sdt}}</td>
                                <td><img src="upload/dangtin/{{$item->dangtin->Hinhanh}}" width="120"></td>
                                <td>{{$item->dangtin->loaiphong->Tenloaiphong}}</td>
                                <td>{{number_format($item->dangtin->Giaphong)}}vnđ/phòng</td>
                                <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <button class="btn btn-success btn-sm">Đã được duyệt</button>
                                    @else
                                        <span style="color: red;">Đang chờ duyệt</span>
                                        <form method="post" action="{{ route('huyDatPhong') }}">
                                            @csrf
                                            <input type="hidden" name="dangtin_id" value="{{$item->dangtin->id }}">
                                            <button class="btn btn-danger btn-sm" style="width: 50px"><i class="fas fa-trash"></i></button>
                                        </form>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            @else
                <span style="display: block ;width: 100%; text-align: left; font-size: 22px; color: #f51903">Không có phòng được đặt</span>
            @endif
        </div>
    </div>

</div>
@endsection
