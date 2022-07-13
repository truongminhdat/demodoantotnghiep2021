

    <div class="container py-5">
        <div class="row justify-content-left mb-3">
            <div class="col-md-9 col-xl-9">
                <div class="col-md-4 align-content-md-center">
                </div>
                @if(count($dangtin))
                    @foreach($dangtin as $dangtin )
                        <div class="card shadow-0 border rounded-3 mt-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <a href="{{route('trangchitiet',$dangtin->id)}}"><img
                                                    src="upload/dangtin/{{$dangtin->Hinhanh}}"
                                                    class="w-100"></a>
                                            <a href="">
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                         style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>{{$dangtin->Tieude}}</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                            <span style="color: red;font-weight:18px"><i class="fas fa-map-marker"></i><span>{{$dangtin->Diachi}}</span></span>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                        <p style="color: #022c02;"><i class="fas fa-map"></i> Diện tích: {{$dangtin->Dientich}}<strong>m<sup>2</sup></strong></p>
                                        </div>
                                        <div class="text-left">
                                            <span>{{$dangtin->loaiphong->Tenloaiphong}}</span>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <img class="anhdaidien"
                                                 src="upload/user/{{$dangtin->user->Anhdaidien}}"/><span>{{$dangtin->user->name}}</span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-column">
                                            <span
                                                style="color: #ef0101">Số lượng phòng: {{$dangtin->soluongphong }}</span>

                                            @if($dangtin->soluongphongcontrong == 0)
                                                <span style="color: red">( Đã hết phòng)</span>
                                            @else
                                            <span>( Còn {{$dangtin->soluongphongcontrong}} phòng)</span>
                                            @endif
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <span style="color: #1D00AF"><i class="fa fa-usd" style="color: red"></i>{{number_format($dangtin->Giaphong)}}vnđ/phòng</span>
                                        </div>
                                        <h6 class="text-success">{{$dangtin->Mota}}</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <a href="{{ route('trangchitiet',$dangtin->id) }}"
                                               class="btn btn-primary btn-sm" style="color: #fff">Chi tiết</a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach
                @else
                    <span style="display: block ;width: 100%; text-align: center; font-size: 18px">Không tìm thấy phòng trọ nào phù hợp.</span>
                @endif
            </div>

            <div class="col-md-3 co-xl-3">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">Danh sách các loại phòng</li>
                    @foreach($loaiphong as $data)
                        <li class="list-group-item"><a href="{{route('trangchu.trochothue',$data->id)}}">{{$data->Tenloaiphong}}</a></li>
                    @endforeach
                </ul>
                <ul class="list-group mt-5">
                    <li class="list-group-item active" aria-current="true">Phòng Trọ</li>
                    @foreach($loaiquan as $data)
                        <li class="list-group-item"><a
                                href="{{route('trangchu.phongtro',$data->id)}}">{{$data->Tenquan}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>


