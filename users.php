<?php include("layouts/header.php");

    include 'DBConnection/DBConnection.php';
    $dbconnection = new DBConnection();

    if (isset($_POST['add'])) {
        $rolename = $_POST['rolename'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbconnection->insert('users',['rolename'=>$rolename,'fname'=>$fname,'lname'=>$lname,'address'=>$address,'contact'=>$contact,'username'=>$username,'password'=>$password]);
        if ($dbconnection == true) {
            header('location:users.php');
        }
    }else if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $rolename = $_POST['rolename'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbconnection->update('users',['rolename'=>$rolename,'fname'=>$fname,'lname'=>$lname,'address'=>$address,'contact'=>$contact,'username'=>$username,'password'=>$password],"id='$id'");
        if ($dbconnection == true) {
            header('location:users.php');
        }
    }else if (isset($_POST['user_id'])) {
        $id = $_POST['user_id'];
        $dbconnection->delete('users',"id='$id'");
        if ($dbconnection == true) {
            header('location:users.php');
        }
    }



?>

<?php include("layouts/navigationadmin.php"); ?>
        
        <!-- Start menu Area -->
        <section class="menu-area section-gap" id="coffee">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Users</h4>
                        <br>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add">Add User</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rolename</th>
                                <th scope="col">First Name</th>
                                <th scope="col">User Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Size</th>
                                <th scope="col">Controls</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php 
                                    $dbconnection->select("users","*");
                                    $result = $dbconnection->sql;
                                    $i=1;
                                ?>
                                <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows["rolename"]; ?></td>
                                        <td><?php echo $rows["fname"]; ?></td>
                                        <td><?php echo $rows["lname"]; ?></td>
                                        <td><?php echo $rows["address"]; ?></td>
                                        <td><?php echo $rows["contact"]; ?></td>
                                        <td><?php echo $rows["username"]; ?></td>
                                        <td><?php echo $rows["password"]; ?></td>
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
        
        <?php include("usersupdate.php"); ?>

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
            <input type="hidden" name="rolename" value="Staff">
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
        <input type="hidden" name="user_id" id="user_id">
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
        $.post("getusers.php",{id: dataindex},function(data,status){
            var dtr = JSON.parse(data);
            $("#id").val(dtr.id);
            $("#rolename").val(dtr.rolename);
            $("#fname").val(dtr.fname);
            $("#lname").val(dtr.lname);
            $("#address").val(dtr.address);
            $("#contact").val(dtr.contact);
            $("#username").val(dtr.username);
            $("#password").val(dtr.password);
        })
        $("#Update").modal("show");
    });

    $("body").on('click','#destroy',function(e){
        var dataindex = $(e.currentTarget).data("index");
        $("#user_id").val(dataindex);
        $("#Destroy").modal("show");
    });
});

</script>

