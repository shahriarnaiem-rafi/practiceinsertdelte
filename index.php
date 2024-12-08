<?php
$database = mysqli_connect("localhost", "root", "", "second8");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO info(name,email,phone) VALUES('$name','$email','$phone')";
    if (mysqli_query($database, $sql) == TRUE) {
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 40px auto;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="number"],
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="number"]:focus,
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: red;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }

        .table-container {
            margin-top: 50px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
            color: #333;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }

        .action-links a {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .action-links a:hover {
            background-color: darkblue;
        }
    </style>
</head>

<body>

    <h1>Registration</h1>

    <div class="form-container">
        <form action="" method="post">
            <label for="id">Id</label>
            <input type="number" name="id" placeholder="Id will be generated automatically" readonly><br>
            
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name" required><br>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required><br>

            <label for="phone">Phone</label>
            <input type="number" name="phone" placeholder="Enter your phone" required><br>

            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

    <div class="table-container">
        <?php
        $user = $database->query("SELECT * FROM info");
        $count = 1;
        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>";
        while (list($id, $name, $email, $phone) = $user->fetch_row()) {
            echo "
                <tr>
                    <td>$count</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>
                        <div class='action-links'>
                            <a href='edit.php?editid=$id'>Edit</a>
                            <a href='delete.php?deleteid=$id'>Delete</a>
                        </div>
                    </td>
                </tr>";
            $count++;
        }
        echo "</table>";
        ?>
    </div>

</body>

</html>
