<?php 
      include 'inc/header.php';
      include 'lib/User.php';
?>
<?php
        include 'inc/profileheader.php';
?>
	<?php
		 $loginid =  Session::get("id");
		 $user = new User();
         if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update']))
           {
              $changepass = $user->changePassword($loginid ,$_POST);
           } 

	?>
  <div class="col-lg-8 " style="margin-top: 10px;">

            <!--left-content-->
	<div class="center">
      <div class="posts">
		<div class="create-posts">
			<div class="col-sm-10 well">
				<?php
					if (isset($changepass)) 
					{
						echo $changepass;
					}
				?>
 				<form method="post">
				  	<div class="form-group">

				     <label for="oldpassword">Old Password</label>
				     <input type="password" class="form-control"
				     name="oldpassword" id="oldpassword" placeholder="Old Password" required>

				   </div>
				  
				   <div class="form-group">
				    <label for="newpassword">New Password</label>
				    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required>
				  </div>
				  
				   <div class="form-group">
				    <label for="confirmpassword">Confirm Password</label>
				    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
				  </div>
			  
				<br/>
				  <div class="form-group">
				    <button name="update" class="btn  btn-success" type="submit">Update Password</button>
				</div>
			</form>	
		   </div>
         </div>
       <div>
     </div>
   </div>						
 </div>
</div>


     <?php 
       include 'inc/profilefooter.php';
     ?>