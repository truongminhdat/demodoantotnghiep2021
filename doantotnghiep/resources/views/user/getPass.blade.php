@extends('welcome')
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <form action="" method="post" role="form">
                    @csrf
                    <legend>Đặt lại mật khẩu</legend>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại password</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Nhập lại password">s
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
