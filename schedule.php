<?php 
	session_start();
	$_SESSION['onpage']="schedule";

	$mmnct = new mysqli("localhost:3306", "root", "", "mmnctsql");

	$sc="SELECT * FROM matches";

	$result=mysqli_query($mmnct,$sc);

	$schedule = array();

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$schedule[]=$row;
	}

	
	$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");

	$status=array("Not-Happened","Already-Happened");

?>

<!DOCTYPE html>

<html>
	<head>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="css/schedule.css">

    <link rel="stylesheet" href="css/home.css"> 

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/mmnct.css" rel="stylesheet">

    <link href="css/stylesheet_index.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="icon" href="css/images/mmnct_logo1.png">
	<title>MMNCT</title>
</head>

<body>
    <?php include 'mynavigation.php';?>
    <br>
    <section style="padding:100px;">
    		<div id='content' class="main" style="position: center; margin-left:30px;margin-right:30px;" >
    			 <ul class="nav navbar-nav add">
      <li><a href="schedule.php" style="color:white;"><B>GROUP STAGE</B></a></li>
      <li><a href="final.php" style="color:gold;"><B>FINAL</B></a></li>
    </ul>
    <br>
    <br>


    			<?php for($i=0; $i<mysqli_num_rows($result) && $i<12; $i++) { 
    				if($schedule[$i]['status'] == 0 and $_SESSION['isLoggedIn']== true) {
    					$addr = "scorecard.php?id=".($i+1);
    				}
    				elseif($schedule[$i]['status'] == 0 and $_SESSION['isLoggedIn']== false) {

    					$addr = "#";
    					$addr1=' data-toggle="modal" data-target="#modal-2"';
    				}
    				else {
    					$addr = "showscorecard.php?id=".($i+1);
    				}
    				$id1=(string)array_search($schedule[$i]['fid_team1'], $teams);
    				$id2=(string)array_search($schedule[$i]['fid_team2'], $teams);
    			?>
					<h3 id="matchno" class="match" style="margin-left: 380px;" ><b  class="add" style="color:white;">Match <?php echo $i+1; ?></b></h3>
				
					<a href=<?php echo $addr;
							if(isset($addr1))
								echo $addr1;
					?> >
					<div class="card-spacing add">
						<div class="row">
								<div class=" col-md-4">
								  	<div class="row">
								  		<div class="card text-center">
							  				<h3 class="card-title" style="color:white;"><?php echo $schedule[$i]['fid_team1']; ?></h3>
							  				<img class="card-img-bottom" src="<?php echo "css\\images\\".$id1.".png"; ?>" >
							  			</div>
							  		</div>
							  	</div>
						  		<div class="card-body col-md-1 text-center">
						  			<h3 class="card-title" style="color:blue;">vs</h3>
								</div>
						  		<div class=" col-md-4">
								  	<div class="row">
								  		<div class="card text-center">
							  				<h3 class="card-title" style="color:white;"><?php echo $schedule[$i]['fid_team2']; ?></h3>
							  				<img class="card-img-bottom" src="<?php echo "css\images\\".$id2.".png"; ?>" >
							  			</div>
							  		</div>
							  	</div>
						  	</a>	
				  			<div class="card-body col-md-3 details" >
				  				<h4>Date :</h4><h4 style="color:white;"> <?php echo date('D d-m-y',strtotime($schedule[$i]['matchdate'])); ?></h4>
				  				<h4>Time :</h4><h4 style="color:white;">  <?php echo date('h : i a',strtotime($schedule[$i]['matchdate'])); ?></h4>
				  				<h4><?= $status[$schedule[$i]['status']]?></h4>
							</div>
				  		</div>
				  		<br>
			  		</div>
			  	<?php } ?>
    		</div>
	</div>
</section>
<?php include "footer.php"; ?>
</body>
</html>


