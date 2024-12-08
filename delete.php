<?php 
include "index.php";
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $sql=" DELETE FROM info WHERE id=$id";
        if (mysqli_query($database, $sql) == TRUE) {
            header("location:index.php");
        }

    }
?>