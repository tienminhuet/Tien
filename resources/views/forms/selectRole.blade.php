<style>
    .float-select:hover {
        cursor: pointer;
        margin-top: 5px;
    }
</style>
<div class="modal fade" id="selectRole">
    <div class="modal-dialog">
        <div class="modal-selectRole">
            <form id="frmSelectRole">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Cho chúng tôi biết vai trò bạn muốn đăng ký
                    </h4>
                </div>
                <div class="modal-body" style="display: flex">
                    <div class="card float-select" id="passenger">
                        <img src="{{ asset('images/passenger.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4>Khách</h4>
                        </div>
                    </div>
                    <div class="card float-select" id="driver">
                        <img src={{ asset('images/driver.png') }} class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4>Lái xe</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="btn-cancel" type="button" style="pointer-events: auto">
                        Hủy
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


