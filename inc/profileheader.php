<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();
?>
 <?php
        
        $userlogin = Session::get("login");
        if ($userlogin == true)
         {
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">

 <title>Job Post Pannel</title>
 
 <link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
  <script type="text/javascript" src="inc/bootstrap.min.js"></script>
  <script type="text/javascript" src="inc/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="inc/style.css">
   <meta name="viewport" content="width=device-width,intial-scale=1">
 
</head>

    <?php
      if(isset($_GET['action']) && $_GET['action'] == 'logout')
      {
        Session :: destroy();
      } 
    ?>
    <?php
      $loginmsg = Session::get('loginmsg');
      if ($loginmsg) 
      {
        echo $loginmsg;
      }
      Session::set('loginmsg',NULL);
    ?>

<body>  
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container-fluid">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
            <a class="navbar-brand" href="index.php" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
      </div>

    <div id="navbar" class="navbar-collapse collapse">
  
        <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">KH portal </label>
        <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">Hello!
         <font style="font-size:18px"> 
          <?php
            $username = Session::get('username');
            if (isset($username))
             {
              echo $username;
             }

          ?>     
        </font> 
      </label>


     <ul class="nav navbar-nav navbar-right">
        <?php
            $loginid = Session::get('id');
            $user = new User();
            $count = $user->getcountjobs($loginid);
        ?>
       
        <li><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Notification(<?php echo $count ;?>) </a></li>
  
        <li><a href="?action=logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>

     </ul>

    </div>
  </div>
</nav>
  
   
  <!-- this is div for user  -->
<div class="fluid-container">
       <div class="row" style="clear:both">
          <div class="col-lg-12">
             <div class="col-lg-4">
               <div class="list-group" style="margin-left:0px;margin-top: 10px; ">
     
                  <a href="#" class="list-group-item active" style="background-color:black;">
                    All task</a>
                  
                  <a href="profile.php" class="list-group-item">Profile
                   </a>

                  
                  <a href="mytask.php" class="list-group-item">My task
                  </a>

                  <a href="postjob.php"  class="list-group-item">
                    Post Job
                  </a>
                   <a href="findjob.php" class="list-group-item">
                  Find job
                  </a>

                  <a href="notification.php" class="list-group-item">
                    Notification(<?php echo $count ;?>)
                  </a>
                  
                  <a href="changepass.php" class="list-group-item">Change Password
                  </a>

                  <a href="?action=logout" class="list-group-item">Log Out
                  </a>
             </div>
            </div>
     <?php } else {
       header("Location: index.php");
     }?>

          
