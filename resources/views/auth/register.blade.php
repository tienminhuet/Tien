@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    {!! Form::open(['method' => 'POST', 'action' => 'UserController@store', 'class' => 'form-horizontal']) !!}

                    <fieldset>

                        <input type="hidden" name="role" value="" id="role">
                        <div class="form-group">
                            {!! Form::label('name', 'Họ tên:', ['class' => 'col-lg-2 control-label']) !!}
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
                            {!! Form::label('password', 'Mật khẩu:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('occupations', 'Nghề nghiệp:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('occupations', $value = null, ['class' => 'form-control', 'placeholder' => 'Occupations']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Giới tính:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                <div class="radio">
                                    {!! Form::label('male', 'Nam') !!}
                                    {!! Form::radio('gender', '0', true, ['id' => 'male']) !!}

                                </div>
                                <div class="radio">
                                    {!! Form::label('female', 'Nữ') !!}
                                    {!! Form::radio('gender', '1', false, ['id' => 'female']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('home_address', 'Địa chỉ nhà:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('home_address', $value = null, ['class' => 'form-control', 'placeholder' => 'Home address']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_address', 'Địa chỉ công ty:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('company_address', $value = null, ['class' => 'form-control', 'placeholder' => 'Company address']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('start_time', 'Thời gian đi làm:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('start_time', $value = null, ['class' => 'form-control', 'placeholder' => 'Start time', 'min' => '07:00', 'max' => '08:00']) !!}
                            </div>
                            {!! Form::label('end_time', 'Thời gian về:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::time('end_time', $value = null, ['class' => 'form-control', 'placeholder' => 'End time']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('smoking', 'Hút thuốc:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::checkbox('smoking', '1') !!}
                        </div>

                        <h5 id="carTitle" hidden>Thông tin xe</h5>
                        <div class="form-group" hidden>
                            <label class="col-lg-2 control-label">
                                Biển số xe
                            </label>
                            <div class="col-lg-10">
                                <input class="form-control" id="cLicense" name="license" type="text">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="col-lg-2 control-label">
                                Số chỗ
                            </label>
                            <div class="col-lg-10">
                                <input class="form-control" id="cSeat" name="seat" type="text">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="col-lg-2 control-label">
                                Màu xe
                            </label>
                            <div class="col-lg-10">
                                <input class="form-control" id="cColor" name="color" type="text">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="col-lg-2 control-label">
                                Hãng xe
                            </label>
                            <div class="col-lg-10">
                                <input class="form-control" id="cBranch" name="branch" type="text">
                            </div>
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
    @include('forms.selectRole')
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#selectRole').modal({show: true, backdrop: 'static', keyboard: false})
        $('#btn-cancel').on('click', function () {
            window.location.href = '/login'
        })

        $('body').on('click', '#passenger', function () {
            $('#selectRole').modal('hide')
            $('#role').val(0)
        })

        $('body').on('click', '#driver', function () {
            $('#selectRole').modal('hide')
            $('#role').val(1)
            $('#carTitle').removeAttr('hidden')
            $('#cLicense').parent().parent().removeAttr('hidden');
            $('#cSeat').parent().parent().removeAttr('hidden');
            $('#cColor').parent().parent().removeAttr('hidden');
            $('#cBranch').parent().parent().removeAttr('hidden');
        })

        $("#start_time").change(function () {
            let max = $(this).attr('max');
            let minutes = $(this).val().split(':')[1]
            if ($(this).val().split(':')[0] === '08' && Number(minutes) > 0) {
                $(this).val(max)
            }
        });
    });
</script>
