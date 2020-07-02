<div class="modal fade" id="generalReg">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmGeneralReg" method="POST" action="{{ url('/regGroup') }}">
                {{ csrf_field() }}
                <div style="background-color:  #4aa0e6; color: white" class="modal-header">
                    <h4 class="modal-title">
                        Đăng ký đi chung
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Số ngày đi
                        </label>
                        <input class="form-control" id="dateRange" name="dayNum" required="" type="text">
                    </div>
                    <br>
                    <h5>Thời gian đi</h5>
                    <div class="form-group">
                        <label>
                            Từ
                        </label>
                        <input class="form-control" id="startTime" name="startTimeF" required="" type="time" min="07:00" max="08:00">
                    </div>
                    <div class="form-group">
                        <label>
                            Đến
                        </label>
                        <input class="form-control" id="endTime" name="endTimeF" required="" type="time" min="07:00" max="08:00">
                    </div>
                    <div class="form-group">
                        <label>
                            Vai trò
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roleF" id="renterF" value="0" checked>
                            <label class="form-check-label" for="renterF">
                                Hành khách
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roleF" id="driverF" value="1"
                                   data-toggle="collapse" href="#driverCollapse" role="button"
                                   aria-expanded="false" aria-controls="driverCollapse">
                            <label class="form-check-label" for="driverF">
                                Người lái
                            </label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="driverCollapse">
                                    <div class="card card-body collapse-content">
                                        <div class="form-group">
                                            <label>
                                                Biển số xe
                                            </label>
                                            <input class="form-control" id="carLicense" name="license" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Số chỗ
                                            </label>
                                            <input class="form-control" id="carSeat" name="seat" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Màu xe
                                            </label>
                                            <input class="form-control" id="carColor" name="color" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Hãng xe
                                            </label>
                                            <input class="form-control" id="carBranch" name="branch" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Giới tính đi người đi chung
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genderF" id="maleF" value="0" checked>
                            <label class="form-check-label" for="maleF">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genderF" id="femaleF" value="1">
                            <label class="form-check-label" for="femaleF">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="smokingF" value="1" id="smokingF">
                            <label class="form-check-label" for="smokingF">
                                Hút thuốc
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <button class="btn btn-primary" id="btn-add" type="submit" value="add">
                        Tìm người đi chung
                    </button>
                    <input type="hidden" value="" id="roleState">
                </div>
            </form>
        </div>
    </div>
</div>



