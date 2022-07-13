@section('title')
    Đăng tin
@endsection
@extends('welcome')
@section('content')


    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #0a0e14;font-weight: bold">Đăng tin</h5>
                        @if(session('thongbao'))
                            <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

                        @endif
                    <form action="{{route('create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="Tieude" type="text" class="form-control" placeholder="Nhập tiêu đề"/>
                            @if($errors->has('Tieude'))
                                {{$errors->first('Tieude')}}
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input name="Diachi" type="text" class="form-control" placeholder="Nhập địa chỉ"/>
                            @if($errors->has('Diachi'))
                                {{$errors->first('Diachi')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại phòng</label>
                            <select class="form-control" name="loaiphong_id" id="exampleFormControlSelect1">
                                @foreach($loaiphong as $data)
                                <option value="{{$data->id}}">{{$data->Tenloaiphong}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn Phường</label>
                            <select class="form-control" name="phuong_id" id="exampleFormControlSelect2">
                                @foreach($phuong  as $data)
                                    <option value="{{$data->id}}">{{$data->TenPhuong}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn quận</label>
                            <select class="form-control" name="phuong_id" id="exampleFormControlSelect2">
                                @foreach($phuong  as $data)
                                    <option value="{{$data->id}}">{{$data->quan->Tenquan}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Giá phòng</label>
                            <input name="Giaphong" type="text" id="icon-money" class="form-control" placeholder="Nhập giá phòng"/>
                            @if($errors->has('Giaphong'))
                                {{$errors->first('Giaphong')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Diện tích</label>
                            <input name="Dientich" type="text" class="form-control" placeholder="Nhập diện tích phòng"/>
                            @if($errors->has('Dientich'))
                                {{$errors->first('Dientich')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input name="Sdt" type="text" class="form-control" placeholder="Nhập số điện thoại"/>
                            @if($errors->has('Sdt'))
                                {{$errors->first('Sdt')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số lượng phòng</label>
                            <input name="soluongphong" type="text" class="form-control" placeholder="Nhập số điện thoại"/>


                        </div>
                        <div class="form-group">
                            <label>Số lượng phòng trống</label>
                            <input name="soluongphongcontrong" type="text" class="form-control" placeholder="Nhập số điện thoại"/>
                            @if($errors->has('Sdt'))
                                {{$errors->first('Sdt')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input name="Mota" type="textarea" class="form-control" placeholder="Nhập mô tả"/>
                            @if($errors->has('Mota'))
                                {{$errors->first('Mota')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input name="Hinhanh" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tiện nghi</label>
                            <div class="form-check" >
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tiennghi" type="checkbox" id="inlineCheckbox1" value="Có điều hòa">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Có điều hòa
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tiennghi" type="checkbox" id="inlineCheckbox1" value="Có bãi giữ xe riêng">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Có bãi giữ xe rộng
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tiennghi" type="checkbox" id="inlineCheckbox1" value="Không chung chủ">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Không chung chủ
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tiennghi" type="checkbox" id="inlineCheckbox1" value="Vệ sinh riêng">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Vệ sinh riêng
                                    </label>
                                </div>
                            </div>
                            <hr>
                        </div>



                        <button class="btn btn-lg btn-primary" type="submit">Đăng tin</button>

                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

