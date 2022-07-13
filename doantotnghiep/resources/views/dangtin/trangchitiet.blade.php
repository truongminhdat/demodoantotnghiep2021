@section('title')
    Trang chi tiết
@endsection
@extends('welcome')
@section('content')
    <div class="content">
        <div class="main-content child-page">
            <div class="container">
                <div class="title-single-reals">
                    <div class="title-reals">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                <h1>{{$dangtin->Tieude}}</h1>
                            </div>
                        </div>
                        <div class="address">
                            <span><i class="fa fa-home"></i> K52/2 Phan Thanh - Thanh Khê – Đà Nẵng</span>
                        </div>
                        <div class="price">
                            <p><span>Ngày đăng: </span>07-04-2022</p>
                            <span class="like">
                                <div title="Likes" id="saveLikeDislike" data-type="like" data-post="{{$dangtin->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                                    Like
                                    <span class="like-count">{{$dangtin->like()}}</span>
                                </div>
                            </span>
                            <div class="price">
                                <h5>Hình ảnh phòng trọ</h5>
                            </div>
{{--                            <span class="like">--}}
{{--								<div class="fb-like fb_iframe_widget"  data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=2197056520536374&amp;container_width=175&amp;href=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"><span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe name="f37df3972fa7638" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.2/plugins/like.php?action=like&amp;app_id=2197056520536374&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2493d9fa0672dc%26domain%3Dphongtrodn.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fphongtrodn.com%252Ff2e53eec1b80ebc%26relation%3Dparent.parent&amp;container_width=175&amp;href=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small" style="border: none; visibility: visible; width: 150px; height: 28px;" class=""></iframe></span></div>--}}

{{--							  	<div id="___plusone_0" style="position: absolute; width: 450px; left: -10000px;">--}}
{{--                                    <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I0_1653446260233" name="I0_1653446260233" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=https%3A%2F%2Fphongtrodn.com&amp;url=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fabc-static%2F_%2Fjs%2Fk%3Dgapi.lb.vi.bY_eJs-hr0w.O%2Fd%3D1%2Frs%3DAHpOoo9cew23wIivrOG-x2INLWSlG1nunw%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1653446260233&amp;_gfid=I0_1653446260233&amp;parent=https%3A%2F%2Fphongtrodn.com&amp;pfname=&amp;rpctoken=18610155" data-gapiattached="true"></iframe></div><g:plusone size="medium" data-gapiscan="true" data-onload="true" data-gapistub="true"></g:plusone>--}}
{{--							</span>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                        <div class="content single-khach-san">
                            <div class="slider-tour">
                                <div class="lSSlideOuter noPager"><div class="lSSlideWrapper usingCss"><ul class="imageGallery lightSlider lSSlide" style="width: 690px; transform: translate3d(0px, 0px, 0px); height: 505px; padding-bottom: 0%;">
                                            <li data-thumb="https://phongtrodn.com/wp-content/uploads/2022/04/e27415f57705825bdb14-rotated.jpg" data-src="{{$dangtin->Hinhanh}}" class="lslide active" style="width: 690px; margin-right: 0px;">
                                                <img src="upload/dangtin/{{$dangtin->Hinhanh}}" alt="{{$dangtin->Tieude}}" style="height: 505px;">
                                            </li>
                                        </ul><div class="lSAction" style="display: none;"><a class="lSPrev"></a><a class="lSNext"></a></div></div><ul class="lSPager lSGallery" style="margin-top: 5px; transition-duration: 400ms; width: 116.333px; transform: translate3d(0px, 0px, 0px);"></ul></div>
                            </div>
                            <div class="custom-phone">
                                <div class="button" data-phone="{{$dangtin->sdt}}">Nhấp vào đây để lấy số</div>
                            </div>
                            <div class="utility">
                                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1228209458646183" data-ad-slot="1153677726" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                            <div class="utility">
                                <h3>Thông tin</h3>
                                <div class="content-info-real">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Giá: </strong>
                                                <span class="color">
											     {{$dangtin->Giaphong}}
												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Diện tích: </strong>
                                                <span class="color">
                                                    {{$dangtin->Dientich}}m<sup>2</sup>
												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Khu vực: </strong>
                                                <a href="https://phongtrodn.com/thanh-khe/thac-gian">
												<span class="color">
													{{$dangtin->phuong->TenPhuong}}												</span>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <p class="list-info list-address">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Địa chỉ: </strong>
                                                <span class="color">
                                                    {{$dangtin->Diachi}}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Mã tin đăng: </strong>
                                                <span class="color"><strong style="color: #e00">{{$dangtin->id}}</strong></span>
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
                                    <p style="color: #000205">Có đồng hồ điện và nước riêng. Giá cả phải chăng, phù hợp với mọi gia đình, mọi nhu cầu.</p>
                                </article>
                            </div>
                            <div class="utility">
                                <h3>Thông tin liên hệ</h3>
                                <div class="content-info-real">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Họ và tên: </strong>
                                                <span class="color">
												  {{$dangtin->user->name}}												</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Điện thoại: </strong>
                                                <span class="color">
													{{$dangtin->Sdt}}										</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>
                            </div>
                            <div class="content-text">
                                <div class="cmt">
                                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-width="100%" data-href="" data-numposts="3" style="width: 100%;" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=2197056520536374&amp;container_width=805&amp;height=100&amp;href=http%3A&amp;locale=en_US&amp;numposts=3&amp;sdk=joey&amp;title=Cho%20thu%C3%AA%20nh%C3%A0%20t%E1%BA%A1i%20K52%2F2%20Phan%20Thanh%20%E2%80%93%20%C4%90%C3%A0%20N%E1%BA%B5ng%20-%20Ph%C3%B2ng%20tr%E1%BB%8D%20%C4%90%C3%A0%20N%E1%BA%B5ng&amp;url=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;version=v3.2&amp;width=&amp;xid=https%253A%252F%252Fphongtrodn.com%252Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html"><span style="vertical-align: top; width: 100%; height: 0px; overflow: hidden;"><iframe name="f2c0cd6318b430c" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.2/plugins/comments.php?app_id=2197056520536374&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df31654a0b57b04%26domain%3Dphongtrodn.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fphongtrodn.com%252Ff2e53eec1b80ebc%26relation%3Dparent.parent&amp;container_width=805&amp;height=100&amp;href=http%3A&amp;locale=en_US&amp;numposts=3&amp;sdk=joey&amp;title=Cho%20thu%C3%AA%20nh%C3%A0%20t%E1%BA%A1i%20K52%2F2%20Phan%20Thanh%20%E2%80%93%20%C4%90%C3%A0%20N%E1%BA%B5ng%20-%20Ph%C3%B2ng%20tr%E1%BB%8D%20%C4%90%C3%A0%20N%E1%BA%B5ng&amp;url=https%3A%2F%2Fphongtrodn.com%2Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html&amp;version=v3.2&amp;width=&amp;xid=https%253A%252F%252Fphongtrodn.com%252Fcho-thue-nha-tai-k52-2-phan-thanh-da-nang-2.html" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
                                </div>
                            </div>
                            <hr>
                            <div class="rel-hotel">
                                <h3>Tin liên quan</h3>
                                <div class="list-reals">
                                    <div class="detail-list" style="background: #fff;">
                                        <a href="https://phongtrodn.com/cho-thue-can-ho-k169-phan-thanh.html">
                                            <img src="https://phongtrodn.com/wp-content/uploads/2022/03/phong-1-180x130.jpg" data-src="https://phongtrodn.com/wp-content/uploads/2022/03/phong-1-180x130.jpg" alt="Cho thuê căn hộ, K169 Phan Thanh">
                                        </a>
                                        <div class="info-real">
                                            <h4><a href="https://phongtrodn.com/cho-thue-can-ho-k169-phan-thanh.html">{{$dangtin->Tieude}}</a></h4>
                                            <p class="info-text-reals">🎋 Cho thuê căn hộ, ở được 3-4 người, K169 Phan Thanh, trung tâm TP, gần Đại Học Duy Tân _ Cơ sở Nguyễn Văn Linh 🎋 Có máy...</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                    <p style="color: #0a0e14"><i class="fa fa-usd"></i> Giá: <strong>
                                                            3 Triệu 500K ₫																											</strong></p>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                    <p style="color: #0a0e14"><i class="fa fa-map-o"></i> Diện tích: <strong>30m<sup>2</sup></strong></p>
                                                </div>
                                            </div>
                                            <p><i class="fa fa-map-marker"></i><span class="text-center" style="color: #0a0e14"> Khu vực: <strong>K169 Phan Thanh</strong></span></p>
                                            <p><span class="date-right">Ngày đăng:<strong>27-02-2000</strong></span></p>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

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
                            <p style="color: red">Người đăng không thể đặt phòng</p>
                        </div>
                        <div class="text-center" style="margin-top: 40px">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <div style="margin-left: 80px" id="rateYo"></div>
                            @else
                                <div style="margin-left: 80px" id="rateYo1"></div>
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


                        <div class="text-left" style="margin-top: 30px">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <div class="text-center" style="margin-right: 40px ">
                                    <button type="submit"  class="btn btn-primary">Đặt phòng</button>
                                </div>
                            @else
                                <div class="text-center borderexam1">
                                    <span>Đăng nhập để đặt phòng</span>
                                </div>
                            @endif
                        </div>
                        <ul class="list-group" style="margin-top: 20px">
                            <li class="list-group-item active" aria-current="true">Danh sách các loại phòng</li>
                            @foreach($loaiphong as $data)
                            <li class="list-group-item"><a href="#">{{$data->Tenloaiphong}}</a></li>
                            @endforeach
                        </ul>

                    </div>
                @include('comment.comment')
        </div>
        </div>
@endsection
@section('js')

   <script>
     $(document).on('click','#btn-reply',function (ev) {
         ev.preventDefault();
         var id = $(this).data('id');
         alert(id);

     })

   </script>
@endsection
@section('css')
@endsection
