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


        <table class="table table-bordered">
            <tr>
                <th>Duyệt</th>
                <th>Tiêu đề</th>
                <th>Giá</th>
                <th>Người đăng</th>
                <th>Ảnh</th>
                <th>Diện tích</th>
                <th>Hành động</th>
            </tr>
            @foreach ($dangtin as $data)
                <tr>
                    <td>
                        @if($data->status == 1 )
                            <input type="button" data-status="0" id="{{$data->id}}" class="btn btn-primary duyet_btn" value="Bỏ duyệt">
                        @else
                            <input type="button" data-status="1" id="{{$data->id}}" class="btn btn-primary duyet_btn" value="Duyệt">
                        @endif
                    </td>
                    <td>{{ $data->Tieude }}</td>
                    <td>{{$data->Giaphong}}</td>
                    <td>{{$data->user->name}}</td>
                    <td><img src="/upload/dangtin/{{$data->Hinhanh}}" width="120"></td>
                    <td>{{$data->Dientich}}m<sup>2</sup></td>
                    <td>Xem</td>
                </tr>
            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                {!! $dangtin->links()!!}
                </li>
                </ul>

            </nav></nav>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.duyet_btn').click(function (){
            var status = $(this).data('status');
            var id = $(this).attr('id');
            if(status == 0){
                var alert = 'Duyệt không thành công';
            }
            else {
                var alert = 'Duyệt thành công'
            }

            $.ajax({
                url:"{{url('admin/duyetbaidang')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },

               data:{status:status,id:id},
                success:function(data) {
                    $('#notify_dangtin').html(data);
                    $('#notify_dangtin').html('<span class="text text-alert">'+alert+'</span>');
                }





            })
        })

    </script>
@endsection
