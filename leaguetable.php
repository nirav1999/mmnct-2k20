<?php 
session_start();
$_SESSION['onpage'] = 'leaguetable';

$mysqli=mysqli_connect("localhost","root","","mmnctsql");

$sql="select * from leaguetable order by points desc,Loss asc,draw asc";

$result=mysqli_query($mysqli,$sql);

$values=array();

$count=0;
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
	$values[]=$row;
	$count++;

}

$sql2="select * from leaguetable2 order by points desc,Loss asc,draw asc";

$result=mysqli_query($mysqli,$sql2);

$values2=array();

$count2=0;
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
	$values2[]=$row;
	$count2++;
}
?>

<!DOCTYPE html>

<html>

<head>
  
    <link rel="stylesheet" href="css/leaguetable.css">

    <link href="css/mmnct.css" rel="stylesheet">

    <link href="css/stylesheet_index.css" rel="stylesheet">

           <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="icon" href="css/images/mmnct_logo1.png">
	<title>MMNCT</title>
</head>

<body>


    <?php include 'mynavigation.php';?>
    <Br>
    <bR>
    <br>
    <section style="padding:100px;">
    		<div id='content' class="main" style="margin-left:100px;margin-right:100px;">

    			<h3 id="matchno" class="match" style="margin-left: 480px;"><b  class="add" style="color:white;">GROUP A</b></h3>


					<table class="table table-bordered table-hover">

						<tr>
						<thead>
							<th>Position</th>
							<th>Name</th>
							<th>MatchesPlayed</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>Draws</th>
							<th>Points</th>
						</thead>
						</tr>
						<?php for($i=0;$i<$count;$i++) { ?>
						<tr style="color:white;">
							<td><?= $i+1 ?></td>
							<td class="name"><?php $image1="css/images/".$values[$i][7].".png" ; ?><img src="<?php echo $image1 ; ?>" class="miimage"><span class="tab"><?= $values[$i][1]?></span></img></td>
							<td><?= $values[$i][2] ?></td>
							<td><?= $values[$i][3] ?></td>
							<td><?= $values[$i][4] ?></td>
							<td><?= $values[$i][5] ?></td>
							<td><?= $values[$i][6] ?></td>
						</tr>
					<?php } ?>
					</table>
				
			</div>

			<br>
			<br>
			<br>
			<div id='content' class="main" style="margin-left:100px;margin-right:100px;">

				    			<h3 id="matchno" class="match" style="margin-left: 480px;"><b  class="add" style="color:white;">GROUP B</b></h3>

					<table class="table table-bordered table-hover">

						<tr style="color:white;">
						<thead>
							<th>Position</th>
							<th>Name</th>
							<th>MatchesPlayed</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>Draws</th>
							<th>Points</th>
						</thead>
						</tr>
						<?php for($i=0;$i<$count2;$i++) { ?>
						<tr >
							<td><?= $i+1 ?></td>
							<td class="name"><?php $image1="css/images/".$values2[$i][7].".png" ; ?><img src="<?php echo $image1 ; ?>" class="miimage"><span class="tab"><?= $values2[$i][1]?></span></img></td>
							<td><?= $values2[$i][2] ?></td>
							<td><?= $values2[$i][3] ?></td>
							<td><?= $values2[$i][4] ?></td>
							<td><?= $values2[$i][5] ?></td>
							<td><?= $values2[$i][6] ?></td>
						</tr>
					<?php } ?>
					</table>
				
			</div>
	</div>
	</section>
	<?php include 'footer.php' ?>
</body>
 <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
</html>