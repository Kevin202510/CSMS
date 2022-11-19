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
        <input type="hidden" name="id" id="id">
        <div class="form-row">
            <div class="col">
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
            </div>
            <div class="col">
            <input type="text" name="image" id="image" class="form-control" placeholder="Image">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
            <select class="custom-select" id="size" name="size">
                <option>Select Your Cup Size</option>
                <option value="0">Small</option>
                <option value="1">Medium</option>
                <option value="2">Large</option>
            </select>
            </div>
            <div class="col">
            <input type="number" name="price" id="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
            <textarea type="text" name="product_description" id="product_description" class="form-control" placeholder="Product Description"></textarea>
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