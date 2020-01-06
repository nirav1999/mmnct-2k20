<?php
session_start();
$id=$_POST['id'];
$winner =0;

$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");

	$query1="SELECT group_stage FROM matches where pid_matches = $id";
	
	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql"); 

	$result1=mysqli_query($mmnctdb,$query1);
	while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
		$groupst=$row['group_stage'];
	}
?>

	<script>
    console.log(<?= $query1 ?>);
</script>
<?php
	if($id==13)
	{
	if($_POST['team1runs'] > $_POST['team2runs']) {
		$winner = $_POST['team1id'];
		$losser= $_POST['team2id'];
		$finalscore = $_POST['team1runs']."/".$_POST['team1wickets']."-".$_POST['team2runs']."/".$_POST['team2wickets'];
				$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");   
				$query ="UPDATE matches SET status = 1,result = '$finalscore',winner=$winner WHERE pid_matches=$id";
				mysqli_query($mmnctdb,$query);
				$addr = "showscorecard.php?id=".$id;
				header("Location: ".$addr); 
	}
	else
	{
		$winner = $_POST['team2id'];
		$losser= $_POST['team1id'];
		$finalscore = $_POST['team1runs']."/".$_POST['team1wickets']."-".$_POST['team2runs']."/".$_POST['team2wickets'];
				$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");   
				$query ="UPDATE matches SET status = 1,result = '$finalscore',winner=$winner WHERE pid_matches=$id";
				mysqli_query($mmnctdb,$query);
				$addr = "showscorecard.php?id=".$id;
				header("Location: ".$addr); 
	}
}
elseif($_POST['team1runs'] > $_POST['team2runs']) {
	$winner = $_POST['team1id'];
	$losser= $_POST['team2id'];
	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");    
	$query ="UPDATE leaguetable SET win = win+1,matches_played=matches_played+1,points=points+3 WHERE team_id=$winner ";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable SET loss = loss+1,matches_played=matches_played+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET win = win+1,matches_played=matches_played+1,points=points+3 WHERE team_id=$winner";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET loss = loss+1,matches_played=matches_played+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);
	$finalscore = $_POST['team1runs']."/".$_POST['team1wickets']."-".$_POST['team2runs']."/".$_POST['team2wickets'];
$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");   
$query ="UPDATE matches SET status = 1,result = '$finalscore',winner=$winner WHERE pid_matches=$id";
mysqli_query($mmnctdb,$query);
$addr = "showscorecard.php?id=".$id;
header("Location: ".$addr); 

}
elseif ($_POST['team1runs'] < $_POST['team2runs']) {
	$winner = $_POST['team2id'];
	$losser= $_POST['team1id'];
	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");    
	$query ="UPDATE leaguetable SET win = win+1,matches_played=matches_played+1,points=points+3 WHERE team_id=$winner";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable SET loss = loss+1,matches_played=matches_played+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET win = win+1,matches_played=matches_played+1,points=points+3 WHERE team_id=$winner";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET loss = loss+1,matches_played=matches_played+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);
	$finalscore = $_POST['team1runs']."/".$_POST['team1wickets']."-".$_POST['team2runs']."/".$_POST['team2wickets'];
$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");    
$query ="UPDATE matches SET status = 1,result = '$finalscore',winner=$winner WHERE pid_matches=$id";
mysqli_query($mmnctdb,$query);
$addr = "showscorecard.php?id=".$id;
header("Location: ".$addr);  

}
elseif ($_POST['team1runs'] == $_POST['team2runs']){
	$winner = $_POST['team2id'];
	$losser= $_POST['team1id'];
	$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");    
	$query ="UPDATE leaguetable SET matches_played=matches_played+1,points=points+1,draw=draw+1 WHERE team_id=$winner";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable SET matches_played=matches_played+1,points=points+1,draw=draw+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET matches_played=matches_played+1,points=points+1,draw=draw+1 WHERE team_id=$winner";
	mysqli_query($mmnctdb,$query);
	$query ="UPDATE leaguetable2 SET matches_played=matches_played+1,points=points+1,draw=draw+1 WHERE team_id=$losser";
	mysqli_query($mmnctdb,$query);

	$finalscore = $_POST['team1runs']."/".$_POST['team1wickets']."-".$_POST['team2runs']."/".$_POST['team2wickets'];
$mmnctdb = new mysqli("localhost", "root", "", "mmnctsql");    
$query ="UPDATE matches SET status = 1,result = '$finalscore',winner='draw' WHERE pid_matches=$id";
mysqli_query($mmnctdb,$query);
$addr = "showscorecard.php?id=".$id;
header("Location: ".$addr);  


}
?>
