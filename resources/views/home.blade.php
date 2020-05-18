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
                        @if ($data == null)
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
                                        <td>{{$dt->registration->id}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    @include('forms.general')
@endsection
<script>
    function initMap() {
        let center = {lat: 21.037468, lng: 105.780793};
        let map = new google.maps.Map(
            document.getElementById('map'),
            {zoom: 12,
            center: center}
        )
        var marker = new google.maps.Marker({position: center, map: map});
    }
</script>
<script async defer
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7vhGB3q3ZC0LXzgSyKutwVmzhtaVANc&callback=initMap">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'initGroup',
            type: 'PUT',
            data: {_token: CSRF_TOKEN},
            success: function () {
                console.log('success')
            }
        })
    })
</script>

