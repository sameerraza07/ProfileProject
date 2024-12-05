<?php
$db = new mysqli("localhost", "root", "", "profile");
if (isset($_POST['submit'])) {
    $email = ($_POST['email']);
    $pass = ($_POST['password']);
}

$sql = "SELECT * FROM userdata WHERE email='$email' AND password='$pass'";
$result = mysqli_query($db, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] == $email && $row['password'] == $pass) {

        $query = "SELECT * FROM userdata where email='$email'";
        $result = $db->query($query);
        foreach ($result as $data) {

            echo '
           <html>
           <head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

  .edit{
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: black;
  text-align: center;
  cursor: pointer;
  width: 95%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
  .user-image {
  padding: 1em 0;
  background-image: linear-gradient(70deg, #f5f5dc, #00bfff);
}
 
.user-image img {
  width: 75%;
  height: 200px;
 border-radius: 50%;
//   box-shadow: 0 0.6em 1.8em;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>            </head>
            <body>
            
            <h2 style="text-align:center">User Profile Card</h2>
            <div class="card">
             <div class="user-image">
              <img src="./image/' . $data['filename'] . '" alt="Uploaded Image">
              </div>
              <h2>Name: ' . $data['name'] . '</h2>
              <p class="title">Email: ' . $data['email'] . '</p>
              <p>Password: ' . $data['password'] . '</p>
                <div style="margin: 24px 0;">
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
              </div>
              <p><a class="edit" href="edit.php?updateid='.$data['id'].'" class="text-light">Update</a></button>
</p>
            </div>
            </body>
            </html>';
        }

        $db->close();
        exit();
    } else {
        header("location:login.php? error = Incorrect Email or Password");
        exit();
    }
} else {
    header("location:login.php? error = Incorrect Email or Password");
    exit();
}

