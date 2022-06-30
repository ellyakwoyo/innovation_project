<!-- Modal -->
<div class="modal fade" id="form_shoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="doccument">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
        <form id="update_shoe_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
            <input type="hidden" name="shoeId" id="shoeId" value=""/>
             <label>Serial Number</label>
              <input type="text" class="form-control" name="update_serialNo" id="update_serialNo" placeholder="Enter serial number" required>
            </div> 
            <div class="form-group col-md-6">
             <label>Date produced</label>
              <input type="text" class="form-control" name="dateProduced" id="dateProduced" value="<?php echo date("Y-m-d"); ?>" required/>
            </div>
            <div class="form-group col-md-6">
             <label>Added Date</label>
              <input type="text" class="form-control" name="addedDate" id="addedDate" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div> 
            <div class="form-group col-md-6">
             <label>Batch Number</label>
              <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Enter Batch number" required>
            </div>
            <div class="form-group col-md-6">
             <label>Color</label>
              <input type="text" class="form-control" name="color" id="color" placeholder="Enter colour of the shoe" required>
            </div>
            <div class="form-group col-md-6">
             <label>Size</label>
              <input type="text" class="form-control" name="size" id="size" placeholder="Enter shoe size" required>
            </div>
            
            <br>
            <button type="submit" name="insert" id="insert" class="btn btn-success">Update Shoe</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
