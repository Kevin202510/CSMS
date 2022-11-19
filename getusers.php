<?php

    include 'DBConnection/DBConnection.php';
    $dbconnection = new DBConnection();

    if(isset($_POST['id'])){
    $dataid = "id=" . $_POST['id'];
    $dbconnection->select("users","*",$dataid);
    $dto = $dbconnection->sql;
    $res = array();
    while($dt = mysqli_fetch_assoc($dto)){
        $res = $dt;
    }
    echo json_encode($res);
}

?>