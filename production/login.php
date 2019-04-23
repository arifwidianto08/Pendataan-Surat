<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: ./index.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Loginpage</title>


    <style>
    .main {
  height: 100%;
  width: 100%;
  overflow: hidden;
  background-attachment: fixed;
  background-size: cover;
}

.loading {
  left: 50%;
  top: 50%;
  text-align: center;
  width: 100%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  position: absolute;
}

.background-loading {
  height: 100%;
  min-height: 100vh;
  overflow: hidden;
  background-color: #f5f5f5;
}

#formSignin {
  width: 100%;
  max-width: 330px;
  padding: 5px;
  margin: auto;
}

#inputStyle {
  padding: 10px;
  height: 100%;
  border-radius: 3px;
  margin-bottom: 20px;
}

#inputPassword {
  margin-bottom: 27px;
  padding: 10px;
  height: 100%;
  border-radius: 3px;
}

#headings {
  padding: 25px;
}

#button-login {
  border-radius: 3;
  height: 40px;
  font-size: larger;
  background-color: #ff4747;
  border: none;
}
    </style>
</head>

<body>
    <div class="main">
        <div class="loading">
            <div class="container">
                <form id="formSignin" method="POST" class="form-signin">
                    <div style="text-align: center ">
                        <img src="https://cdn.dribbble.com/users/1769954/screenshots/4953805/artboard_1.png" alt="Logo" height="225px" width="300px" />
                    </div>
                    <label class="sr-only">Username</label>
                    <input type="text" id="inputEmail" name="username" class="form-control" style="margin-bottom : 10px" placeholder="Username" required autoFocus />

                    <label class="sr-only">Password</label>

                    <input name="password" type="password" id="inputPassword" class="form-control" id="inputPassword" placeholder="Password" required />
                    <div>
                    <button name="submit" type="submit" id="button-login" class="btn btn-md btn-primary btn-block" >Login</button >
                    </div>

                    <br />
                    <p id="authError" style="display:none">Auth Error, can't find your Account</p>
                </form>
            </div>
        </div>
    </div>


<?php 
include('./config/config.php');

if(isset($_POST["submit"])){
    $myusername = mysqli_real_escape_string($connect, $_POST['username']);
    $mypassword = mysqli_real_escape_string($connect, $_POST['password']);
    
    $sql = "SELECT id FROM admin WHERE username ='$myusername' and password ='$mypassword'";
    $result = mysqli_query($connect, $sql);


    $getUsername = mysqli_query($connect, "SELECT * FROM admin WHERE username ='$myusername'");

    if($data_user = mysqli_fetch_array($getUsername)){
      $user_username = $data_user['username'];
      $user_password = $data_user['password_user'];

      if(password_verify("$mypassword", "$user_password")){
          $_SESSION["login"] = true;
          $user_id =$data_user['id'];
          $_SESSION["user_id"]= $user_id;
          echo "<script>console.log('$user_id')</script>";     
          header('Location: ./index.php');
          exit; 
      }else {
          echo "<script>alert('Auth Error Login Failed!')</script>";
      }
  }
      


    
}




?> 
</body>


</html> 