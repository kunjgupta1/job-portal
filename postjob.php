<?php 
   include 'inc/header.php';
   include 'lib/User.php';
?>
<?php
        include 'inc/profileheader.php';
?>
<?php
        $loginid =  Session::get("id");
        
        $post_date = date('l jS \of F Y');
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_job'])) 
        {
            $user_postjob = $user->postjob( $loginid,$_POST, $post_date); 
        }
?>
<div class="col-lg-8 " style="margin-top: 10px;">
  <div class="panel panel-default">  	
    	<div class="panel-body">
           <div class="well">
            <?php
              if (isset($user_postjob))
               {
                echo $user_postjob;
              }

            ?>
    		  <form action="" method="POST">
                <div class="form-group">
                    <label for="jobtitle">Job title</label>
                    <input type="text" id="jobtitle" name="jobtitle" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="companyname">companyname</label>
                    <input type="text" id="companyname" name="companyname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="experience">experience</label>
                    <input type="text" id="experience" name="experience" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="salary">salary</label>
                    <input type="text" id="salary" name="salary" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <input type="text" id="Location" name="Location" class="form-control"/>
                </div>
                 <div class="form-group">
                    <label for="Jobdescription">Job description</label>
                    <textarea name="Jobdescription" rows='4' cols="50"  placeholder="Enter your Details about your psted job or requirnments" class="form-control"></textarea>
                </div>

                <button class="btn btn-success" type="submit" name="post_job">Post-job</button>
             </form>
  		   </div>
        </div>        
    </div>
   </div> 
    
<?php 
       include 'inc/profilefooter.php';
?>
