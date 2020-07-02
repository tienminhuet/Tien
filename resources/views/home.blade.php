@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    {{--                    <h3 class="text-themecolor">Trang chủ</h3>--}}
                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        @if ($data == null)
                            <div class="card-block">
                                <div class="card-body text">
                                    <div class="card-header">
                                        <button style="background-color: #4aa0e6" class="btn btn-primary" data-toggle="modal" data-target="#generalReg">
                                            Đăng
                                            ký đi chung
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{--dia chi Nhà--}}
                            <div class="card-block">
                                <div class="card-body text">
                                    <div class="card-header text-tab">
                                        <span style="color: #4aa0e6; width: auto" class="fa fa-briefcase"></span>
                                        <span style="text-align: center">Địa chỉ nhà : </span>
                                        <div> {{ Auth::user()->home_address }}</div>
                                    </div>
                                </div>
                            </div>


                            {{--dia chi cong ty--}}
                            <div class="card-block">
                                <div class="card-body text">
                                    <div class="card-header text-tab">
                                        <span style="color: #4aa0e6; width: auto" class="fa fa-briefcase"></span>
                                        <span style="text-align: center">Địa chỉ Công Ty : </span>
                                        <div> {{ Auth::user()->company_address }}</div>
                                    </div>
                                </div>
                            </div>
                            {{--                    slide bar--}}
                            <div id="demo" class="carousel slide" style="margin-left: 18px;" data-ride="carousel">
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>
                                <div class="carousel-inner">
                                    <di class="carousel-item active">
                                        <img src="{{ asset('images/uet.jpg') }}" alt="Los Angeles">
                                        <div class="carousel-caption">
                                            <h3>UET share</h3>
                                            <p>Giải pháp tối ưu phương tiện giao thông </p>
                                        </div>
                                    </di>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/together.jpg') }}" alt="Chicago">
                                        <div class="carousel-caption">
                                            <h3>Gắn kết bạn bè , đồng nghiệp</h3>
                                            <p>Tạo ra các mối quan hệ xã hội thân thiết, thoải mái</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/saving.jpg') }}" alt="New York">
                                        <div class="carousel-caption">
                                            <h3>giảm thiểu chi phi</h3>
                                            <p>Giảm đáng kể chi phí đi lại, bảo trì,....</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        @else
                            {{--                            {{dd($dData)}}--}}
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr  style="background-color:  #4aa0e6; color: white">
                                    <th scope="col">Tên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Nhóm</th>
                                    <th scope="col">Lái xe</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $dData[0]['name'] }}</td>
                                    <td>{{ $dData[0]['home_address'] }}</td>
                                    <td>{{ $dData[0]['registration_id'] }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#carDetail"><i
                                                class="fa fa-info"></i></button>
                                    </td>
                                </tr>
                                @for($i=1; $i<count($dData); $i++)
                                    <tr>
                                        <td>{{ $dData[$i]['name'] }}</td>
                                        <td>{{ $dData[$i]['home_address'] }}</td>
                                        <td>{{ $dData[$i]['registration_id'] }}</td>
                                        <td></td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                            <div class="route" id="style-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr  style="background-color:  #4aa0e6; color: white">
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giờ đi</th>
                                        <th scope="col">Địa điểm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lái xe {{ $dData[0]['name'] }}</td>
                                        <td>Trong
                                            khoảng {{ explode(':', $dData[0]['start_time'])[0] . ':'. explode(':', $dData[0]['start_time'])[1] }}
                                            - {{ explode(':', $dData[0]['end_time'])[0] . ':'. explode(':', $dData[0]['end_time'])[1] }}</td>
                                        <td>{{$dData[0]['home_address']}}</td>
                                    </tr>
                                    @for($i=1; $i<count($dData); $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $dData[$i]['name'] }}</td>
                                            <td>Trong
                                                khoảng {{ explode(':', $dData[$i]['start_time'])[0] . ':'. explode(':', $dData[$i]['start_time'])[1] }}
                                                - {{ explode(':', $dData[$i]['end_time'])[0] . ':'. explode(':', $dData[$i]['end_time'])[1] }}</td>
                                            <td>{{$dData[$i]['home_address']}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>


                </div>
                <div class="col-lg-7 col-md-7">
                    <div id="map"></div>
                    <br>
                    @if ($data != null)
                        <button class="btn btn-danger" id="btnLeaveGroup" data-toggle="modal" data-target="#leaveGroup">
                            Rời
                            nhóm
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('forms.general')
    @include('forms.carDetail')
    @include('forms.leaveGroup')
@endsection
<script>
    const arr = [];
    let markers = []

    function getCoordinate(c) {
        c.forEach(e => arr.push([Number(e['latH']), Number(e['lngH']), e['user']['home_address'], e['user']['name']]))
    }

    function initMap() {
        let coordinate = JSON.parse('{!! $coordinate !!}');
        console.log(coordinate)
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
        const id = '{!! Auth::id() !!}'
        const user = JSON.parse('{!! Auth::user() !!}')
        $('#startTime').val(user['start_time'])
        $('#endTime').val(user['end_time'])
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'initGroup',
            type: 'PUT',
            data: {_token: CSRF_TOKEN},
            success: function () {
                console.log('success')
            }
        })
        $.ajax({
            url: 'carDetail/' + id,
            type: 'GET',
            success: function (res) {
                if (res !== '') {
                    $('#carLicense').val(res['license'])
                    $('#carSeat').val(res['seat'])
                    $('#carColor').val(res['color'])
                    $('#carBranch').val(res['branch'])
                }
            }
        });

        $("#startTime").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                $(this).val(max)
            }
        });

        $("#endTime").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($('#roleState').val() == 1) {
                if (Number(minutes) > 15) {
                    $(this).val(max)
                }
            } else {
                if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                    $(this).val(max)
                }
            }
        });

        $("#driverF").on('click', function () {
            let time = $("#endTime").val()
            $("#endTime").attr('max', '07:15')
            $('#roleState').val(1)
            if (time.split(':')[0] === '07' && Number(time.split(':')[1] <= 15)) {
                $('#endTime').val(time)
            } else {
                $("#endTime").val('')
            }
        })

        $('#renterF').on('click', function () {
            $('.collapse').collapse('hide')
            $('#roleState').val(0)
            $("#endTime").attr('max', '08:00')
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
        $('#btn-delete').click(function () {
            $.ajax({
                    url: 'leaveGroup',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN},
                    success: function (res) {
                        if (res) {
                            window.location.reload()
                        }
                    },
                    error: function () {

                    }
                }
            )
        })
    })
</script>


