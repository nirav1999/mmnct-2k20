<?php 
session_start();
$_SESSION['onpage']="players";
$_SESSION['search']=$_POST["byname"];

?>

<!DOCTYPE html>

<html>

<head>
	<meta name=viewport content="width=device-width, initial-scale=1"> 
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/typeahead.js"></script>
	</script>

	
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="css/mynavigation.css">

        <link href="css/mmnct.css" rel="stylesheet">

            <link href="css/stylesheet_index.css" rel="stylesheet">

    <link rel="stylesheet" href="css/stats.css">

    
    
	<title>MMNCT</title>
	<link rel="icon" href="css/images/mmnct_logo1.png">
</head>

<body>

    <?php include 'mynavigation.php';?>
    <br>
    <br>
    <br><br>
    		<div id='content' class="main">

			<div class="search-bar blur">
				<form action="#" method="post">
					
					<div class="col-md-6" >
							
						<div class="bgcolor">
							<label class="demo-label blur">Search Player:</label><br/> 
							<input type="text" placeholder="Player Name" name="byname" id="txtPlayer" class="typeahead" value="<?= $_SESSION["search"]?>" autocomplete="off">
							<button type="submit" name="action" value="bynamebutton" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>Search</button>
							
						</div>
					</div>
					<!--<label>Search by Team:</label>-->
					<div class="col-md-6 bgcolor">
						<label class="demo-label  blur">Search Player by team:</label><br/> 
						<select type="text" class="myhead" name="byteam" value="Avengers">
  <option value="Avengers">Avengers</option>
  <option value="Samurai">Samurai</option>
  <option value="Shaolin Monks">Shaolin Monks</option>
  <option value="Ninjas">Ninjas</option>
    <option value="Scorpions">Scorpions</option>
  <option value="Spartans">Spartans</option>
  <option value="Immortals">Immortals</option>
  <option value="Herculeans">Herculeans</option>
</select>
						<select type="text" placeholder="Player type" name="ptype" class="myhead" autocomplete="off">
							<option value="Batsman">Batsman</option>
							<option value="All-Rounder">All-Rounder</option>
							<option value="Bowler">Bowler</option>
						</select>
						<select type="text" placeholder="Sort by" name="sorttype" class="myhead" autocomplete="off">
							<option value="asc">Ascending</option>
							<option value="desc">descending</option>
						</select>
						<button type="submit" name="action" value="byteambutton" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>Search</button>
					</div>
				</form>
			</div>

			<?php 
				$mysqli=mysqli_connect("localhost:3306","root","","mmnctsql");
				$touch=0;

				$types=array("","Batsman","All-Rounder","Bowler");

$teams=array("","Avengers","Shaolin Monks","Scorpions","Immortals","Samurai","Spartans","Herculeans","Ninjas");

				if(!empty($_POST['byname'])){
					if($_POST['action']=='bynamebutton')
					{
						$name=$_POST['byname'];

						$sql="select * from players where name='".$name."' ";

						$result=mysqli_query($mysqli,$sql);

						if(mysqli_num_rows($result)>0){
							$touch=1;
							$values=mysqli_fetch_array($result,MYSQLI_NUM);
						}
					}
				}
				elseif(!empty($_POST['byteam']) and !empty($_POST['ptype']) and !empty($_POST['sorttype'])){
					if($_POST['action']=='byteambutton'){
						$team=array_search(strtolower($_POST['byteam']),array_map('strtolower', $teams));
						$type=array_search(strtolower($_POST['ptype']),array_map('strtolower',  $types));
						$sort=$_POST['sorttype'];

						$sql="select * from players where fid_team=$team and type=$type order by name $sort ";

						$values=array();

						$result=mysqli_query($mysqli,$sql);

						$num=0;

							while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
								$values[]=$row;
								$num=$num+1;
							}

							if($num>0)
							{
								$touch=2;
							}
						}
					}
				
			?>

			<div style="margin-left:150px;margin-right:150px;">

			<?php if($touch==1){ ?>

				<table class="table-bordered table-hover table">

					<tr>
						<thead>
							<th>Name</th>
							<th>Team</th>
							<th>Type</th>
						</thead>
					</tr>

					<tr>
						<td><?= $values[1] ?></td>
						<td><?php $image="css/images/".$values[2].".png" ?><img src="<?php echo $image ?>" class="miimage"><span class="tab"><?= $teams[$values[2]] ?></span></td>
						<td><?= $types[$values[3]] ?></td>

					</tr>
				</table>

			<?php } 
			elseif($touch==2){ ?>

				<table class="table table-bordered table-hover">

					<tr>
						<thead>
							<th>Name</th>
							<th>Team</th>
							<th>Type</th>

						</thead>
					</tr>

					<?php for($i=0;$i<$num;$i++){ ?>
						<tr>
							<td><?= $values[$i][1] ?></td>
							<td><?php $image="css/images/".$values[$i][2].".png" ?><img src="<?php echo $image ?>" class="miimage"><span class="tab"><?= $teams[$values[$i][2]] ?></span></td>
							<td><?= $types[$values[$i][3]] ?></td>

						</tr>
					<?php }


				} ?>
				</table>

			</div>
		</div>
	</div>
	<br>
	<br>
	<Br>
</body>

</html>

