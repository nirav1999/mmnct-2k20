<?php 
	session_start();
	$_SESSION['onpage']="schedule";

	$mmnctsql = new mysqli("localhost:3306", "root", "", "mmnctsql");

	$sc="SELECT * FROM matches where status=1";

	$result=mysqli_query($mmnctsql,$sc);

	$schedule1 = array();
	$schedule2	= array();

	$count=0;
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$count=$count+1;
	}

	
	$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");


	if($count>=12)
	{
		$query="SELECT * from leaguetable ORDER BY points DESC LIMIT 1";

		$result1=mysqli_query($mmnctsql,$query);
		while($row=mysqli_fetch_array($result1,MYSQLI_NUM)){
		$schedule1[]=$row;
	}

		$query="SELECT * from leaguetable2 ORDER BY points DESC LIMIT 1";

		$result2=mysqli_query($mmnctsql,$query);
		while($row=mysqli_fetch_array($result2,MYSQLI_NUM)){
		$schedule2[]=$row;
	}

			if($count==12)
		{

		 $sql="insert into matches values(13,'2020-02-09 20:00:00','".$schedule1[0][1]."','".$schedule2[0][1]."',0,'not yet played','FL','')";
  		mysqli_query($mmnctsql,$sql);
  	}

	  		$sc="SELECT status FROM matches where pid_matches=13";

  		$schedule=array();

	$result=mysqli_query($mmnctsql,$sc);

		while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
		$schedule[]=$row;
	}


	}
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
    <section style="padding:140px;">
    
    		<div id='content' class="main" style="margin-left:100px;margin-right:100px;">
    			 <ul class="nav navbar-nav add" style="color:blue;">
      <li><a href="schedule.php" style="color:white;"><b>GROUP STAGES</b></a></li>
      <li><a href="final.php" style="color:gold;"><b>FINAL</b></a></li>
    </ul>

        			<?php
        			if($count>=12)
        			{
    			if($schedule[0][0] == 0 and $_SESSION['isLoggedIn']== true) {
    					$addr = "scorecard.php?id=13";
    				}
    				elseif($schedule[0][0] == 0 and $_SESSION['isLoggedIn']== false) {

    					$addr = "#";
    					$addr1=' data-toggle="modal" data-target="#modal-2"';
    				}
    				else {
    					$addr = "showscorecard.php?id=13";
    				}
    				$id1=(string)array_search($schedule1[0][1], $teams);
    				$id2=(string)array_search($schedule2[0][1], $teams);
    			}
    			?>

    			<br>
    			<br>
    			<br>
    			<br>
    			<br>
					<h3 id="matchno" class="match" style="margin-left: 320px;"><b  class="add" style="color:gold">FINAL</b></h3>
				
					<a href="
					<?php if($count>=12){
					echo $addr;
					if(isset($addr1))echo $addr1;
					} ?>">
					<div class="card-spacing add">
						<div class="row">
								<div class=" col-md-4">
								  	<div class="row">
								  		<div class="card text-center">
							  				<h3 class="card-title" style="color:white;"><?php if($count>=12) echo $schedule1[0][1]; ?></h3>
							  				<img class="card-img-bottom" src="<?php if($count>=12) echo "css\\images\\".$id1.".png";else{ echo "css\images\\A.png"; } ?>" alt="Group A Winner" >
							  			</div>
							  		</div>
							  	</div>
						  		<div class="card-body col-md-1 text-center">
						  			<h3 class="card-title" style="color:gold">vs</h3>
								</div>
						  		<div class=" col-md-4">
								  	<div class="row">
								  		<div class="card text-center">
							  				<h3 class="card-title" style="color:white;"><?php if($count>=12) echo $schedule2[0][1]; ?></h3>
							  				<img class="card-img-bottom" src="<?php if($count>=12) echo "css\images\\".$id2.".png";else{ echo "css\images\\B.png"; } ?>" alt="Group B Winner">
							  			</div>
							  		</div>
							  	</div>
							 	
				  			<div class="card-body col-md-3 details" >
				  				<h4><font style="color:white;">Date :</font><font style="color:gold;"> 2020-02-09</font></h4>
				  				<h4><font style="color:white;">Time :</font><font style="color:gold;">20:00:00 PM</font></h4>
							</div>
							 </div>
							</div>
						  	</a>
				  		</div>
</section>
<?php include "footer.php"; ?>
</body>