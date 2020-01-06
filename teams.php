<?php
	session_start();
	$_SESSION['onpage'] = 'teams';
		$mmnct = new mysqli("localhost:3306", "root", "", "mmnctsql");

	$sc="SELECT * FROM teams";

	$result=mysqli_query($mmnct,$sc);

	$schedule = array();

	while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
		$schedule[]=$row;
	}

	
	$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");

?>

<!DOCTYPE html>
<html>
	<head>
	<meta name=viewport content="width=device-width, initial-scale=1"> 

    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mynavigation.css">
    <link rel="stylesheet" href="css/teams.css">
        <link href="css/stylesheet_index.css" rel="stylesheet">

	<title>MMNCT</title>
	<link rel="icon" href="css/images/mmnct_logo1.png">
</head>

<body>
    <?php include 'mynavigation.php';?>
        <section style="padding:100px;">
    		<div id='content' class="col-md-10 main" style="margin-left:50px;">
    			<div class="row">
    				<?php for($i=0; $i<mysqli_num_rows($result)/2; $i++) { ?>
		  			<div class="col-md-3">
		  				<a href="<?php echo "teaminfo.php?id=".$schedule[$i][0]; ?>">
				  			<div class="card text-center">
				  				<img class="card-img-top" src="<?php echo "css\\images\\".$schedule[$i][0].".png"; ?>">
				  				<div class="card-body">
				  					<h5 class="card-title" style="color:white;font-weight: 800;"><?= $schedule[$i][1] ?></h5>
				  				</div>
				  			</div>
				  		</a>
			  		</div>
			  	<?php } ?>
			  </div>
			  <div class="row">
    				<?php for(; $i<mysqli_num_rows($result); $i++) { ?>
		  			<div class="col-md-3">
		  				<a href="<?php echo "teaminfo.php?id=".$schedule[$i][0]; ?>">
				  			<div class="card text-center">
				  				<img class="card-img-top" src="<?php echo "css\\images\\".$schedule[$i][0].".png"; ?>">
				  				<div class="card-body">
				  					<h5 class="card-title"  style="color:white;font-weight: 800;"><?= $schedule[$i][1] ?></h5>
				  				</div>
				  			</div>
				  		</a>
			  		</div>
			  	<?php } ?>
			  </div>
			</div>			
		</section>
		        <section style="padding:100px;">
		        </section>
		        <section style="padding:100px;">
		        </section>
		        <section style="padding:100px;">
		        </section>
		    <?php include "footer.php"; ?>
</body>
</html>