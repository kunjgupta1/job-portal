<?php 
   include 'inc/header.php';
   include 'lib/User.php';
?>
<?php
        include 'inc/profileheader.php';
        $loginid = Session::get('id');
        $user = new User();

?>
<?php  
              if (isset($_GET['id']))
                      {
                        $postid = (int)$_GET['id'];
                        $result=$user ->getjob($postid,$loginid);
                      }
?>
	<div class="col-lg-8 " style="margin-top: 10px;">
      <div class="panel panel-default">  	
    	<div class="panel-body">
        <?php
            if (isset($result))
             {
               echo $result;
            }

        ?>
           <div class="well">
             <h1 style="text-align: center;"> Picked Job</h1>
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
        
                        $postdata = $user -> notification($loginid);
                        if ($postdata)
                         {
                            $i = 0;
                           foreach ($postdata as $pdata) 
                           {
                              $i++;
                    ?>
             		<tr>
             			<td><?php echo $i;?></td>
                        <td><?php echo $pdata['job_title'];?></td>
                        <td><?php echo $pdata['company_name'];?></td>
                        <td><?php echo $pdata['salary'];?></td>
                        <td><?php echo $pdata['location'];?></td>
                        <td>full-time</td>
                        <td>
                            <a href="jobdescriptionpage.php?id=<?php echo  $pdata['post_id'];?>" class="btn btn-success">View</a>
                            
                        </td>
             		</tr>
                    <?php } } ?>
             	</table>
             </form>  		  
  		   </div>
        </div>        
      </div>
    </div> 
    
<?php 
       include 'inc/profilefooter.php';
?>




