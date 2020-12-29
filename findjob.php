<?php 
   include 'inc/header.php';
   include 'lib/User.php';
?>
<?php
        include 'inc/profileheader.php';
?>
	<div class="col-lg-8 " style="margin-top: 10px;">
      <div class="panel panel-default">  	
    	<div class="panel-body">
           <div class="well">
             <h1 style="text-align: center; margin-bottom: 50px;">Searched Your job</h1>
             <div style="max-width:500px;margin:0 auto;">
                <form class="form-inline" method="GET" action="jobsearchpage.php">
                  <table>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="keyword" name="keyword"  placeholder="keyword">
                        </td>
                    
                         <td>
                             <input type="text" class="form-control" id="location"  name="location" placeholder="location">
                         </td>
                         <td >
                            <button type="submit" class="btn btn-primary">Search</button>
                         </td>
                      </tr>
                    </table>
                </form>
             </div>
          
  		   </div>
        </div>        
      </div>
    </div> 
    
<?php 
       include 'inc/profilefooter.php';
?>




