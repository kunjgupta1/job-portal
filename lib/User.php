<?php
	include_once 'Session.php'; 
	include 'Database.php'; 

	class User
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}
		public function userRegistration($data)
		{
		  $name 		    = $data['name'];
		  $username 	    = $data['username'];
		  $email	        = $data['email'];
		  $password 	    = md5($data['password']);
		  $phone_number     = $data['phone_number'];

		  $check_email      = $this->check_email($email);
		  $check_phonenumber= $this->check_phonenumber($phone_number);

			if ($name == "" OR $username =="" OR $email == "" OR $password == "" OR $phone_number == "") 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty</div>";
				return $msg;
			}
			if (ctype_alpha($name) === false)
			 {
            	$msg = "<div class='alert alert-danger'><strong>Error! </strong>Name must only contain letters!</div>";
            	return $msg;
			 }
			if (strlen($username) < 4) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Username to short</div>";
				return $msg;
			}
			elseif (preg_match('/[^a-z0-9_-]+/i',$username)) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Username must only contain alphanumerical,dashes and underscore!</div>";
				return $msg;
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Email address is not valid!</div>";
				return $msg;
			}
			if($check_email == true)
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Alredy exist</div>";
				return $msg;
			}
			if(preg_match('/[^0-9]+/i',$phone_number))
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>phone number must only contain number!</div>";
				return $msg;
			}
			if(strlen($phone_number)>10 OR strlen($phone_number)<10)
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Phone number is not valid</div>";
				return $msg;
			}
			if($check_phonenumber == true)
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>phone number Alredy exist</div>";
				return $msg;
			}


			$sql = "INSERT INTO tbl_user(name,username,email,password,phone_number) VALUES (:name,:username,:email,:password,:phone_number)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name', $name);
			$query->bindValue(':username', $username);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->bindValue(':phone_number', $phone_number);
			$result = $query->execute();

			if ($result) 
			{
				$msg = "<div class='alert alert-success'><strong>Success! </strong>Success fully registered</div>";
				return $msg;
			}
			else
			 {
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>There has been problem inserting your details</div>";
				return $msg;
			}

		}

		 public function check_email($email)
		{
			$sql = "SELECT email FROM tbl_user WHERE email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->execute();
			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		 public function check_phonenumber($phone_number)
		{
			$sql = "SELECT phone_number FROM tbl_user WHERE  phone_number = :phone_number";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':phone_number', $phone_number);
			$query->execute();
			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
#-----------------------------------------------------------------------
					# Check user login
#-----------------------------------------------------------------------		

		public function getLoginUser($email, $password)
		{
		    $sql = "SELECT*  FROM tbl_user  WHERE email = :email AND password = :password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		//Get user login details
		public function userLogin($data)
		{
			$email	       = $data['email'];
			$password 	   = md5($data['password']);
			$check_email   = $this->check_email($email);
			if ( $email == "" OR $password == "") 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty</div>";
				return $msg;
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Email address is not valid!</div>";
				return $msg;
			}
			if($check_email == false)
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>email addess not  exist</div>";
				return $msg;
			}

			$result = $this->getLoginUser($email , $password);
			if ($result)
			 {
				Session::init();
				Session::set("login" , true);
				Session::set("id" , $result->login_id);
				Session::set("name" , $result->name);
				Session::set("username" , $result->username);
				Session::set("loginmsg" , "<div class='alert alert-success'><strong>Sucess! </strong>You are logged in!</div>");
				header("Location: profile.php");//redirect user

			 }
			 else
			 {
			 	$msg = "<div class='alert alert-danger'><strong>Error! </strong>data not found</div>";
				return $msg;
			 }
		}

		

		public function getUserById($userid)
		{
			$sql = "SELECT * FROM tbl_user WHERE login_id =:id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $userid);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public function userUpdate($id ,$data)
		{
		  $skill 		    = $data['skill'];
		  $experience 	    = $data['experience'];
		  $project	        = $data['project'];

			if ($skill == "" OR $experience =="" OR $project == "" ) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty</div>";
				return $msg;
			}
		
		  
			
			$sql = "UPDATE tbl_user set
			   skill 	= :skill,
			   experience = :experience,
			   project 	= :project
			   WHERE login_id	= :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':skill', $skill);
			$query->bindValue(':experience', $experience);
			$query->bindValue(':project', $project);
			$query->bindValue(':id', $id);
			$result = $query->execute();
			if ($result) 
			{
				$msg = "<div class='alert alert-success'><strong>Success! </strong>Update successfully</div>";
				return $msg;
			}
			else
			 {
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>NOt Update</div>";
				return $msg;
			}
		}

#post job function	--------------------------------------------------------------	

		public function checkcompany($company_name)
		{
		  $sql   = "SELECT * FROM post_job WHERE company_name = :company_name";
		  $query = $this->db->pdo->prepare($sql);
		  $query->bindValue(":company_name",$company_name);
		  $query->execute();
			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		public function postjob($login_id , $data ,$post_date)
		{
		  $job_title 		= $data['jobtitle'];
		  $company_name 	= $data['companyname'];
		  $experience	    = $data['experience'];
		  $salary 	        = $data['salary'];
		  $location         = $data['Location'];
		  $job_description  = $data['Jobdescription'];
		  $checkcompany     = $this->checkcompany($company_name);
		  

			if ($job_title == "" OR $company_name =="" OR $experience == "" OR $salary == "" OR $location == "" OR $job_description == "") 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty</div>";
				return $msg;
			}
			if ($checkcompany == true) 
			{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Companyname alredy exsist</div>";
				return $msg;
			}
			
			$sql = "INSERT INTO post_job(login_id,job_title,company_name,experience,salary,location,job_description,post_date) VALUES (:login_id,:job_title,:company_name,:experience,:salary,:location,:job_description,:post_date)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':login_id', $login_id);
			$query->bindValue(':job_title', $job_title);
			$query->bindValue(':company_name', $company_name);
			$query->bindValue(':experience', $experience);
			$query->bindValue(':salary', $salary);
			$query->bindValue(':location', $location);
			$query->bindValue(':job_description', $job_description);
			$query->bindValue(':post_date', $post_date);
			$result = $query->execute();

			if ($result) 
			{
				$msg = "<div class='alert alert-success'><strong>Success! </strong>Success fully post</div>";
				return $msg;
			}
			else
			 {
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>There has been problem inserting your details</div>";
				return $msg;
			}
		#post job function end--------
#-----------------------------
		#get post data on index-----
		}
		public function getPostData()
		{
			$sql = "SELECT * FROM post_job ORDER BY post_id DESC LIMIT 5";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
		#get post data end-----

#-------------------------------------------	

	#password  function 
		public function checkPassword($id , $old_password)
		{
			$password = md5($old_password);
			$sql = "SELECT password FROM tbl_user WHERE   login_id = :id AND password = :password";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->bindValue(':password', $password);
			$query->execute();
			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		public function changePassword($id ,$data)
		{
			$old_password = $data['oldpassword'];
			$new_password = $data['newpassword'];
			$confirmpassword = $data['confirmpassword'];

			$check_password = $this->checkPassword($id,$old_password);

			if ($old_password == "" OR $new_password == "" OR $confirmpassword == "")
			{
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>Field not empty</div>";
				return $msg;
			}
			
			if ($check_password == false) 
			{
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>old password not exsist</div>";
				return $msg;
			}
			if (strlen($new_password) < 6) 
			{
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>password to short</div>";
				return $msg;
			}
			if (strlen($confirmpassword) < 6) 
			{
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>password to short</div>";
				return $msg;
			}
			elseif ($new_password != $confirmpassword)
			{
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>password must be same</div>";
				return $msg;
		   }

			$password = md5($new_password);
			$sql = "UPDATE tbl_user set
			   password = :password
			   WHERE login_id	= :id";
			$query = $this->db->pdo->prepare($sql);
			
			$query->bindValue(':password', $password);
			$query->bindValue(':id', $id);
			$result = $query->execute();
			if ($result) 
			{
				$msg = "<div class='alert alert-success'><strong>Success! </strong>Update successfully</div>";
				return $msg;
			}
			else
			 {
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong>password NOt Update</div>";
				return $msg;
			}
		}
#password  function end---
#--------------------------------
		#my task ko kare 

		public function mytask($login_id)
		{
			$sql   = "SELECT * FROM post_job WHERE login_id = :login_id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":login_id",$login_id);
			$query->execute();
			$result = $query->fetchAll();
			return $result;

		}
		public function deletemytask($post_id ,$login_id)
		{
				
			$sql = "DELETE FROM post_job WHERE post_id = :post_id AND login_id = :login_id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":post_id",$post_id);
			$query->bindValue(":login_id",$login_id);
			$result = $query->execute();
			if ($result) 
			{
				$msg = "<div class='alert alert-success'><strong>Success! </strong></div>";
				return $msg;
			}
			else
			 {
				$msg = "<div class='alert alert-danger'><strong>Sorry! </strong></div>";
				return $msg;
			}
		}
		public function jobdescription($post_id)
		{
			$sql = "SELECT * FROM post_job WHERE post_id = :post_id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":post_id",$post_id);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}


#------------------------------------- isme matha kharab hua thoda----------------------------------------------------------------
		public function checkapplyjobs($post_id)
		{
			$sql = "SELECT post_id FROM get_job WHERE post_id = :post_id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":post_id",$post_id);
			$query->execute();
			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function getjob($post_id,$login_id)
		{
			$checkapplyjobs = $this->checkapplyjobs($post_id);
			if ($checkapplyjobs == true)
			 {
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>You alredy applied</div>";
				return $msg;
			}

			$sql = "INSERT INTO get_job(post_id,login_id) VALUES (:post_id,:login_id)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":post_id",$post_id);
			$query->bindValue(":login_id",$login_id);
			$result=$query->execute();
			if ($result)
			 {
				$msg = "<div class='alert alert-success'><strong>job! </strong>applyed</div>";
				return $msg;
			 }
			 else
			 {
			 	$msg = "<div class='alert alert-danger'><strong>Sorry! </strong></div>";
				return $msg;
			 }

		}
		public function notification($login_id)
		{
			$sql   = "SELECT get_job.login_id,post_job.* 
					  FROM post_job
					  INNER JOIN get_job
					  ON get_job.post_id = post_job.post_id
					  WHERE get_job.login_id = :login_id

					  ";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":login_id",$login_id);
			$query->execute();
			$result = $query->fetchAll();
			return $result;

		}

#-----------------------------------------------------------------------------------------------
#job search page
		public function jobsearch($keyword , $location)
		{
			$sql = "SELECT * FROM post_job WHERE job_title = :keyword OR location = :location ";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":keyword",$keyword);
			$query->bindValue(":location",$location);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
		public function getcountjobs($loginid)
		{
			$sql = "SELECT Count(*) FROM get_job WHERE login_id = :login_id ";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(":login_id",$loginid);
			$query->execute();
			$result = $query->fetchColumn();
			return $result;
		}
	}

?>