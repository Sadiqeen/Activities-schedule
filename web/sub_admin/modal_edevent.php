<div class="modal fade" id="modal-edevent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center"><b>Edit Event</b></h3><hr>
                <form onsubmit="edited_acvity(event)" method="post">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" id="id-edit" hidden required>
                      <input type="text" name="title-edit" id="title-edit" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="detail">Detail</label>
                      <input type="text" name="detail-edit" id="detail-edit" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="url">URL <small class="text-warning" id="helpId">Can be empty.</small></label>
                      <input type="text" name="url-edit" id="url-edit" class="form-control" placeholder="" >
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date and time range:</label>

                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservationtime-edit" required>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div  class="form-group">
                        <label for="place">Place:</label>
                        <input type="text" name="" id="place-edit" class="form-control" placeholder="" >
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-block btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>