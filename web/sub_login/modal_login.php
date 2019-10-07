<div class="modal fade" id="modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center"><b>For Administrator</b><br>
                <small class="text-danger">Email : admin@admin.com | Pass : 111111</small>            
                </h3>
                <hr>
                <form onsubmit="login(event)" method="post">
                    <div class="form-group has-feedback">
                      <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      <small id="email-helpId" class="text-danger"></small>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      <small id="password-helpId" class="text-danger"></small>
                    </div>
                    <div class="form-group has-feedback">
                        <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>