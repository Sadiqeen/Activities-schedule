<div class="modal fade" id="modal-addevent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center"><b>Add Event</b></h3><hr>
                <form onsubmit="add_activity(event)" method="post">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="detail">Detail</label>
                      <input type="text" name="detail" id="detail" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="url">URL <small class="text-warning" id="helpId">Can be empty.</small></label>
                      <input type="text" name="url" id="url" class="form-control" placeholder="" >
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date and time range:</label>

                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservationtime" required>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div  class="form-group">
                        <label for="place">Place:</label>
                        <input type="text" name="" id="place" class="form-control" placeholder="" >
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