<?php 
	session_start();
	$_SESSION['onpage']="schedule";
	$id = $_GET['id'];

	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");

	$query1="SELECT fid_team1, fid_team2 FROM matches where pid_matches = $id";
	

	$result1=mysqli_query($mmnctdb,$query1);
	while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
		$fid_team1=$row['fid_team1'];
		$fid_team2=$row['fid_team2'];
	}

	$query4="(select pid_teams from teams where name = '$fid_team1')";
	$query5="(select pid_teams from teams where name = '$fid_team2')";


	$result4=mysqli_query($mmnctdb,$query4);
	$result5=mysqli_query($mmnctdb,$query5);

	$team1 = array();
	$team2 = array();
	$t1score = array();
	$t2score = array();

	while($row=mysqli_fetch_array($result4,MYSQLI_ASSOC)){
		$team1id=$row['pid_teams'];
	}
	while($row=mysqli_fetch_array($result5,MYSQLI_ASSOC)){
		$team2id=$row['pid_teams'];
	}


?>

<!DOCTYPE html>

<html>
	<head>

    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mynavigation.css">
    
    <link type="text/css" rel="stylesheet" href="css/schedule.css">
    <link type="text/css" rel="stylesheet" href="css/scorecard.css">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <link href="css/stylesheet_index.css" rel="stylesheet">

	<link rel="icon" href="css/images/mmnct_logo1.png">
	<title>MMNCT</title>
</head>

<body>
    <?php include 'mynavigation.php';?>

        <section style="padding:100px;">
    		<div id='content' style="margin:100px;margin-top:100px;">		
				<div class="container">
					<form class = "form" action = "updatescorecard.php" onsubmit="return(showtext());" method = "post">
					  <div class="row myrow">
					  	<h1 style="color: blue;">Result</h1>
					    <table class="table myrow">
					      <thead>
					        <tr>
					            <th colspan="2"><?php echo $fid_team1; ?></th>
					            <th colspan="2"><?php echo $fid_team2; ?></th>
					        </tr>
					        <tr>
					            <th>Runs</th>
					            <th>Wickets</th>
					            <th>Runs</th>
					            <th>Wickets</th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr>
					            <td>
					            	<input type="number" value="0" min="0"  step="1" class="form-control" size="4" name="team1runs">
					            </td>
					            <td>
					            	<input type="number" value="0" min="0" max="10" step="1" class="form-control" size="4" name="team1wickets" id="wicket1">
					            </td>
					            <td>
					            	<input type="number" value="0" min="0" step="1" class="form-control" size="4" name="team2runs">
					            </td>
					            <td>
					            	<input type="number" value="0" min="0" max="10" step="1" class="form-control" size="4" name="team2wickets" id="wicket2">
					            </td>
					        </tr>
					    </tbody>
					    </table>
					  </div>




					  <input type="hidden" class="form-control" size="4" name="team1id" value="<?php echo htmlspecialchars($team1id); ?>">
					  <input type="hidden" class="form-control" size="4" name="team2id" value="<?php echo htmlspecialchars($team2id); ?>">
					  <input type="hidden" class="form-control" size="4" name="id" value="<?php echo htmlspecialchars($id); ?>">
					  <div class="col-md-12 text-center">
					  		<input type="submit" class="btn btn-info" value="Submit Scorecard">
					  </div>
					</form>
				</div>
    		</div>
</section>
<?php include "footer.php" ?>
</body>
</html>

