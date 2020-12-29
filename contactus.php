<?php
	  include 'inc/header.php';
      include 'lib/User.php';
    
?>


    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>Contact us </h2>
    	</div>
    	<div class="panel-body">
           <div style="max-width:600px;margin:0 auto;">
          <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Enter Your Name:</label>
                        <input type="text" id="name" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="email"> Enter Your Email Address:</label>
                        <input type="text" id="email" name="email" class="form-control"/>
                    </div>
                     <div class="form-group">
                              <label for="Query">your Query </label>
                              <textarea name="project" rows='4' cols="50"  placeholder="Enter what you feel "  class="form-control"></textarea>
                          </div>
                    
                    <button class="btn btn-success" type="submit" name="submit">submit</button>
                    
                 </form>
           </div>     
    	</div>
    </div>
<?php include 'inc/footer.php';?>

		