<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="UpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
        <div class="form-row">
            <input type="hidden" name="rolename" id="rolename" value="Staff">
            <input type="hidden" name="id" id="id">
            <div class="col">
            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
            </div>
            <div class="col">
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
            <input type="text" name="address" id="address" class="form-control" placeholder="Price">
            </div>
            <div class="col">
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Price">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
            <input type="text" name="username" id="username" class="form-control" placeholder="User Description">
            </div>
            <div class="col">
            <input type="password" name="password" id="password" class="form-control" placeholder="User Description">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>