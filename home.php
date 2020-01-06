   <?php
session_start();
if(empty($_SESSION['isLoggedIn']))
  $_SESSION['isLoggedIn'] = false;
$_SESSION['onpage'] = 'home';
?>
<?php

$mysqli = mysqli_connect("localhost:3306","root","","mmnctsql");

$yep2=mt_rand(1,12);

$status=array("Not-Happened","Already-Happened");

$sql2="select * from matches where pid_matches='".$yep2."' ";

$result2=mysqli_query($mysqli,$sql2);

$values1=mysqli_fetch_array($result2);

$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");


$image1="css/images/".array_search(strtolower($values1[2]),array_map('strtolower', $teams)).".png";
$image2="css/images/".array_search(strtolower($values1[3]),array_map('strtolower', $teams)).".png";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="css/images/mmnct_logo1.png">
  <title>MMNCT</title>

    <title>MMNCT</title>
    <link rel="stylesheet" href="css/home.css">

    <link href="css/mmnct.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

       <link href="css/stylesheet_index.css" rel="stylesheet">


    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body style=" background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.8); ">

   <?php include 'mynavigation.php';?>

      <header  style=" background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.1); ">
        <div class="container home" id="hype">
            <div class="row">
                <div class="col-lg-12">
                    <img id="img2" class="img-responsive img-rounded card-img-top1" src="img/mmnct_logo2.png">
                    <div class="intro-text" style=" background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.4); ">
                        <span class="name" id="tagline" style="color:orange;">GET YOUR GAME ON!</span>
                        <br>
                        <span class="name" style="color:white;">Manoj Memorial Night Cricket Tournament 2020</span><br>
                        <span class="name"  style="color:lightgreen;">6<sup>th</sup>-10<sup>th</sup> February</span><br><br>
                    </div>
                </div>
            </div>
        </div>
        </header>
<section  style=" background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.1); ">
            <div id='content' class="col-md-20 main">
            <div class="row" >

                <div class="card cd"  style=" background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.4); ">
                    <div class="row" style="margin-left: 450px;position: center;">
                      <div class="col-md-3">
                        <img class="card-img-top" src="<?php echo $image1 ?>" >
                      </div>
                      <div class="col-md-1 vstext" >
                         <b>v/s</b> 
                      </div>
                      <div class="col-md-4">
                          <img class="card-img-top"  src="<?php echo $image2 ?>" >
                      </div>
                    </div>
                    <div class="card-body row text-center" style="margin-right: 0; font-size: 30;">
                      <h4 class="card-title team-name" style="font-size: 30;"><?= $values1[2] ?>  v/s  <?= $values1[3] ?></h4>
                      <h4 class="card-title team-name" style="color:blue;">  <?= $values1[1] ?></h4>
                      <h4 class="card-title team-name">  <?= $values1[5] ?></h4>
                      <h4 class="card-title team-name" style="color:blue;">Group: <font style="color:white;"><?= $values1[6] ?></font></h4>

                    </div>
</div>
</div>
</div>
<br>
<br>
<br>
</section>

   <?php include 'footer.php';?>
</body>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/add.js"></script>
</html>