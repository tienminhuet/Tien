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
                            <table class="table table-bordered table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Nhóm</th>
                                    <th scope="col">Lái xe</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td>{{$dt->name}}</td>
                                        <td>{{$dt->home_address}}</td>
                                        <td>{{$dt->registration->id}}</td>
                                        <td>@if($dt->id == $driver) X @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="route" id="style-3">
                                <table class="table table-bordered table-dark">
                                    <thead>
                                    <tr>
                                        <th>Lộ trình</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Lái xe {{$dData[0]['name']}} khởi hành lúc {{$dData[0]['start_time']}}
                                            tại {{$dData[0]['home_address']}}</td>
                                    </tr>
                                    @for($i=1; $i<count($dData); $i++)
                                        <tr>
                                            <td>Đón {{$dData[$i]['name']}} lúc {{$dData[$i]['start_time']}}
                                                tại {{$dData[$i]['home_address']}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#carDetail">Thông tin xe
                            </button>
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
    @include('forms.carDetail')
@endsection
<script>
    const arr = [];
    let markers = []

    function getCoordinate(c) {
        c.forEach(e => arr.push([Number(e['latH']), Number(e['lngH']), e['user']['home_address'], e['user']['name']]))
    }

    function initMap() {
        let coordinate = JSON.parse('{!! $coordinate !!}');
        const infowindow = new google.maps.InfoWindow();
        getCoordinate(coordinate)
        let center = {lat: 21.037468, lng: 105.780793};
        let map = new google.maps.Map(
            document.getElementById('map'),
            {
                zoom: 15,
                center: center
            }
        )

        function makeMarker(arr) {
            const marker = new google.maps.Marker({
                position: new google.maps.LatLng(arr[0], arr[1]),
                map: map,
            });
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.close();
                infowindow.setContent("<div id='content'><h5>" + arr[3] + "</h5></div>" + "<p class='coordinate'>" + arr[2] + "</p>")
                infowindow.open(map, marker)
            })
        }

        arr.forEach(makeMarker);
    }
</script>
<script async defer
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7vhGB3q3ZC0LXzgSyKutwVmzhtaVANc&callback=initMap">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dt = '{!! $data !!}' ? JSON.parse('{!! $data !!}') : '';
        const driverId = dt ? dt[0]['registration']['driver_id'] : '';
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'initGroup',
            type: 'PUT',
            data: {_token: CSRF_TOKEN},
            success: function () {
                console.log('success')
            }
        })
        if (driverId !== '') {
            $.ajax({
                url: 'carDetail/' + driverId,
                type: 'GET',
                success: function (res) {
                    $('#carDetailOwn').val(res['user']['name'])
                    $('#carDetailLicense').val(res['license'])
                    $('#carDetailSeat').val(res['seat'])
                    $('#carDetailColor').val(res['color'])
                    $('#carDetailBranch').val(res['branch'])
                },
                error: function (e) {
                    console.log(e)
                }
            })
        }
    })
</script>


