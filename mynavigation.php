 <?php

$mysqli = mysqli_connect("localhost:3306","root","","mmnctsql");
if (!empty($_POST['username']) 
               && !empty($_POST['password'])) {
  
  $_SESSION['user']=$_POST['username'];
  $_SESSION['pass']=$_POST['password'];


  $sql="select * from users where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."'  ";

  $result=mysqli_query($mysqli,$sql);

  if($row=mysqli_fetch_array($result,MYSQLI_NUM)){
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $row['name'];
    header('Location: '.$_SERVER['REQUEST_URI']);

  }
  else{
          $flag=0;
  }
}
if (!empty($_POST['name']) ) {
  
  $uname1=$_POST['username'];
  $pass1=$_POST['password'];
  $name1=$_POST['name'];
  $email1=$_POST['email'];

   $sql="select * from users where username='".$uname1."'";

  $result=mysqli_query($mysqli,$sql);


if(mysqli_num_rows($result)==0)
{
  $sql="insert into users(username,password,name,email) values('".$uname1."','".$pass1."','".$name1."','".$email1."')";

  mysqli_query($mysqli,$sql);

    $_SESSION['isLoggedIn'] = true;
    $_SESSION['user'] = $_POST['name'];
    header('Location: '.$_SERVER['REQUEST_URI']);  
}
else
{
    $flag1=0;

}
}
?>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <nav class="navbar  navbar-default navbar-fixed-top" style="background-color: #004d99;">
        <div class="container">
            <div class="navbar-header page-scroll">

                <a class="navbar-brand" href="#page-top">MMNCT 2020</a>
            </div>
                <ul class="nav navbar-nav navbar-right">
                     <li <?php if($_SESSION['onpage'] == 'home'){?> class="active page-scroll" <?php } ?> ><a href="home.php">Home</a></li>
            <li <?php if($_SESSION['onpage'] == 'leaguetable'){?> class="active page-scroll" <?php } ?> ><a href="leaguetable.php">Points Table</a></li>
            <li <?php if($_SESSION['onpage'] == 'schedule'){?> class="active page-scroll" <?php } ?> ><a href="schedule.php">Schedule</a></li>
            <li <?php if($_SESSION['onpage'] == 'players'){?> class="active page-scroll" <?php } ?> ><a href="stats.php">Player Stats</a></li>
            <li <?php if($_SESSION['onpage'] == 'teams'){?> class="active page-scroll" <?php } ?> ><a href="teams.php">Teams</a></li>
                              <li class="page-scroll">
        <?php if($_SESSION['isLoggedIn']) { ?>
         <a><span class="glyphicon glyphicon-th-large"></span> <?php echo $_SESSION['user']; ?></a>
       <?php } else {?>
          <a  data-toggle="modal" data-target="#modal-1"><span class="glyphicon glyphicon-user"></span>Sign Up</a>
       <?php } ?>
           
      </li>
      <li class="page-scroll">
        <?php if(!$_SESSION['isLoggedIn']) { ?>
         <a href='#' data-toggle="modal" data-target="#modal-2"><span class="glyphicon glyphicon-log-in"></span> Login</a>
       <?php } else {?>
          <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
       <?php } ?>
   </li>
                </ul>
            </div>
        </div>
    </nav>


     <div class="modal fade" id="modal-1" style="color:black;">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

     <div class="modal-header" id="titlefeedbackmodal">                                
                        <button type="button" class="close" data-dismiss="modal">&times;</button>              
                                             <div class="row">
                                                <div class="col-lg-12 text-center star-primary">
                                                  <h2>signup</h2>
                                                 <hr class="star-primary">
                                                </div>
                                             </div>
                     </div>     
                          <div class="modal-body">
                               <font class=" col-lg-12 text-center">    
                      <?php if(isset($flag1))
        if($flag1==0){
      echo '"username already taken."';
      }
    ?></font>
                        <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
                </div>
              </div>
            </div>

            <div class="form-group ">

              <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" name="Submit"/>
            </div>
            
          </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

                

  
     <div class="modal fade" id="modal-2" style="color:black;">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

     <div class="modal-header" id="titlefeedbackmodal">                                
                        <button type="button" class="close" data-dismiss="modal">&times;</button>              
                                             <div class="row">
                                                <div class="col-lg-12 text-center star-primary">
                                                  <h2>Log In</h2>
                                                 <hr class="star-primary">
                                                </div>
                                             </div>
                     </div>

                          <div class="modal-body">
                                                 <font class=" col-lg-12 text-center">    
                      <?php if(isset($flag))
        if($flag==0){
      echo '"wrong password or username"';
      echo "<script>alert(wrong password or username)</script>";}
    ?></font>
                        <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
          <form method="post" class="form-container" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on">

          <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername" placeholder="username" name="username" required>

            <label for="exampleInputPassword">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword" placeholder="password" name="password" required>

          </div>
          </div>
          <center><button type="submit" class="btn btn-success btn-block" name="Login">Log In</button></center>
        </form>

                </div>
                </div>
                </div> 
              </div>
            </div>
          </div>

 
 <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
     <?php if(isset($flag1))
        if($flag1==0){
      echo "<script>alert('username already taken.');</script>";}
    ?>

      <?php if(isset($flag))
        if($flag==0){
      echo "<script>alert('wrong password or username');</script>";}
    ?></font>