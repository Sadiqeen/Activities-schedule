<div class="box">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-5 form-group">
                    <select class="form-control" name="" id="fc" onchange="get_department();">
                      <?php DBrender::get_faculties($conn) ?>
                    </select>
                  </div>
                  <div class="col-md-5 form-group">
                    <select class="form-control" name="" id="dp">
                      <option value="1">All</option>
                    </select>
                  </div>
                  <div class="col-md-2 form-group">
                    <button class="btn btn-block btn-warning" onclick="check_add_activity();">Add event</button>
                  </div>
                </div>
              </div>
            </div>