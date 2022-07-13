@section('title')
   Cập nhật đăng tin
@endsection
@extends('welcome')
@section('content')


    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #0a0e14;font-weight: bold">Thông tin phòng trọ</h5>
                    @if(session('thongbao'))
                        <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

                    @endif
                    <form action="{{route('capnhat.dangtin',$dangtin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="Tieude" type="text" class="form-control" value="{{$dangtin->Tieude}}"/>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Loại phòng</label>
                                <select class="form-control" name="loaiphong_id" id="exampleFormControlSelect1">
                                    @foreach($loaiphong as $data)
                                        <option value="{{$data->id}}">{{$data->Tenloaiphong}}</option>
                                    @endforeach

                                </select>
                            </div>
{{--                            <div class="col-md-12">--}}
{{--                                <label for="">Chọn quận</label>--}}
{{--                                <select class="form-control input-sm m-bot15 choose quan"--}}
{{--                                        name="quan_id" id="quan" onchange="showWard()">--}}
{{--                                    <option value="">--Chọn quận</option>--}}
{{--                                    @foreach($loaiquan as $data)--}}
{{--                                        <option value="{{$data->id}}">{{$data->Tenquan}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12">--}}
{{--                                <label for="">Chọn Phường</label>--}}
{{--                                <select class="form-control input-sm m-bot15 choose phuong" name="phuong_id"  id="phuong">--}}
{{--                                    <div id="result"></div>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                        </div>

                        <div class="form-group">
                            <label>Địa chỉ cụ thể</label>
                            <input name="Diachi" type="text" class="form-control" value="{{$dangtin->Diachi}}"/>
                            @if($errors->has('Diachi'))
                                {{$errors->first('Diachi')}}
                            @endif

                        </div>

                        <div class="form-group">
                            <i class="bi bi-house-door-fill"></i><label>Giá phòng</label>
                            <input name="Giaphong" type="text" id="icon-money" class="money-giaphong form-control" value="{{$dangtin->Giaphong}}"/>
                            @if($errors->has('Giaphong'))
                                {{$errors->first('Giaphong')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Diện tích</label>
                            <input name="Dientich" type="text" class="form-control" value="{{$dangtin->Dientich}}"/>
                            @if($errors->has('Dientich'))
                                {{$errors->first('Dientich')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input name="Sdt" type="text" class="form-control" value="{{$dangtin->Sdt}}" />
                            @if($errors->has('Sdt'))
                                {{$errors->first('Sdt')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số lượng phòng</label>
                            <input name="soluongphong" type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" value="{{$dangtin->soluongphong}}"/>
                            @if($errors->has('soluongphong'))
                                {{$errors->first('soluongphong')}}
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input name="Mota" type="textarea" class="form-control" value="{{$dangtin->Mota}}"/>
                            @if($errors->has('Mota'))
                                {{$errors->first('Mota')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <div>
                            <img src="upload/dangtin/{{$dangtin->Hinhanh}}" alt="{{$dangtin->Tieude}}" style="height: 505px;">
                            </div>
                            <input name="Hinhanh" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tiện nghi</label>
                            <input name="tiennghi" type="textarea" class="form-control" value="{{$dangtin->tiennghi}}"/>

                            <hr>
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.money-giaphong').simpleMoneyFormat();
        })
    </script>
@endsection
<script>
    function showWard(){
        var district_id = $('#quan').val();

        $.ajax({
            url: "/get-wards/"+district_id,
            method: "get",
            data: {
                "_token": "{{ csrf_token() }}",
                // "district_id" : district_id,
            },

            success: function(res){
                console.log(res);

                var html = "";
                for(var i=0; i<res.length; i++){
                    html += `<option value="` + res[i].id + `">` + res[i].TenPhuong
                        + `</option>`
                }


                $('#phuong').html(html);

            },

            error: function (xhr, error) {

            }
        }).done(function(responsive){
            // console.log(responsive);
        });

    }
</script>

