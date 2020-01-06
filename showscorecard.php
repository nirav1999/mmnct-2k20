<?php 
	session_start();
	$_SESSION['onpage']="schedule";
	$id = $_GET['id'];

	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");

	$sql2="select * from matches where pid_matches='".$id."' ";

$result2=mysqli_query($mmnctdb,$sql2);

$values1=mysqli_fetch_array($result2);

$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");


$image1="css/images/".array_search(strtolower($values1[2]),array_map('strtolower', $teams)).".png";
$image2="css/images/".array_search(strtolower($values1[3]),array_map('strtolower', $teams)).".png";
$team1=array_search(strtolower($values1[2]),array_map('strtolower', $teams));
$team2=array_search(strtolower($values1[3]),array_map('strtolower', $teams))
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="css/images/mmnct_logo1.png">
    <title>MMNCT</title>
    <link rel="stylesheet" href="css/home.css">

    <link href="css/mmnct.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

       <link href="css/stylesheet_index.css" rel="stylesheet">


    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

   <?php include 'mynavigation.php';?>
   <br/>
    <section style="padding:60px;">
            <div id='content' class="col-md-20 main">
            <div class="row" >

                <div class="card cd" >
                    <div class="row" style="margin-left: 430px;position: center;">
                      <div class='col-md-3 <?php if($values1[7]==$team1){ echo "blink"; } ?>'>
                        <img class="card-img-top" <?php if($values1[7]==$team1){ echo 'style="background:rgba(218,165,32,0.5);"'; } ?> src="<?php echo $image1 ?>" >
                      </div>
                      <div class="col-md-1 vstext" >
                         <b>v/s</b> 
                      </div>
                      <div class="col-md-4 <?php if($values1[7]==$team2){ echo "blink"; } ?>">
                          <img class="card-img-top" <?php if($values1[7]==$team2){ echo 'style="background:rgba(218,165,32,0.5);"'; } ?>  src="<?php echo $image2 ?>" >
                      </div>
                    </div>
                    <div class="card-body row text-center" style="margin-right: 0;">
                      <h4 class="card-title team-name" <?php  if($id==13){ echo 'style="color:gold;"'; } ?>><?= $values1[2] ?> v/s <?= $values1[3] ?></h4>
                      <h4 class="card-title team-name"><?= $values1[1] ?></h4>
                      <h4 class="card-title team-name" <?php  if($id==13){ echo 'style="color:gold;"'; } ?>><?= $values1[5] ?></h4>
                      <h4 class="card-title team-name">Group: <?php echo $values1[6];?></h4>
                    </div>
                    <div>
                      <h3 class="team-name"><font <?php  if($id==13){ echo 'style="color:gold;background:rgba(0,0,0,0.9);"'; } ?>><?php if($id==13){ echo "MMNCT 2K20 winner is"; } ?> <?php if($id==13){if($values1[7]==$team2){ echo $values1[3]; }else{ echo $values1[2];}} ?></font></h3>
                    </div>
</div>
</div>
</div>
<br>
<br>
<br>
</section>
<?php include "footer.php"; ?>
</body>

 <script src="js/add.js"></script>