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

      <label class="">Danh sách bình luận</label>
        <table class="table table-bordered mt-5">
            <tr>
                <th>Người bình luận</th>
                <th>Nội dung bình luận</th>
                <th>Tiêu đề</th>
                <th>Thời gian bình luận</th>
                <th>Hành động</th>

            </tr>
            @foreach ($comment as $data)
                <tr>
                    <td>{{$data->dangtin->user->name}}</td>
                    <td>{{$data->noidung}}</td>
                    <td>{{$data->dangtin->Tieude}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($data->created_at))}}</td>
                    <td>
                        @csrf
                        <a onclick="alert('Bạn có chắc muốn xóa không?')" href="{{route('admin.xoabinhluan',$data->id)}}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>



            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                {{ $comment->appends(request()->all())->links()}}
                </li>
                </ul>

            </nav></nav>
    </div>
@endsection

