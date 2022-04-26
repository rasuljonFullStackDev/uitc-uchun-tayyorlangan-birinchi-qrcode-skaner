<?php 
// include "header.php"; 


include "session.php";
include "conn.php";


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
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <a href="add_partners.php" class=" btn btn-success btn-white m-3">Hodim qo`shish</a>
            <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Rasmi</th>
                                    <th scope="col">Ism familyasi</th>
                                    <th scope="col">Tugulgan yili</th>
                                    <th scope="col">Kasbi</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Activatsiya</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                
                                $sql = "SELECT * FROM `partners`";
                                $res = mysqli_query($con,$sql);
                                foreach ($res as $key => $part) :
                                
                              
                              ?>
                                <tr>
                                    <th scope="row"><b><?php echo $key + 1; ?></b></th>
                                    <td>
                                    <img src="<?php echo $part['Img']; ?>" alt="Avatar Image" width="60px"height="60px" class="rounded-circle">
                                    </td>
                                    <td><b><?php echo $part['full_name']; ?></b></td>
                                    <td><b><?php echo $part['both_data']; ?></b></td>
                                    <td><b><?php echo $part['job']; ?></b></td>
                                    <td><?php echo $part['telefon']; ?></td>
                                    <td>
                                        <a href="partners_delet.php?delet=<?php echo $part["id"]; ?>" class="btn btn-danger btn-white d-block m-2">O`chirish</a>    
                                        <a href="partners_edit.php?edit=<?php echo $part["id"]; ?>" class="btn btn-info btn-white d-block m-2">O`zgartirish</a>    

                                    </td>
                                    
                                </tr>

                              <?php
                              endforeach;
                              
                              ?>
                               
                            </tbody>
                        </table>
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