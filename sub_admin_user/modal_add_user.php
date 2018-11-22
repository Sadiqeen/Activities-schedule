<div class="modal fade" id="modal-adduser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center"><b>Add User</b></h3><hr>
                <form onsubmit="check_add_user(event)" method="post">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" name="email" id="email" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password"  minlength="6"  class="form-control" placeholder=""  required>
                    </div>
                    <div  class="form-group">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" name="cpassword" id="cpassword"  minlength="6"  class="form-control" placeholder=""  required>
                        <small class="text-danger" id="perr"></small>
                    </div>
                    <hr>
                    <div class="form-group">
                        <select name="position" id="position" class='form-control'>
                            <option value="2">For faculty</option>
                            <option value="3">For department</option>
                        </select>
                    </div><hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>