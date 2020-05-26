@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    {!! Form::open(['method' => 'POST', 'action' => 'UserController@store', 'class' => 'form-horizontal']) !!}

                    <fieldset>

                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('occupations', 'Occupations:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('occupations', $value = null, ['class' => 'form-control', 'placeholder' => 'Occupations']) !!}
                            </div>
                        </div>

                        <!-- Radio Buttons -->
                        <div class="form-group">
                            {!! Form::label('role', 'Role:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('renter', 'Renter') !!}
                                    {!! Form::radio('role', '0', true, ['id' => 'renter']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('driver', 'Driver') !!}
                                    {!! Form::radio('role', '1', false, ['id' => 'driver', 'data-toggle' => 'collapse', 'href' => '#driverCollapse1', 'role' => 'button', 'aria-expanded' => 'false', 'aria-controls' => 'driverCollapse1']) !!}
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="driverCollapse1">
                                            <div class="card card-body collapse-content">
                                                <div class="form-group">
                                                    <label>
                                                        Biển số xe
                                                    </label>
                                                    <input class="form-control" id="cLicense" name="license" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Số chỗ
                                                    </label>
                                                    <input class="form-control" id="cSeat" name="seat" type="text">
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
                            {!! Form::label('gender', 'Gender:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('male', 'Male') !!}
                                    {!! Form::radio('gender', '0', true, ['id' => 'male']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('female', 'Female') !!}
                                    {!! Form::radio('gender', '1', false, ['id' => 'female']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('home_address', 'Home Address:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('home_address', $value = null, ['class' => 'form-control', 'placeholder' => 'Home address']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_address', 'Company Address:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('company_address', $value = null, ['class' => 'form-control', 'placeholder' => 'Company address']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('start_time', $value = null, ['class' => 'form-control', 'placeholder' => 'Start time', 'min' => '07:00', 'max' => '08:00']) !!}
                            </div>
                            {!! Form::label('end_time', 'End Time:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('end_time', $value = null, ['class' => 'form-control', 'placeholder' => 'End time']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('smoking', 'Smoking:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::checkbox('smoking', '1') !!}
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                            </div>
                        </div>

                    </fieldset>

                    {!! Form::close()  !!}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#start_time").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                $(this).val(max)
            }
        });
        $('#renter').on('click', function () {
            $('.collapse').collapse('hide')
        })
    });
</script>
