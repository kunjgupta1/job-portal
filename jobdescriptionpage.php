<?php 
   include 'inc/header.php';
   include 'lib/User.php';
?>
  <?php
  		if (isset($_GET['id']))
  		{
  			$postid = (int)$_GET['id'];
  		}
  		

  ?>

<div class="panel panel-default">
    	<div class="panel-body" style="margin-bottom: -20px; ">
           <div class="well">
    		 <?php 
    		 	$user = new User();
    		 	$loginid = Session::get('id');
			  	$postdata = $user-> jobdescription($postid);
			  	if ($postdata)
			  	 {
			  	   foreach ($postdata as $pdata) 
                   {

    		 ?>
				<div class="row">
					<div class="col-sm-8">
						<h1><?php echo $pdata['job_title'];?></h1>
						<h3><?php echo $pdata['company_name'];?></h3>
						<h6><?php echo $pdata['experience'];?></h6>
						<h6><?php echo $pdata['salary'];?></h6>
						<h6><?php echo $pdata['location'];?></h6>
						<p><?php echo $pdata['post_date'];?></p>
						<?php  
							if ($pdata['login_id'] == $loginid) 
							{
						?>
					  <?php } else{?>
					  	<div>
						<a href="notification.php?id=<?php echo $pdata['post_id']?>" class="btn btn-success" style="float: right;">Apply-job</a>	
					  </div>
					  <?php }?>
					</div>
					<div class="col-sm-4">
						<img class="img-fluid" src="images/image1.jpg" alt="portal" width="100px" height="100px">
					</div>
				
			  </div>
			</div>
			<div class="well">
				<h2>Job description</h2>
				<h4>Job Description & Responsibility :</h4>
				<p>
					<?php echo $pdata['job_description'];?>
				</p>
			</div>
		<?php } }?>
        </div>  
         
</div>
    
<?php  include 'inc/footer.php';?>
