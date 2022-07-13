<section style="background-color: #eee;">
    <div class="container py-5">

        @foreach($data['dangtin'] as $dangtin )
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    @if($dangtin->status == 1)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                    <a href="{{route('trangchitiet',$dangtin->id)}}"><img src="upload/dangtin/{{$dangtin->Hinhanh}}"
                                                class="w-100" ></a>
                                    <a href="">
                                        <div class="hover-overlay">
                                          <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <h5>{{$dangtin->Tieude}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="text-danger mb-1 me-2">
                                        <span>{{$dangtin->Diachi}}</span>-
                                        <span>{{$dangtin->phuong->TenPhuong }}</span>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <span><p style="color: #00c4ff">{{$dangtin->Dientich}}m<sup>2</sup></p></span>
                                </div>
                                <div class="text-left">
                                    <span>{{$dangtin->loaiphong->Tenloaiphong}}</span>
                                </div>
                                <div class="mb-2 text-muted small">
                                <img class="anhdaidien" src="upload/user/{{$dangtin->user->Anhdaidien}}"/><span>{{$dangtin->user->name}}</span>
                                    <span class="text-primary"> • </span>
                                    <span>{{$dangtin->phuong->quan->Tenquan }}</span>
                                    <span class="text-primary"> • </span>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                <div class="d-flex flex-row align-items-center mb-1">
                                      <h4 class="money-giaphong">{{$dangtin->Giaphong}}</h4>
                                </div>
                                <h6 class="text-success">{{$dangtin->Mota}}</h6>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-primary btn-sm" type="button">Đặt phòng</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @else
                    @endif


                </div>
            </div>
        </div>
        @endforeach
        </div>

</section>
@section('js')
    <script src="website/js/simple.money.format.js"></script>
    <script>
        $('.money-giaphong').simpleMoneyFormat();
    </script>
@endsection