<?php include("layouts/header.php");

    include 'DBConnection/DBConnection.php';
    $dbconnection = new DBConnection();

    if (isset($_POST['add'])) {
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $dbconnection->insert('products',['product_name'=>$product_name,'product_description'=>$product_description,'price'=>$price,'size'=>$size,'image'=>$image]);
        if ($dbconnection == true) {
            header('location:products.php');
        }
    }else if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $dbconnection->update('products',['product_name'=>$product_name,'product_description'=>$product_description,'price'=>$price,'size'=>$size,'image'=>$image],"id='$id'");
        if ($dbconnection == true) {
            header('location:products.php');
        }
    }else if (isset($_POST['product_id'])) {
        $id = $_POST['product_id'];
        $dbconnection->delete('products',"id='$id'");
        if ($dbconnection == true) {
            header('location:products.php');
        }
    }



?>

<?php include("layouts/navigationadmin.php"); ?>
        
        <!-- Start menu Area -->
        <section class="menu-area section-gap" id="coffee">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                        <br>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add">Add Product</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Controls</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $dbconnection->select("products","*");
                                    $result = $dbconnection->sql;
                                    $i=1;
                                ?>
                                <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows["image"]; ?></td>
                                        <td><?php echo $rows["product_name"]; ?></td>
                                        <td><?php echo $rows["product_description"]; ?></td>
                                        <td><?php echo $rows["price"]; ?></td>
                                        <td><?php
                                            $sizename="";
                                            if($rows["size"]==0){
                                                $sizename="Small";
                                            }else if($rows["size"]==1){
                                                $sizename="Medium";
                                            }else{
                                                $sizename="Large";
                                            }

                                            echo $sizename;
                                            
                                            
                                            ?></td>
                                            <td>
                                                <button type="button" data-index="<?php echo $rows["id"] ?>" id="update" class="btn btn-primary btn-sm">Edit</button>
                                                <button type="button" data-index="<?php echo $rows["id"] ?>" id="destroy" class="btn btn-secondary btn-sm">Delete</button>
                                            </td>
                                    </tr>

                                <?php $i++; } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	
        </section>
        <!-- End menu Area -->
        
        <?php include("productsupdate.php"); ?>

        <!-- start footer Area -->		
        <!-- End footer Area -->	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php include("layouts/script.php"); ?>

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="AddLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
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
            <button type="submit" name="add" class="btn btn-primary">ADD</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Destroy" tabindex="-1" role="dialog" aria-labelledby="DestroyLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DestroyLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
        <input type="hidden" name="product_id" id="product_id">
        <h1>Delete This!</h1>
        <div class="modal-footer">
            <button type="submit" name="destroy" class="btn btn-primary">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    
$(document).ready(function(){
    $("body").on('click','#update',function(e){
        var dataindex = $(e.currentTarget).data("index");
        $.post("getproducts.php",{id: dataindex},function(data,status){
            var dtr = JSON.parse(data);
            $("#id").val(dtr.id);
            $("#product_name").val(dtr.product_name);
            $("#product_description").val(dtr.product_description);
            $("#image").val(dtr.image);
            $("#price").val(dtr.price);
            $('#size option[value='+dtr.size+']').attr("selected", "selected");
        })
        $("#Update").modal("show");
    });

    $("body").on('click','#destroy',function(e){
        var dataindex = $(e.currentTarget).data("index");
        $("#product_id").val(dataindex);
        $("#Destroy").modal("show");
    });
});

</script>

