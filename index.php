<?php
  require "common/connect.php";
  require "common/user.php";

  $feedback = '';
  if(isset($_POST['submit'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
      $username = strip_tags($_POST['username']);
      $password = md5(strip_tags($_POST['password']));
      if(User::login($username, $password)){
        switch($_SESSION['usertype']){
          case 'admin':
            header("Location: admin/index.php");
          break;
          case 'clerk':
            header("Location: clerk/index.php");
          break;
          case 'validator':
            header("Location: validator/index.php");
          break;
        }
        
      }
      else{
        $feedback = "Username or password is incorrect!";
      }
    }
    else{
      $feedback = "Please fill in all fields";
    }
  }

  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Transcript | Log in</title>

    <link rel="icon" href="public/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/bootstrap/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div align="center">
      <img src="public/images/Unima_Logo.jpg" height="180px" width="150px"></img>
      <p><font size="5" color="#1a53ff">Chancellor College</font></p>
      <p><font size="4">Transcript Data Entry System</font></p>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <p align='center'><?php echo $feedback; ?></p>
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title panel-title-primary">Sign in to start your session</h3>
                </div>

                <div class="panel-body">
                  <form action="" method="post">

                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      </span>
                      <input type="text" id="username" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    </div>

                    <br>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                      </span>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    </div>
                    <br>
                    <div class="input-group">
                      <input class="btn btn-md btn-primary" name="submit" type="submit" value="Sign In">
                    </div>

                  </form>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>


