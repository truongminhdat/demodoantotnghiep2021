@section('title')
    Trang chi tiết
@endsection
@extends('welcome')
@section('content')
    <div class="content">
        <div class="main-content child-page">
            <div class="container">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                    @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="title-single-reals">
                    <div class="title-reals">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                <h1>{{$dangtin->Tieude}}</h1>
                            </div>
                        </div>
                        <div class="address">
                            <span><i class="fas fa-home"></i>{{$dangtin->Diachi}}</span>
                        </div>
                        <div class="price">
                            <p class="datepicker-days"><span style="color: #0c84ff">Ngày đăng: </span>{{date('d/m/Y H:i', strtotime($dangtin->created_at))}}</p>
                            @if(\Illuminate\Support\Facades\Auth::user())
                            <a href="/like/{{$dangtin->id}}"><i class="fas fa-heart"></i>{{$likes}}</a>
                            <div class="price">
                                <h5>Hình ảnh phòng trọ</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                        <div class="content single-khach-san">
                            <div class="slider-tour">
                                <div class="lSSlideOuter noPager"><div class="lSSlideWrapper usingCss"><ul class="imageGallery lightSlider lSSlide" style="width: 300px; transform: translate3d(0px, 0px, 0px); height: 505px; padding-bottom: 0%;">
                                            <li data-src="{{$dangtin->Hinhanh}}" class="lslide active" style="width: 300px; margin-right: 0px;">
                                                <img src="upload/dangtin/{{$dangtin->Hinhanh}}" alt="{{$dangtin->Tieude}}" style="height: 505px;width: 300px">
                                            </li>
                                        </ul><div class="lSAction" style="display: none;"><a class="lSPrev"></a><a class="lSNext"></a></div></div><ul class="lSPager lSGallery" style="margin-top: 5px; transition-duration: 400ms; width: 100px; transform: translate3d(0px, 0px, 0px);"></ul></div>
                            </div>
                           @if(auth()->user())
                                @if($dangtin->user_id == auth()->user()->id )

                            @else

                                <div class="wrap-btn-book-room">
                                    <a href="{{ route('bookRoom', ['p' => $dangtin->id]) }}" class="btn btn-primary" id="book-room" style="color: #fff">Đặt Phòng Ngay</a>
                                </div>
                                @endif

                                @endif

                            <div class="utility">
                                <h3>Thông tin</h3>
                                <div class="content-info-real">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fas fa-edit"></i>
                                                <strong>Giá: </strong>
                                                <span class="color">
											   {{number_format($dangtin->Giaphong)}}vnđ
												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                            <p class="list-info">
                                                <i class="fas fa-map"></i>
                                                <strong>Diện tích: </strong>
                                                <span class="color">
                                                    {{$dangtin->Dientich}}m<sup>2</sup>
												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                                            <p class="list-info">
                                                <i class="fas fa-address-card"></i>
                                                <strong>Khu vực: </strong>
												<span class="color">
													{{$dangtin->phuong->TenPhuong}}	- {{$dangtin->quan->Tenquan}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <p class="list-info list-address">
                                                <i class="fas fa-address-book"></i>
                                                <strong>Địa chỉ: </strong>
                                                <span class="color">
                                                    {{$dangtin->Diachi}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fas fa-book"></i>
                                                <strong>Mã tin đăng: </strong>
                                                <span class="color"><strong style="color: #e00">{{$dangtin->id}}</strong></span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="list-info">
                                                <i class="fas fa-home"></i>
                                                <strong>Tổng số lượng phòng cho thuê:</strong>
                                                <span class="color"><strong style="color: #e00">{{$tongsoluong}}</strong></span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fas fa-pencil"></i>
                                                <strong>Đã duyệt: </strong>
                                                <span class="color"><strong style="color: #e00">{{$soluongdaduyet}}/{{$soluongdangky}}</strong></span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fas fa-comment"></i>
                                                <strong>Số phòng đã cho thuê:</strong>
                                                <span class="color"><strong style="color: #e00">{{$soluongdaduyet}}</strong></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="utility">
                                <h3>Chi tiết</h3>
                                <article class="post-content">
                                    <p style="color: #000205">Nội dung mô tả</p>
                                    <p style="color: #000205">{{$dangtin->Mota}}</p>
                                    <p style="color: #000205">{{$dangtin->tiennghi}}</p>

                                </article>
                            </div>
                            <div class="utility">
                                <h3>Thông tin liên hệ</h3>
                                <div class="content-info-real">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="list-info">
                                                <i class="fas fa-user"></i>
                                                <strong>Họ và tên: </strong>
                                                <span class="color">
												  {{$dangtin->user->name}}												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="list-info">
                                                <i class="fas fa-phone"></i>
                                                <strong>Điện thoại: </strong>
                                                <span class="color">
													{{$dangtin->Sdt}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>
                             @if(\Illuminate\Support\Facades\Auth::user())
                             @if($dangtin->user_id == auth()->user()->id)
                                <h3>Danh sách đặt phòng</h3>
                                @foreach($datphong as $data)
                                    <div class="content-info-real">
                                        <div class="row">
                                            <div class="row" style="margin-bottom: 20px;">
                                                <div class="col-lg-12 margin-tb">
                                                    <div id="notify_dangtin"></div>
                                                    <div class="pull-right" style="margin-top: 20px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <p class="list-info">
                                                    <i class="fas fa-user"></i>
                                                    <strong>Họ và tên: </strong>
                                                    <span class="color">
                                                      {{ $data->user->name}}</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <p class="list-info">
                                                    <i class="fas fa-phone"></i>
                                                    <strong>Điện thoại: </strong>
                                                    <span class="color">
                                                        {{ $data->user->sdt }}</span>
                                                </p>
                                        </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <p class="list-info">
                                                    <i class="fas fa-times-circle"></i>
                                                    <strong>Ngày đặt: </strong>
                                                    <span class="color">
                                                       {{date('d/m/Y H:i', strtotime($data->created_at))}}</span>
                                                </p>
                                            </div>

                                            @if($data->status == 0)
                                                    <div class="col-md-3">
                                                     <button class="btn btn-primary"><a style="color: white;" href="{{route('duyetdatphong', $data->id)}}">Duyệt</a></button>
                                                    </div>
                                                @if($dangtin->soluongphongcontrong == 0)
                                                    <form action="{{route('guimailthongbao')}}" method="post" role="form">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="email" value="{{$data->user->email}}" >
                                                            @error('email') <small class="help-block">{{$message}}</small> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id_tin" value="{{ $dangtin->id }}" >
                                                            <!-- @error('email') <small class="help-block">{{$message}}</small> @enderror -->
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Thông báo hết phòng</button>
                                                    </form>
                                                @endif
                                                @else
                                                    <div class="col-md-3">
                                                    <a>Đã duyệt</a>
                                                     <a style="color: red;margin-left:20px" href="{{route('xoadanhsach', $data->id)}}"><i class="fas fa-trash"></i> </a>
                                                    </div>
                                            @endif


                                        </div>
                                    </div>
                                @endforeach
                                    @else
                                <div class="clear"></div>
                                @endif
                                @endif
                            </div>
                            <div class="content-text">
                                <div class="cmt">
                                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-width="100%" data-href="" data-numposts="3" style="width: 100%;" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=2197056520536374&amp;container_width=805&amp;height=100&amp;href=http%3A&amp;locale=en_US&amp;numposts=3&amp;sdk=joey&amp;title=Cho%20thu%C3%AA%20nh%C3%A0%20t%E1%BA%A1i%20K52%2F2%20Phan%20Thanh%20%E2%80%93%20%C4%90%C3%A0%20N%E1%BA%B5ng%20-%20Ph%C3%B2ng%20tr%E1%BB%8D%20%C4%90%C3%A0%20N%E1%BA%B5ng&amp;url=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;version=v3.2&amp;width=&amp;xid=https%253A%252F%252Fphongtrodn.com%252Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html"><span style="vertical-align: top; width: 100%; height: 0px; overflow: hidden;"><iframe name="f2c0cd6318b430c" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.2/plugins/comments.php?app_id=2197056520536374&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df31654a0b57b04%26domain%3Dphongtrodn.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fphongtrodn.com%252Ff2e53eec1b80ebc%26relation%3Dparent.parent&amp;container_width=805&amp;height=100&amp;href=http%3A&amp;locale=en_US&amp;numposts=3&amp;sdk=joey&amp;title=Cho%20thu%C3%AA%20nh%C3%A0%20t%E1%BA%A1i%20K52%2F2%20Phan%20Thanh%20%E2%80%93%20%C4%90%C3%A0%20N%E1%BA%B5ng%20-%20Ph%C3%B2ng%20tr%E1%BB%8D%20%C4%90%C3%A0%20N%E1%BA%B5ng&amp;url=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;version=v3.2&amp;width=&amp;xid=https%253A%252F%252Fphongtrodn.com%252Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
                                </div>
                            </div>
                            <hr>
                            <div class="rel-hotel">

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <div class="text-center borderexam1">
                            <p>Người đăng:
                                <span>{{$dangtin->user->name}}</span>
                            </p>
                            <p>Thời gian đăng:<span>{{$dangtin->created_at}}</span></p>
                            <p>Sdt:<span>{{$dangtin->Sdt}}</span></p>
                            <p style="color: red">Người đăng có thể chỉnh sửa bài viết</p>
                        </div>
                        <div class="text-center" style="margin-top: 40px;">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <div style="margin-left: 40px" id="rateYo"></div>
                            @else
                                <div style="margin-left: 40px" id="rateYo1"></div>
                            @endif
                            <form action="{{route('rating')}}" method="post" class="form-inline" id="formRating">
                                @csrf
                                <div class="form-group">
                                    <input name="grate" type="hidden" id="rating-start" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input name="dangtin_id" type="hidden" class="form-control" value="{{$dangtin->id}}"/>
                                </div>
                            </form>

                        </div>
                        <div class="text-center borderexam1 mt-5">
                            <ul class="list-inline" title="Average Rating">
                                <li title="danhgiasao" class="rating" style="cursor: pointer;color:#cccc77;font-size:30px">
                                    {{$grate}}&#9733

                                </li>
                            </ul>
                            <p style="color: red"><span>{{$grate_count}}</span> lượt bình luận</p>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user())
                        <div class="text-center borderexam1 mt-5">
                            <ul class="list-inline" title="Average Rating">
                                <a href="/like/{{$dangtin->id}}"><i class="fas fa-heart"></i>
                                </a>
                            </ul>
                            <p style="color: deepskyblue"><span style="margin-right: 10px">{{$likes}}</span>Lượt Yêu Thích</p>
                        </div>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::user())
                        @if($dangtin->user_id == auth()->user()->id )
                            <a href="{{route('capnhat.dangtin',$dangtin->id)}}">
                                <button class="btn-primary mt-5 ml-lg-5">Cập nhật</button>
                            </a>
                        @endif
                        @endif

                        <ul class="list-group mt-5">
                            <li class="list-group-item active" aria-current="true">Danh sách các loại phòng</li>
                            @foreach($loaiphong as $data)
                            <li class="list-group-item"><a href="{{route('trangchu.trochothue',$data->id)}}">{{$data->Tenloaiphong}}</a></li>
                            @endforeach
                        </ul>
                        <ul class="list-group mt-5">
                            <li class="list-group-item active" aria-current="true">Phòng Trọ</li>
                            @foreach($loaiquan as $data)
                                <li class="list-group-item"><a href="{{route('trangchu.phongtro',$data->id)}}">{{$data->Tenquan}}</a></li>
                            @endforeach
                        </ul>

                    </div>
                @include('comment.comment')
                    <div class="rel-hotel">
                        <h3>Tin liên quan</h3>
                        <div class="list-reals">
                            @foreach($tin_lienquan as $data)
                                <div class="card shadow-0 border rounded-3 mb-6">
                                    <div class="card-body">
                            <div class="detail-list" style="background: #fff;">
                                <a href="{{route('trangchitiet',$dangtin->id)}}">
                                    <img src="/upload/dangtin/{{$data->Hinhanh}}" width="120" height="100">
                                </a>
                                <div class="info-real">
                                    <h4 style="font-weight: bold"><a href="">{{$data->Tieude}}</a></h4>
                                    <p style="font-weight: bold;color: #0a0e14" class="info-text-reals" style="size: 20px;color: #0a0e14;font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"">{{$data->Mota}}</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p style="color: #1D00AF"><i class="fa fa-usd" style="color: red"></i> Giá: <strong>
                                                    {{number_format($data->Giaphong)}} vnđ																									</strong></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p style="color: #022c02;"><i class="fas fa-map"></i> Diện tích: <strong>24m<sup>2</sup></strong></p>
                                        </div>
                                    </div>
                                    <p style="color: #1D00AF;font-weight:18px"><i class="fas fa-map-marker"></i><span> Khu vực: <strong>{{$dangtin->Diachi}}</strong></span><span style="margin-left: 100px;color:#022c02;font-weight:bold">
											{{date('d/m/Y', strtotime($data->created_at))}}								</span></p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                                    </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    </div>
        </div>
        </div>
@endsection

