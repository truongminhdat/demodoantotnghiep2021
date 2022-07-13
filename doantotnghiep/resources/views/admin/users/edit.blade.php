@extends('admin.main')
@section( 'content')
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../adminlte/dist/css/adminlte.min.css">
    </head>

    <div class="container">

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif


            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{route('admin.user.update',$user->id)}}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên người dùng:</label>
                                <span>{{$user->name}}</span>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <span>{{$user->diachi}}</span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <span>{{$user->email}}</span>
                            </div>
                            <div class="form-group">
                                <label>Sdt</label>
                                <span>{{$user->sdt}}</span>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <span>{{$user->gioitinh}}</span>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <span>{{$user->ngaysinh}}</span>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <img src="/upload/user/{{$user->Anhdaidien}}" width="120">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <img src="/upload/user/{{$user->Anhbia}}" width="120">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                             <label>Chọn quyền</label>
                            <select class="form-control input-sm m-bot15 choose quan"
                                    name="role_id">
                                @foreach($role as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>


                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection
