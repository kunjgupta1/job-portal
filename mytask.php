<?php 
   include 'inc/header.php';
   include 'lib/User.php';
   $user   = new User();
?>
<?php
        include 'inc/profileheader.php';
?>
<?php
      
      $loginid = Session::get('id');
      if(isset($_GET['action']))
      {
       $post_id = $_GET['action'];
       $delete = $user->deletemytask($post_id,$loginid);
      } 
  ?>   

 
	<div class="col-lg-8 " style="margin-top: 10px;">
      <div class="panel panel-default">  	
    	<div class="panel-body">
<?php
 	 if (isset($delete)) 
 	 {
 		echo $delete;
 	 }
 ?>       		
           <div class="well">
             <h1 style="text-align: center;">Posted Task</h1>
             <form method="POST" action="">
             	<table class="table table-hover">
             		<tr>
             			<th>sr.no</th>
             			<th>job title</th>
             			<th>company name</th>
             			<th>salary</th>
             			<th>location</th>
             			<th>type</th>
             			<th>Action</th>
             		</tr>
             		<?php 
             		 $login_id = Session::get("id");
             			
             			$mytask = $user->mytask($login_id); 
             			if ($mytask)
             			{
             				$i = 0; 
             				foreach ($mytask as $mtask)
             				 {		
             					$i++;
             		 ?>
             		<tr>
             			<td><?php echo $i;?></td>
             			<td><?php echo $mtask['job_title'];?></td>
             			<td><?php echo $mtask['company_name'];?></td>
             			<td><?php echo $mtask['salary'];?></td>
             			<td><?php echo $mtask['location'];?></td>
             			<td>full-time</td>
             			<td>
             				<a href="?action=<?php echo $mtask['post_id']?>" class="btn btn-success">Delete</a>
             				
             			</td>
             		</tr>
             		<?php } }?>
             	</table>
             </form>  
     
  		   </div>
        </div>        
      </div>
    </div> 
    
<?php 
       include 'inc/profilefooter.php';
?>




