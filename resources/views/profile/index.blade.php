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
                            {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
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
                            {!! Form::label('role', 'Role:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('renter', 'Renter') !!}
                                    {!! Form::radio('role', '0', $user->role == 0 ? true : false, ['id' => 'renter']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('driver', 'Driver') !!}
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
                                    {!! Form::radio('gender', '0', $user->gender == 0 ? true : false, ['id' => 'male']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('female', 'Female') !!}
                                    {!! Form::radio('gender', '1', $user->gender == 1 ? true : false, ['id' => 'female']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('home_address', 'Home Address:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('home_address', $value = $user->home_address, ['class' => 'form-control', 'placeholder' => 'Home address']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_address', 'Company Address:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('company_address', $value = $user->company_address, ['class' => 'form-control', 'placeholder' => 'Company address']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('start_time', $value = $user->start_time, ['class' => 'form-control', 'placeholder' => 'Start time']) !!}
                            </div>
                            {!! Form::label('end_time', 'End Time:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('end_time', $value = $user->end_time, ['class' => 'form-control', 'placeholder' => 'End time']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('smoking', 'Smoking:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::checkbox('smoking', '1', $user->smoking == 1 ? true : false) !!}
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let user = JSON.parse('{!! $user !!}');
        console.log(user['car_detail'])
    })
</script>
