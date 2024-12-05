    
 <!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div id="content">
        <form method="POST" action="dblogin.php" enctype="multipart/form-data">
          
            <div class="form-group">
                Email: <input class="form-control" type="email" name="email" value="" />
            </div>
            <div class="form-group">
                Password: <input class="form-control" type="password" name="password" value="" />
            </div>
            <div class="form-group">

                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <a class="btn btn-success" href="index.php" role="button">Back</a>

            </div>
        </form>
    </div>



</body>
</html>
