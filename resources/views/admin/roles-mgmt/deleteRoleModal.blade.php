<!--Delete Modal -->
<div class="modal modal-danger fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="deleteRoleModalLabel"><i class="fa fa-trash-alt"></i> Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="hidden-xs" method="POST" action="{{ route('role-management.destroy', $role->id) }}">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <label for ="role_id"> Are you sure, You want to delete Role  <em id="rolename"></em> </label>
                    <input type="hidden" class="form-control" name="id" id="role_id">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>


            </form>

        </div>
    </div>
</div>