<div class="box">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-5 form-group">
                    <select class="form-control" name="" id="fc" onchange="get_department();">
                      <?php echo '<option value="'.$_SESSION['f_id'].'" selected>'.$_SESSION["faculty"].'</option>' ?>
                    </select>
                  </div>
                  <div class="col-md-5 form-group">
                    <select class="form-control" name="" id="dp">
                     <?php echo '<option value="'.$_SESSION['d_id'].'" selected>'.$_SESSION["department"].'</option>' ?>
                    </select>
                  </div>
                  <div class="col-md-2 form-group">
                    <button class="btn btn-block btn-warning" onclick="check_add_activity();">Add event</button>
                  </div>
                </div>
              </div>
            </div>