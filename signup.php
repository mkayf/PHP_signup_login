<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up to this website</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</head>
<body>
<?php
    include('connection.php');

    if(isset($_POST["submit"])){
        // getting values from input elements:

        $u_name = $_POST["u_name"];
        $u_email = $_POST["u_email"];
        $u_password = $_POST["u_password"];
        $u_phone_num = $_POST["u_phone_num"];

        // checking if all the input fields have valid value:
        if(empty($u_name) || empty($u_email) || empty($u_password) || empty($u_phone_num)){
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Signup failed!</strong> Please fill all the fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            ';
        }
        else{
            // data insertion query:
            $insertQuery = "INSERT INTO users (u_name, u_email, u_password, u_phone_num) VALUES ('$u_name', '$u_email', '$u_password', '$u_phone_num')";

            // data existence query:
        $checkQuery = "SELECT * FROM users WHERE u_email = '$u_email' OR u_phone_num = '$u_phone_num'";

        $result = mysqli_query($connection, $checkQuery);

        $checkRecords = mysqli_num_rows($result);

        // checking if matching email or phone num found in the database:
        if($checkRecords > 0){
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Signup failed!</strong> This account already exists, please try with different email or phone number.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            ';
        }
        else{
            // executing insertion query:
            mysqli_query($connection, $insertQuery);
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Signup successful!</strong> Your account has been created. <a href="login.php">Login to your account</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            ';
        }


        }

        

    }


?>


        <div class="container">

        <form class="form" action="signup.php" method="POST">
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
        <div class="flex">
        <label>
            <input placeholder="" type="text" class="input" name="u_name">
            <span>Name</span>
        </label>

        <label>
            <input placeholder="" type="email" class="input" name="u_email">
            <span>Email</span>
        </label>
    </div>  
            
    <label>
        <input placeholder="" type="password" class="input" name="u_password">
        <span>Password</span>
    </label> 
        
    <label>
        <input placeholder="" type="number" class="input" name="u_phone_num">
        <span>Phone number</span>
    </label>
    <input type="submit" value="submit" class="submit" name="submit">
    <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
</form>

        </div>
</body>
</html>