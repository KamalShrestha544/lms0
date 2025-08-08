<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>LMS | Login</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    #main_content{
        background: rgba(245, 245, 245, 0.9);
        padding: 50px;
    }
    #side_bar{
        background: rgba(245, 245, 245, 0.9);
        padding: 50px;
    }
    body{
      background: rgba(245, 245, 245, 0.4);
      background-image: url("https://plus.unsplash.com/premium_photo-1677567996070-68fa4181775a?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">User Login</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="./admin_login.php">Admin Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../signup.php"></span>Signup</a>
              </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Today's Quote</h5>
            <h6>“There is more treasure in books than in all the pirate's loot on Treasure Island"</h6>
            <p>~ Walt Disney</p>
            <h5>Library Timing</h5>
            <ul>
                <li>Opening: 9:00 AM</li>
                <li>Closing: 12:00 PM</li>
            </ul>
            <h5>What We provide ?</h5>
            <ul>
                <li>AC Rooms</li>
                <li>Free Wi-fi</li>
                <li>Learning Environment</li>
                <li>Discussion Room</li>
                <li>Free Electricity</li>
            </ul>
        </div>
        <div class="col-md-8" id="main_content">
            <center><h3><u>Admin Login Form</u></h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>    
            </form>
            <?php 
                if(isset($_POST['login'])){
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"lms");
                    $query = "select * from admins where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] =  $row['name'];
                                $_SESSION['email'] =  $row['email'];
                                header("Location: admin_dashboard.php");
                            }
                            else{
                                ?>
                                <br><br><center><span class="alert-danger">Wrong Password !!</span></center>
                                <?php
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
