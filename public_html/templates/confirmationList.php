<!-- Modal -->
<div class="modal fade" id="confirmationList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="doccument">
    <div class="modal-content">
      <div class="modal-header">
        <p><h6><b>NOTE:</b>If the information provided in this form does not match the ones on the shoe, kindly comment the issue and report fake! Please, fill in this form with what you see on the shoe <b>IF THE SYSTEM HAS PROVIDED NO INFORMATION ON A GIVEN SHOE PROPERTY</b>.</h6>
        </p>       
      </div>
      <div class="modal-body">
        <form id="confirmation_list_shoe_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
            
             <label>Serial Number</label>
              <input type="text" class="form-control" name="serial_no" id="serial_no" placeholder="Not available in our shoes!">
            </div> 
            <div class="form-group col-md-6">
             <label>Date produced</label>
              <input type="text" class="form-control" name="dateProduced" id="dateProduced" placeholder="Not available in our shoes!" readonly/>
            </div>
            <div class="form-group col-md-6">
             <label>Added Date</label>
              <input type="text" class="form-control" name="addedDate" id="addedDate" placeholder="Not available in our shoes!"  readonly/>
            </div> 
            <div class="form-group col-md-6">
             <label>Batch Number</label>
              <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Not available in our shoes!" >
            </div>
            <div class="form-group col-md-6">
             <label>Color</label>
              <input type="text" class="form-control" name="color" id="color" placeholder="Not available in our shoes!" >
            </div>
            <div class="form-group col-md-6">
             <label>Size</label>
              <input type="text" class="form-control" name="size" id="size" placeholder="Not available in our shoes!" >
            </div>
            
            <div class="form-group">
              <label for="report">Confirm</label>
              <select name="report" class="form-control" id="report" required>
                <option value="">Choose Your confirmation</option>
                <option value="1">Purchased</option>
                <option value="0">Fake</option>
              </select>

            </div>
            <div class="form-group col-md-6">
             <label>Comment</label>
              <input type="text" class="form-control" name="comment" id="comment" placeholder="Your comment" required>
            </div>
            
            <br>
            <button type="submit" name="insert" id="insert" class="btn btn-success">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
