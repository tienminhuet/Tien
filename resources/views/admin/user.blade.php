@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Danh sách người dùng</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-5">
                    <div class="card">
                        <table class="table table-bordered table-dark">
                            <thead>
                            <tr>
                                <td scope="col">Tên</td>
                                <td scope="col">Địa chỉ email</td>
                                <td scope="col">Giới tính</td>
                                <td scope="col">Nghề nghiệp</td>
                                <td scope="col">Vai trò</td>
                                <td scope="col">Địa chỉ nhà</td>
                                <td scope="col">Giờ đi làm</td>
                                <td scope="col">Hút thuốc</td>
                                <td scope="col">Nhóm thô</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uData as $udt)
                                <tr>
                                    <td>{{$udt->name}}</td>
                                    <td>{{$udt->email}}</td>
                                    <td>{{$udt->gender == 0 ? 'Nam' : 'Nữ'}}</td>
                                    <td>{{$udt->occupations}}</td>
                                    <td>{{$udt->role == 0 ? 'Hành khách' : 'Lái xe'}}</td>
                                    <td>{{$udt->home_address}}</td>
                                    <td>{{$udt->start_time}}</td>
                                    <td>{{$udt->smoking == 0 ? 'Không' : 'Có'}}</td>
                                    <td>{{$udt->group->group}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $uData->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
