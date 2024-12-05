

<?php
 $db = new mysqli("localhost", "root", "", "profile");
$id=$_GET['updateid'];
$sql="select * from userdata where id= $id";
$room = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($room);
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $db = new mysqli("localhost", "root", "", "profile");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $stmt = "UPDATE userdata SET id='$id',name='$name',email='$email',password='$password',filename='$filename' WHERE id=$id";
    $result = mysqli_query($db,$stmt);
    if ($result) {
        if (move_uploaded_file($tempname, $folder)) {
           header("location: login.php");
        } else {
            echo "<h3>Failed to move the uploaded image.</h3>";
        }
    } else {
        echo "<h3>Failed to upload data to the database.</h3>";
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                Name: <input class="form-control" type="text" name="name" value="<?php echo $name;?>" />
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="<?php echo $email;?>" />
            </div>
            <div class="form-group">
                Password: <input class="form-control" type="password" name="password" value="<?php echo $password;?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="<?php echo $filename;?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="update">Update</button>
                <a class="btn btn-success" href="login.php" role="button">login</a>

            </div>
        </form>
    </div>



</body>
</html>
