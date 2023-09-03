<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <?php 
        
        if(isset($_POST["submit"])){

            $fullname=$_POST["fullname"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordRepeat=$_POST["repeatpassword"];
            $passwordHash=password_hash($password,PASSWORD_DEFAULT);
            $errors=array();
            if(empty( $fullname)OR empty( $email) OR empty( $password) OR empty($passwordRepeat)){
                array_push($errors,"All files are required");

            }
            //check the email is valid
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Email is not valid");
            }
            if(strlen($password)<4){
                array_push($errors,"password must be alteast 4 characters");
            }
            if($password!==$passwordRepeat){
                array_push($errors,"password doesnt match");
            }
            require_once "database.php";
            $sql="SELECT * FROM users WHERE email='$email';";
            $result=mysqli_query( $conn,$sql);
            $rowcount=mysqli_num_rows($result);
            if($rowcount>0){
                array_push( $errors,"Email already exist");
            }
            if(count($errors)>0){
                foreach($errors as $error){
                    echo"<div class='alert alert-danger'>$error</div>";
                }
            }
            else{
                require_once "database.php";
                $sql="INSERT INTO users(full_name,email,password)VALUES(?,?,?);";
                $stmt=mysqli_stmt_init($conn);// This function intialize a statement and return object for mysqli_stmt_prepare
                $preparestmt=mysqli_stmt_prepare($stmt,$sql);
                if($preparestmt){
                    mysqli_stmt_bind_param($stmt,"sss",$fullname, $email,$passwordHash);//bind values to sql command
                    mysqli_stmt_execute($stmt);
                    // echo"<div class='alert alert-success'>You are registerd sucessfully</div>";
                    header("Location:login.php?you_registerd_sucessfully");


                }
                else{
                    die("something went wrong");
                }
            }
        }
        
        
        ?>
        <form action="registration.php"method="POST">
        <div class="form-group">
        <input type="text" name="fullname" class="form-control" placeholder="Enter user name">
        </div>
        <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
        <input type="password" name="repeatpassword"class="form-control"  placeholder="repeat password">
        </div>
        <div class="form-btn">
        <input type="submit" value="register" class="btn btn-primary "name="submit">
        </div>



        </form>
        <div><p>already registered<a href="login.php">login</a></p></div>
    </div>
    


</body>
</html>