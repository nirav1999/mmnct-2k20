<?php
	session_start();

	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");
	$id=$_GET['id'];
	$plid=$_GET['id']*100;

	/*Query Strings */
	$tq="SELECT * FROM teams where pid_teams=$id";
	for($i=1;$i<12;$i++)
		$pi[$i]="SELECT * FROM players WHERE id_player=$plid+$i";
	
	/*Query executed */
	$result=mysqli_query($mmnctdb,$tq);
	for($i=1;$i<12;$i++)
		$playerinfo[$i]=mysqli_query($mmnctdb,$pi[$i]);

	/*Query output */
	$title=mysqli_fetch_array($result,MYSQLI_ASSOC);
	for($i=1;$i<12;$i++)
		$plinfo[$i]=mysqli_fetch_array($playerinfo[$i],MYSQLI_ASSOC);

	for($i=1;$i<12;$i++){
		if($plinfo[$i]['type']==1) $pltype[$i]="Batsman"; 
		elseif($plinfo[$i]['type']==2) $pltype[$i]="All-Rounder"; 
		elseif($plinfo[$i]['type']==3) $pltype[$i]="Bowler"; 
	}
	$icon="css\images\\".$id . ".png";
	$count=1;
?>

<!DOCTYPE html>
<html>
	<head>
	
    <link rel="stylesheet" href="css/font-awesome.css">

        <link href="css/mmnct.css" rel="stylesheet">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/mynavigation.css">
    
    <link type="text/css" rel="stylesheet" href="css/teams.css">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <link href="css/stylesheet_index.css" rel="stylesheet">


	<title>MMNCT</title>
	<link rel="icon" href="css/images/mmnct_logo1.png">
</head>

<body>
	
    <?php include 'mynavigation.php';?>
    <section style="padding:100px;">
    		<div id='content' class="main" style="margin-left:200px;margin-right:200px;">
			<div class="row">
					<div class="card col-md-4 text-center" style="margin-left: 130px;"><img class="card-img-top-team" src="<?php echo $icon; ?>"></div>
					<div class="card col-md-6 teaminfofont" style="margin-top: 4vh; margin-left: 2vh;">
						<br>
						<br>
						<br>
						<br>
						<h1><?php echo $title['name']; ?></br></br></h1>
						<h3><font style="color:blue">Captain:</font>   <?php echo $title['captain'];?> </br></h3>
					</div>
				</div>
				<table>
					<thead>
						<tr>
							<th>Player Name</th>
							<th>Player Type</th>
						</tr>
					</thead>
					<tr>
						<td><b><?php echo $plinfo[$count]['name'];?></b> <?php echo " (C)"; ?></td>
						<td><?php echo $pltype[$count]; 
								$count=$count+1;?></td>
					</tr>
					<?php  while($count!=11){ ?>
					<tr>
						<td><?php echo $plinfo[$count]['name'] ?></td>
						<td><?php echo $pltype[$count]; ?></td>
					</tr>
					<?php $count=$count+1; }?>
				</table>
			</div>
		</div>
    </section>
<?php include "footer.php"; ?>
</body>
</html>
