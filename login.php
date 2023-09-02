<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title></title>
</head>
<body>
    
    <form action="login.php" method="post">

        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter email/username">
        </div>
        <div class="form-group">
            <input type="password" name="password"  class="form-control" placeholder="Enter password">
        </div>
        <div class="form-btn">
            <input type="submit" value="login" class="btn btn-primary" name="login">
        </div>
        
        </form>
        <div><p>not registered yet <a href="registration.php">Register here</a></p></div>
    </div>
    
</body>
</html>