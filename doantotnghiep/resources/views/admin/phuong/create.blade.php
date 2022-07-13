@extends('admin.main')
@section( 'content')
    <html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../adminlte/dist/css/adminlte.min.css">
    </head>
    <body>

    <div class="container">

        <div class="card-body">
            <form action="{{route('admin.phuong.store')}}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Kiểm tra lại dữ liệu
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên Phuong</strong>
                            <input class="form-control" type="text" name="TenPhuong" placeholder="Nhập Tên Phường">
                            @error('Tenphuong')
                            Vui lòng nhập tên phường
                            @enderror

                        </div>
                        <select class="form-control" name="quan_id" aria-label=".form-select-lg example">
                            @foreach($quan as $data)
                                <option value="{{$data->id}}">{{$data->Tenquan}}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
                <div class="mt-2"><button type="submit" class="btn btn-primary">Lưu</button></div>
            </form>
        </div>

        </div>
    </div>
    </div>
    </body>
    </html>
@endsection
