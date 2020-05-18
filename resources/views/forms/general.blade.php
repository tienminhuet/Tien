<div class="modal fade" id="generalReg">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmGeneralReg" method="POST" action="{{ url('/regGroup') }}">
                {{ csrf_field() }}
                <div class="modal-header">
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
                        <input class="form-control" id="dayNum" name="dayNum" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label>
                            Vai trò
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roleF" id="renterF" value="0" checked>
                            <label class="form-check-label" for="renterF">
                                Người thuê
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roleF" id="driverF" value="1">
                            <label class="form-check-label" for="driverF">
                                Người lái
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Giới tính
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
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>

