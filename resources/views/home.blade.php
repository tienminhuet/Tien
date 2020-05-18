@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Trang chủ</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        @if (count($data) == 0)
                            <div class="card-block">
                                <div class="card-body text">
                                    <div class="card-header">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#generalReg">
                                            Đăng
                                            ký đi chung
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Nhóm</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td>{{$dt->name}}</td>
                                        <td>{{$dt->home_address}}</td>
                                        <td>{{$dt->registration->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d251637.95196238213!2d105.6189045!3d9.779349!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1589143252013!5m2!1svi!2s"
                            width="860" height="610" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('forms.general')
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'initGroup',
            type: 'PUT',
            data: {_token: CSRF_TOKEN},
            success: function () {
                console.log('sucess')
            }
        })
    })
</script>

