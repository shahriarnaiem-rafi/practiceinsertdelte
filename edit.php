<?php
$database = mysqli_connect("localhost", "root", "", "second8");

$id = $_GET['editid'];
$sql = "SELECT * FROM info WHERE id=$id";
$quary = mysqli_query($database, $sql);
$data = mysqli_fetch_assoc($quary);
$id = $data['id'];
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];

if (isset($_POST['edit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sqlup="UPDATE info SET name='$name',email='$email',phone='$phone' WHERE id=$id";
    if(mysqli_query($database, $sqlup)==true) {
        header("location:index.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <form action="" method="post" style="margin-left:30px;">
        Id <br><input type="number"  value="<?php echo "$id"; ?>" readonly><br>
        Name <br><input type="text" name="name" value="<?php echo $name; ?>" ><br>
        Email <br><input type="email" name="email" value="<?php echo $email; ?>"><br>
        Phone <br><input type="number" name="phone" value="<?php echo $phone; ?>"><br>
        <br>
        <input type="submit" value="Confirm" name="edit"
            style="color:white; background-color:red; border-radius:10px 0px 10px 0px;text-shadow:2px 2px 2px black; box-shadow:2px 2px 2px black; padding: 10px; border:none; margin-left: 120px; ">

    </form><br><br>
</body>

</html>