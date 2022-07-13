@extends('admin.main')
@section( 'content')
    <div class="container-fluid mt-5">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$user_count}}</h3>

                        <p>Người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{url('http://127.0.0.1:8000/admin/thongke')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$product_count}}</h3>

                        <p>Phòng trọ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$comment_count}}</h3>

                        <p>Bình luận</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$datphong}}</h3>

                        <p>Đặt Phòng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart" style="width: 600px !important; height: 500px !important; margin: auto"></canvas>
            </div>
            <div class="col-md-6">
                <div id="columnchart_material" style="width: 700px; height: 500px;"></div>
            </div>
        </div>
        <div class="row mt-5">
            <form action="{{route('admin.thongke')}}">
                    <div class="d-flex">
                        <div class="d-flex flex-column col-md-12">
                            <span  for="" class="text-primary mb-2"  style="font-size: 18px;">Chọn top:</span>
                            <select name="topn" id="" class="form-control">
                                <option @if($topN == 1) selected @endif value="1" name="top3">Top 3</option>
                                <option @if($topN == 2) selected @endif value="2" name="top5">Top 5</option>
                                <option @if($topN == 3) selected @endif value="3" name="top10">Top 10</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-end">
                            <input type="submit" class="btn btn-info" value="Thống kê">
                        </div>
                    </div>


            </form>

            <div id="piechart" style="width: 2000px; height: 500px;"></div>
        </div>
        <div class="panel-default ">
            <h4  for="" class="text-primary mb-0"  style="font-size: 18px;">Thống kê danh sách bài đăng được duyệt</h4>
            <div class="panel-body">
                <form action="" method="GET" class="form-inline" role="from">
                    <div class="form-group mr-2">
                        <input type="date" class="form-control" name="date_from">
                    </div>
                    <div class="form-group mr-2">
                        <input type="date" class="form-control" name="date_to">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Thống kê</button>
                    </div>
                    <div style="margin-left: 10px;">
                        <button class="btn btn-primary"><a style="color: white;" href="/export">Xuất dữ liệu</a></button>
                    </div>
               </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Bài đăng</th>
                <th>Người đăng</th>
                <th>Tình trạng</th>
                <th>Ngày đăng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dangtin as $dangtin)
                <tr>
                    <td>
                        {{$dangtin->Tieude}}
                    </td>

                    <td>
                        {{$dangtin->user->name}}
                    </td>
                    <td>
                        {{$dangtin->status == 0 ? 'Chưa duyệt':'Đã duyệt'}}
                    </td>
                    <td>
                        {{$dangtin->created_at}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>





    </div>


@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var data = <?= json_encode($data); ?>;
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
                datasets: [{
                    label: 'Thống kê người dùng',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên chủ trọ', 'Tổng số bài đăng'],
                <?php echo $chartData; ?>
            ]);

            var options = {
                is3D: true,
                titleTextStyle: {
                    color: "#000",
                    fontName: "Roboto",
                    fontSize: 17,
                    bold: true,
                }
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['Bài đăng', 'Số lượng đăng ký', 'Số lượng được duyệt'],
                <?php echo $chartDataTotal; ?>
            ]);

            var options = {
                title: 'THÔNG KÊ SỐ LƯỢNG ĐĂNG KÝ ĐẶT PHÒNG',
                titleTextStyle: {
                    color: "#000",
                    fontName: "Roboto",
                    fontSize: 16,
                    bold: true,
                    italic: false,
                },
                vAxis: {
                    format: '0',
                    title: 'SỐ LƯỢNG',
                    titleTextStyle: {
                        color: "#000",
                        fontName: "Roboto",
                        fontSize: 16,
                        bold: true,
                        italic: false
                    }
                },
                hAxis: {
                    title: 'ĐẶT PHÒNG',
                    titleTextStyle: {
                        color: "#000",
                        fontName: "Roboto",
                        fontSize: 16,
                        bold: true,
                        italic: false
                    }
                },
            };


            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
            chart.draw(data, options);
        }
    </script>
@endsection
