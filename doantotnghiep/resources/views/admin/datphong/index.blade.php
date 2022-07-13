@extends('admin.main')
@section( 'content')
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



        <table class="table table-bordered mt-5">
            <tr>
                <th>Tiêu đề</th>
                <th>Người đăng</th>
                <th>Địa chỉ</th>
                <th>Giá</th>
                <th>Ảnh phòng trọ</th>
                <th>Người thuê</th>
                <th>Ngày thuê</th>
                <th>Tình trạng</th>
                <th>Hành động</th>
            </tr>
            @foreach ($datphongs as $data)
                <tr>
              <td>
                  {{$data->dangtin->Tieude}}
              </td>
              <td>{{$data->dangtin->user->name}}</td>
              <td>{{$data->dangtin->Diachi}}</td>
              <td>{{number_format($data->dangtin->Giaphong)}}vnđ</td>
              <td><img src="/upload/dangtin/{{$data->dangtin->Hinhanh}}" width="120"></td>
                    <td>
                        {{$data->user->name}}
                    </td>
                    <td>{{date('d/m/Y H:i', strtotime($data->created_at))}}</td>
                <td>
                    @if($data->status == 0)
                        <p style="color:red">Đang chờ duyệt</p>
                    @else
                        <p style="color: deepskyblue">Đã duyệt</p>
                    @endif
                </td>
                    <td>
                        @csrf
                        <a href="{{route('admin.datphong.destroy',$data->id)}}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>



            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                {{ $datphongs->appends(request()->all())->links()}}
                </li>
                </ul>

            </nav></nav>
    </div>
@endsection

