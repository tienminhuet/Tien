<!-- Delete Task Modal Form HTML -->
<div class="modal fade" id="leaveGroup">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmLeaveGroup" method="POST" action="{{ url('/leaveGroup') }}">
                <div style="background-color:  #4aa0e6; color: white" class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Rời nhóm
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Bạn chắc chắn muốn rời nhóm?
                    </p>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <input id="leave_id" name="id" type="hidden">
                    <button class="btn btn-danger" id="btn-delete" type="button">
                        Đồng ý
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
