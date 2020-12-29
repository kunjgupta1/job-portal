<?php 
      include 'inc/header.php';
      include 'lib/User.php';  
       
?>		
		
		    <img class="img-fluid" src="images/image1.jpg" alt="portal" width="100%" height="auto">
		    <div class="centerbox">
			    <form class="form-inline" method="GET" action="jobsearchpage.php">
				  <div class="row">
				  	<div class="col-sm-6">
				  		<input type="text" class="form-control" id="keyword"  name="keyword" placeholder="keyword">
				  	</div>
				  	<div class="col-sm-5">
				             <input type="text" class="form-control" id="location"  name="location" placeholder="location">
				     </div>   
				     <div class="col-sm-1">
						    <button type="submit" class="btn btn-primary">Search</button>
					 </div>
				   </div>		
				</form>
			  </div>
		   
			</nav>
		 

		   <div class="container-fluid">
			  <h1 style="text-align: center;">Recent job</h1>
			  <?php
			  	$user = new User();
			  	$postdata = $user-> getPostData();
			  	if ($postdata)
			  	 {
			  	   foreach ($postdata as $pdata) 
                   {
                     
			  ?>
			  <div class="container-fluid">
			  	<div class="table-responsive">
			  	<table class="table table-hover">
			
			  		<tr>
			  			<td width="20%"><?php echo $pdata['post_date'];?> </td>
			  			<td width="10%">
			  				<img class="img-fluid" src="images/image1.jpg" alt="portal" width="50px" height="auto">
			  			</td>
			  			<td width="20%"><?php echo $pdata['job_title'];?></td>
			  			<td width="20%"><?php echo $pdata['company_name'];?></td>
			  			<td width="10%"><?php echo $pdata['salary'];?></td>
			  			<td width="10%"><?php echo $pdata['location'];?></td>
			  			<td width="10%">Full-time</td>
			  	
			  			<td>
			  				<?php  
			  				 $userlogin  = Session::get("login");
        					if ($userlogin == true)
        					{
			  					
			  				?>
			  				<a class="btn btn-success" href="jobdescriptionpage.php?id=<?php echo $pdata['post_id'];?>">Apply-now</a>
        					<?php } else{?>
        						<a class="btn btn-success" href="login.php">Login</a>
        					<?php }?>	
			  			</td>	
			  		</tr>
			<?php } } else{?>
		              <tr>
		                <td colspan="5"><h2>NO User data found..</h2></td>
		              </tr>
		            <?php }?>
					
			  	</table>
			  	 
			  </div>
		    </div>
	    </div>
<?php
	include 'inc/footer.php';
?>		    