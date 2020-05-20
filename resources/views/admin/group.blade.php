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
                                <td scope="col">Id nhóm</td>
                                <td scope="col">Id người dùng - thành viên nhóm</td>
                                <td scope="col">Id lái xe</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gData as $gdt)
                                <tr>
                                    <td>{{$gdt->id}}</td>
                                    <td> @foreach($gdt->user as $gu)
                                            {{$gu->id . ' |'}}
                                        @endforeach</td>
                                    <td> {{$gdt->driver_id}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
