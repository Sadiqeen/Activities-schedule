<div class="modal fade" id="ch_pass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form onsubmit="ch_pass(event);">
                <h3 class="text-center">Change Password</h3><hr>
                <input type="text" id="u_id" hidden>
                <div class="form-group">
                  <label for="">New password</label>
                  <input type="password" name="" id="ps" minlength="6" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="">Confirm password</label>
                  <input type="password" name="" id="cps" minlength="6" class="form-control" placeholder="" required>
                </div><hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-succcess btn-success btn-block">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>