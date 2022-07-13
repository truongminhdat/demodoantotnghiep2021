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
                        <input name="Tieude" type="text" class="form-control" placeholder="Nhập tiêu đề" />
                        @if($errors->has('Tieude'))
                        {{$errors->first('Tieude')}}
                        @endif
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
                        <div class="col-md-12">
                            <label for="">Chọn quận</label>
                            <select class="form-control input-sm m-bot15 choose quan" name="quan_id" id="quan" onchange="showWard()">
                                <option value="">--Chọn quận</option>
                                @foreach($loaiquan as $data)
                                <option value="{{$data->id}}">{{$data->Tenquan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Chọn Phường</label>
                            <select class="form-control input-sm m-bot15 choose phuong" name="phuong_id" id="phuong">
                                <option value="">--Chọn Phường</option>
                                <div id="result"></div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ cụ thể</label>
                        <input name="Diachi" type="text" class="form-control" placeholder="Nhập địa chỉ" />
                        @if($errors->has('Diachi'))
                        {{$errors->first('Diachi')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <i class="bi bi-house-door-fill"></i><label>Giá phòng(Vnđ)</label>
                        <input name="Giaphong" type="text" id="icon-money" class="money-giaphong form-control" placeholder="Nhập giá phòng" />
                        @if($errors->has('Giaphong'))
                        {{$errors->first('Giaphong')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Diện tích(m2)</label>
                        <input name="Dientich" type="text" class="form-control" placeholder="Nhập diện tích phòng" />
                        @if($errors->has('Dientich'))
                        {{$errors->first('Dientich')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input name="Sdt" type="text" class="form-control" placeholder="Nhập số điện thoại" />
                        @if($errors->has('Sdt'))
                        {{$errors->first('Sdt')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Số lượng phòng</label>
                        <input name="soluongphong" type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" placeholder="Nhập số lượng phòng" />
                        @if($errors->has('soluongphong'))
                        {{$errors->first('soluongphong')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input name="Mota" type="textarea" class="form-control" placeholder="Nhập mô tả" />
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
                        <div class="form-check">
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
@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.money-giaphong').simpleMoneyFormat();
    })
</script>

{{-- <script src="http://code.jquery.com/jquery-latest.js"></script>--}}
<script type="text/javascript">
    $(document).ready(function() {
        $('.choose').change(function() {
            var action = $(this).attr('id');
            var id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if (action == 'quan') {
                result = 'phuong';
            }
            $.ajax({
                url: {
                    {
                        url('/lietke')
                    }
                },
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                data: {
                    action: action,
                    id: id
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            })
            console.log(data)
        })


    })
</script>
@endsection

<script>
    function showWard() {
        var district_id = $('#quan').val();

        $.ajax({
            url: "/get-wards/" + district_id,
            method: "get",
            data: {
                "_token": "{{ csrf_token() }}",
                // "district_id" : district_id,
            },

            success: function(res) {
                console.log(res);

                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html += `<option value="` + res[i].id + `">` + res[i].TenPhuong +
                        `</option>`
                }


                $('#phuong').html(html);

            },

            error: function(xhr, error) {

            }
        }).done(function(responsive) {
            // console.log(responsive);
        });

    }
</script>
