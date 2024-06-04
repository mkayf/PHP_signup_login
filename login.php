<?php
    include('connection.php');
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
      $u_email = $_POST['u_email'];
      $u_password = $_POST['u_password'];

      $checkQuery = "SELECT * FROM users WHERE u_email = '$u_email' AND u_password = '$u_password'";
      $result = mysqli_query($connection, $checkQuery);
      $checkRecord = mysqli_num_rows($result);

      if($checkRecord > 0){
        header('Location: index.html');
        exit();         
      }
      else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login failed!</strong> Please check your email or password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        ';
        
      }

    }
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</head>
<body>
    <div class="container">
<form class="form" action="" method="POST">
       <p class="form-title">Sign in to your account</p>
        <div class="input-container">
          <input placeholder="Enter email" type="email" name="u_email">
          <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span>
      </div>
      <div class="input-container">
          <input placeholder="Enter password" type="password" name="u_password">

          <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span>
        </div>
         <button class="submit" type="submit">
        Sign in
      </button>

      <p class="signup-link">
        No account?
        <a href="signup.php">Sign up</a>
      </p>
   </form>
   </div>

</body>
</html>