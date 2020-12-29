<?php
     
      include 'lib/User.php';
      include 'inc/header.php';
      $user = new User();
?>
     <?php
        include 'inc/profileheader.php';
     ?> 

     <?php
         $loginid =  Session::get("id");
         if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update']))
           {
            $userUpdate = $user->userUpdate($loginid  ,$_POST);
           } 
     ?>
     <div class="col-lg-8"  style="margin-top: 10px">
       <div class="panel panel-default">
          <div class="panel-heading">
            <strong> My Profile</strong>
          </div> 

          <div class='col-md-4 panel panel-default'>
              <img src="images/image1.jpg" style='width:400;height:250px'class='img img-thumbnail'>
          </div>
             
 <?php
    if (isset($userUpdate)) 
    {
        echo $userUpdate;
    }
?> 
<?php

    $userdata = $user->getUserById($loginid);
    if ($userdata) 
    {
?>
          <div class='col-md-8 panel panel-default' style='width:300;height:250px'><br/>

              <label> Name </label> <br/>
              <label> <?php echo $userdata->name; ?></label><br/><br/>
              <label> Email </label> <br/>
              <label> <?php echo $userdata->email; ?></label><br/><br/>
          </div>
        </div>   
      </div>
    </div>
   </div>
    <div class="container-fluid">
      <div class="row" style="clear:both">
          <div class="col-lg-12">
            <div class="col-lg-4">
            </div>


            <div class="col-lg-8">
              <div class="panel panel-default">   
                <div class="panel-body">
                  <div class="well">
                    <form action="" method="POST">
                          <div class="form-group">
                              <label for="skills">skills</label>
                              <input type="text" id="skill" name="skill" placeholder="java,php" value="<?php echo $userdata->skill; ?>" class="form-control"/>
                          </div>
                          <div class="form-group">
                              <label for="Experience">Experience</label>
                              <input type="text" id="experience" name="experience" placeholder="2-3Y" value="<?php echo $userdata->experience; ?>" class="form-control"/>
                          </div>
                  
                           <div class="form-group">
                              <label for="projects">projects</label>
                              <textarea name="project" rows='4' cols="50"  placeholder="Enter your Details about your projects" value="<?php echo $userdata->project; ?>" class="form-control"></textarea>
                          </div>

                          <button class="btn btn-success" type="submit" name="update">Update-profile</button>
                       </form>
                   </div>
               </div>        
            </div>
         </div>
<?php }?>
     
    <?php 
       include 'inc/profilefooter.php';
     ?>

		