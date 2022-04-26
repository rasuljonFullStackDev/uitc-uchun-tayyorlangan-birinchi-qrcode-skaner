<?php 

// include "header.php";
include "session.php";
include "conn.php";


$erorr =  [];
if(isset($_POST["hodim_kirit"])){
    if(empty($_POST["name"])){
        $erorr[] = "ism familya";
    }
    if(empty($_POST["job"])){
        $erorr[] = "kasbi";
    }
    if(empty($_POST["phone"])){
        $erorr[] = "telefon";
    }
    if(empty($_POST["date"])){
        $erorr[] = "tug`ulgan yil";
    }
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image" ){
        $erorr[] = "rasm";
    }
    if(empty($erorr)){
        $img = $_FILES["image"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        $job = $_POST["job"];
        $imgPath = "partnersImg/".$img["name"];
        move_uploaded_file($img["tmp_name"],$imgPath); 

        $sql = "INSERT INTO partners (full_name,job,both_data,telefon,img)
        VALUES('$name','$job','$date','$phone','$imgPath')
        ";
        $res = mysqli_query($con,$sql);
        if($res){
            // header("location:add_partners.php");
            // header('refresh: 2,url=add_partners.php');
        } else {
            echo "not sucsess";
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

<form method="post" class="container mt-5" enctype="multipart/form-data">
    
        <!-- row -->
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Hodim rasmi</h2>
              <div class="tm-avatar-container">
                <img src="img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4">
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <div class="upload" style="position:relative;">
              <button class="btn btn-primary btn-block text-uppercase">
                Rasm yuklash
              </button>
              <input type='file' name="image" style="position:absolute;top:0;left:0; overflow:hidden; width:100%;height:100%;opacity:0;" class="btn btn-primary btn-block text-uppercase" >
              
             
              </div>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Hodimni shaxsiy varaqasi</h2>
              <div class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Ism familyasi</label>
                  <input id="name" name="name" type="text" class="form-control validate">
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Tug`ulgan yili</label>
                  <input id="data" name="date" type="date" class="form-control validate">
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">kasbi</label>
                  <input id="text" name="job" type="text" class="form-control validate">
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Telefon raqami</label>
                  <input id="tel" name="phone" type="tel" class="form-control validate">
                </div>
                
                <div class="col-12">
                  <button type="submit" name="hodim_kirit" class="btn btn-primary btn-block text-uppercase">
                   Kiritish
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>