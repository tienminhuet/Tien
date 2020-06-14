@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    {!! Form::open(['method' => 'PUT', 'action' => 'ProfileController@store', 'class' => 'form-horizontal']) !!}

                    <fieldset>

                        <div class="form-group">
                            {!! Form::label('name', 'Họ tên:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('name', $value = $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::email('email', $value = $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('occupations', 'Occupations:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('occupations', $value = $user->occupations, ['class' => 'form-control', 'placeholder' => 'Occupations']) !!}
                            </div>
                        </div>

                        <!-- Radio Buttons -->
                        <div class="form-group">
                            {!! Form::label('role', 'Vai trò:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('renter', 'Khách') !!}
                                    {!! Form::radio('role', '0', $user->role == 0 ? true : false, ['id' => 'renter']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('driver', 'Lái xe') !!}
                                    {!! Form::radio('role', '1', $user->role == 1 ? true : false, ['id' => 'driver', 'data-toggle' => 'collapse', 'data-target' => '#driverCollapse2', 'role' => 'button', 'aria-expanded' => 'true', 'aria-controls' => 'driverCollapse2']) !!}
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="driverCollapse2">
                                            <div class="card card-body">
                                                <div class="form-group">
                                                    <label>
                                                        Biển số xe
                                                    </label>
                                                    <input class="form-control" id="cLicense" name="license"
                                                           type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Số chỗ
                                                    </label>
                                                    <input class="form-control" id="cSeat" name="seat" type="text">
                                                    <p id="alertSeat" class="alert alert-danger" hidden>Bạn đang là lái xe trong nhóm đi chung nên bạn không thể sửa đổi thông tin này.</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Màu xe
                                                    </label>
                                                    <input class="form-control" id="cColor" name="color" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Hãng xe
                                                    </label>
                                                    <input class="form-control" id="cBranch" name="branch" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Giới tính:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('male', 'Nam') !!}
                                    {!! Form::radio('gender', '0', $user->gender == 0 ? true : false, ['id' => 'male']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('female', 'Nữ') !!}
                                    {!! Form::radio('gender', '1', $user->gender == 1 ? true : false, ['id' => 'female']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('home_address', 'Địa chỉ nhà:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('home_address', $value = $user->home_address, ['class' => 'form-control', 'placeholder' => 'Home address']) !!}
                                <p id="alertAddress" class="alert alert-danger" hidden>Bạn không thể sửa thông tin này khi đang trong một nhóm.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_address', 'Địa chỉ công ty:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('company_address', $value = $user->company_address, ['class' => 'form-control', 'placeholder' => 'Company address']) !!}
                            </div>
                        </div>
                        <br>

                        <h5 id="timeTitle">Thời gian đi</h5>
                        <div class="form-group">
                            {!! Form::label('start_time', 'Từ:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('start_time', $value = $user->start_time, ['class' => 'form-control', 'placeholder' => 'Start time', 'min' => '07:00', 'max' => '08:00']) !!}
                            </div>
                            {!! Form::label('end_time', 'Đến:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('end_time', $value = $user->end_time, ['class' => 'form-control', 'placeholder' => 'End time', 'min' => '07:00']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('smoking', 'Hút thuốc:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::checkbox('smoking', '1', $user->smoking == 1 ? true : false) !!}
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                {!! Form::submit('Cập nhật', ['class' => 'btn btn-lg btn-primary pull-right'] ) !!}
                            </div>
                            <input id="roleValue" type="hidden" value="">
                        </div>

                    </fieldset>

                    {!! Form::close()  !!}
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let user = JSON.parse('{!! $user !!}');
        console.log(user)

        if (user['role'] === 1) {
            $("#end_time").attr('max', '07:15')
            $('#roleValue').val(1)
            $('#cLicense').val(user['car_detail']['license'])
            $('#cColor').val(user['car_detail']['color'])
            $('#cSeat').val(user['car_detail']['seat'])
            $('#cBranch').val(user['car_detail']['branch'])
            $('#driverCollapse2').show()
        }

        if (user['role'] === 0) {
            $('#roleValue').val(0)
            $("#end_time").attr('max', '08:00')
        }

        if (user['role'] === 1 && user['registration']['driver_id'] === user['id']) {
            $('#renter').attr('disabled', true)
            $('#cSeat').attr('readOnly', true)
            $('#alertSeat').removeAttr('hidden')
        }

        if (user['registration'] !== null) {
            $('#alertAddress').removeAttr('hidden')
            $('#home_address').attr('readOnly')
        }

        $("#start_time").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                $(this).val(max)
            }
        });

        $("#end_time").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($('#roleValue').val() == 1) {
                if (Number(minutes) > 15) {
                    $(this).val(max)
                }
            } else {
                if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                    $(this).val(max)
                }
            }
        });

        $("#driver").on('click', function () {
            let time = $("#end_time").val()
            $("#end_time").attr('max', '07:15')
            $('#roleValue').val(1)
            if (time.split(':')[0] === '07' && Number(time.split(':')[1] <= 15)) {
                $('#end_time').val(time)
            } else {
                $("#end_time").val('')
            }
        })

        $('#renter').on('click', function () {
            $('#driverCollapse2').collapse('hide')
            $('#roleValue').val(0)
            $("#endTime").attr('max', '08:00')
        })

    })
</script>
