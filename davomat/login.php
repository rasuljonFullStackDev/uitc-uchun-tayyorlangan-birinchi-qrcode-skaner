<?php 
// include "header.php";
include "conn.php";

$erorr = [];
if(isset($_POST["submit"])){
  if(empty($_POST["username"])){
    $erorr[] = "username";
  }
  if(empty($_POST["password"])){
    $erorr[] = "password";
  }
  if(empty($erorr)){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM uitc_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($con,$sql);
    $count = mysqli_num_rows($res);
    if($count>0){
      // ob_start();
      // header('refresh:1;url=./');\/
      // headers_sent("location:index.php");
      // ob_end_flush();
      session_start();
      $_SESSION["user_id"] = "log in";
      header("Location:index.php");
      
      echo "true";
    } else{
      echo "data erorr";
    }
  }

}
?>
    

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UITC davomat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">UITC Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link " href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Davomat
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="partners.php">
                                <i class="far fa-user"></i>
                                Hodimlar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                    
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                           <form action="logout.php" method="post" class="submit_logout  w-100">
                           <button type='submit' class="nav-link w-100 d-block btn btn-danger btn-white" >
                                Admin, <b>Logout</b>
                            </button>
                           </form>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <script>
            let s = 0;
            let ctrl = true,ctrl_s = true, ctrl_u = true;
            setInterval(() => {
                ++s;
                console.log(s);
                if(s==15){
                document.querySelector(".submit_logout").submit();
                }
                console.log();
                if(window.location.href.split("/").indexOf("login.php") !=-1){
                    console.log("true");
                    s=0;
                }
                if(ctrl===false && ctrl_s===false ){
                    document.querySelector(".submit_logout").submit();
                
                }
                if(ctrl===false && ctrl_u===false ){
                    document.querySelector(".submit_logout").submit();
                
                }
            }, 1000);
            window.addEventListener("mousemove",(e)=>
            {
                // console.log(e);
                s = 0;

            })
            window.addEventListener("keyup",(e)=>
            {
                console.log(e);
                s = 0;
                if(e.keyCode===17){
                    ctrl = false;
                }
                if(e.keyCode===83){
                    ctrl_s = false;
                }
                if(e.keyCode===85){
                    ctrl_u = false;
                }
            })
    </script>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form  method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      name="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                  <button class="mt-5 btn btn-primary btn-block text-uppercase">
                    Forgot your password?
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
