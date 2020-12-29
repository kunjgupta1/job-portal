<?php 
   include 'inc/header.php';
   include 'lib/User.php';
   include 'lib/format.php';
   $user = new User();
   $fm = new Format();
?>
<?php
			if (isset($_GET['keyword']) || isset($_GET['location']))
			{
				$keyword = $_GET['keyword'];
				$location = $_GET['location'];
			}
			
			 
?>

<div class="panel panel-default" style="padding: 40px;">
    	<div class="panel-heading">
    		<h3>Result... </h3>
    	</div>
<?php
   $search = $user->jobsearch($keyword , $location);
	if ($search)
	 {
		foreach ($search as $job) 
		{		
			$loginid = Session::get('id');
			if ($loginid) {
				
?>  	
    <a href="jobdescriptionpage.php?id=<?php echo $job['post_id']?>" style="color: #000000">	
    	<div class="panel-body" style="margin-bottom: -30px; ">
           <div class="well">
    		 <div style="max-width:600px;margin:0 auto;">
				<div class="row">
					<div class="col-sm-8">
						<h1><?php echo $job['job_title'];?></h1>
						<h3><?php echo $job['company_name'];?></h3>
						<h6><?php echo $job['experience'];?></h6>
						<h6><?php echo $job['salary'];?></h6>
						<h6><?php echo $job['location'];?></h6>
						<p>
							<?php echo $fm->textshorten($job['job_description']);?>
						</p>
					</div>
					<div class="col-sm-4">
						<img class="img-fluid" src="images/image1.jpg" alt="portal" width="100px" height="100px">
					</div>
				</div>
			  </div>
			</div>
        </div>  
      </a>          
       <?php }else {?> 
       	
       	<a href="#" style="color: #000000">	
    	<div class="panel-body" style="margin-bottom: -30px; ">
           <div class="well">
    		 <div style="max-width:600px;margin:0 auto;">
				<div class="row">
					<div class="col-sm-8">
						<h1><?php echo $job['job_title'];?></h1>
						<h3><?php echo $job['company_name'];?></h3>
						<h6><?php echo $job['experience'];?></h6>
						<h6><?php echo $job['salary'];?></h6>
						<h6><?php echo $job['location'];?></h6>
						<p>
							<?php echo $fm->textshorten($job['job_description']);?>
						</p>
					</div>
					<div class="col-sm-4">
						<img class="img-fluid" src="images/image1.jpg" alt="portal" width="100px" height="100px">
					</div>
				</div>
			  </div>
			</div>
        </div>  
      </a>          
       <?php }   }  } else {?>
       	<h1>data not found</h1>
       	<?php }?>
</div>
    
<?php  include 'inc/footer.php';?>
