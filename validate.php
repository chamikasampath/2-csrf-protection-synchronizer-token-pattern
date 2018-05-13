<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CSRF Protection!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
  </head>

  <body style="background-image: url('/2-csrf-protection-synchronizer-token-pattern/background-1.jpg');color: white;">

  <!-- navbar start -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">CSRF Protection!</a>
      </div>
      <ul class="nav navbar-nav">
        <?php
          if (!isset($_COOKIE['session_cookie'])) {
            echo "<li class='active'><a href='profile.php'>Profile</a></li>";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (!isset($_COOKIE['session_cookie'])) {
            echo "<li><a href='login.php'><span class='glyphicon glyphicons-log-in'></span> Login </a></li>";
          }
        ?><?php
          if (isset($_COOKIE['session_cookie'])) {
            echo "<li><a href='logout.php'><span class='glyphicon glyphicons-log-out'></span> Logout</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>
  <!-- navbar end -->

  <div class="container">
    <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">

            <div class="card">
              <h3 class="card-header">- Your Profile Details -</h3>
              <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">


						<?php
						if(isset($_COOKIE['session_cookie']))
						{


							session_start();
							if ($_POST['csrf_Token'] == $_SESSION['CSRF_Token'])
							{
								$fname=$_POST['name'];
								$nic=$_POST['nic'];
								$address=$_POST['address'];
								$email=$_POST['email'];

								echo "<div class='alert alert-success' role='alert'>".$fname."</div>";
								echo "<div class='alert alert-info' role='alert'>".$nic."</div>";
								echo "<div class='alert alert-success' role='alert'>".$address."</div>";
								echo "<div class='alert alert-info' role='alert'>".$email."</div>";

							}
							else
							{
								echo "<script>alert('<< CAUTION >> :: CSRF is Found!')</script>";
							}

						}
						?>


                        </div>
                        <div class="col-sm-2"></div>
                    </div>
              </div>
            </div>



        </div>
    </div>
</div>

</body>
</html>
