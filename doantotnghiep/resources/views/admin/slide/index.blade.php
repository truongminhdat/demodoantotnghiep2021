@extends('admin.main')
@section( 'content')

    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Slide</h3>
                </div>
                <div class="pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success" href="{{route('admin.slide.create')}}">Thêm mới
                    </a>
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
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Ảnh slide</th>
                <th width="280px">Hành động</th>
            </tr>
            @foreach ($slide as $data)
                <td>{{ $data->id }}</td>
                <td><img src="/upload/slide/{{$data->Hinh}}" width="200px"></td>
                <td>
                        <a class="btn btn-primary" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        <a href="#" class="btn btn-danger action_delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                </li>
                </ul>

            </nav></nav>
    </div>


@endsection
