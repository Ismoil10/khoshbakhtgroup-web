<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <!-- FORM-->
    <form method="POST" action="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">
            Delete element
          </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">Are you sure you want to delete the item?
              <input type="hidden" name="deleteOrderId">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="deleteSubmit">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </form>
    <!-- FORM END -->
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <!-- FORM-->
    <form method="POST" action="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">
            Edit element
          </h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="editOrderId">
          <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="phone">Phone number</label>
            <input type="text" name="phone" id="phone" class="form-control">
          </div>
          <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="editSubmit">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </form>
    <!-- FORM END -->
  </div>
</div>
<?
if(isset($_POST["editSubmit"])){
  $name = str_replace("'", "`", $_POST["username"]);
  $update = db::query("UPDATE `order_list` SET `USERNAME`='$name', `EMAIL`='$_POST[email]', `PHONE`='$_POST[phone]', `STATUS`='$_POST[status]' WHERE ID='$_POST[editOrderId]'");
  LocalRedirect("index.php");
}
if(isset($_POST["deleteSubmit"])){
  $delete = db::query("DELETE FROM `order_list` WHERE ID='$_POST[deleteOrderId]'");
  LocalRedirect("index.php");
}
?>