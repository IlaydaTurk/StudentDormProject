<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<body>
 <form class="form-horizontal" method="post" enctype="multipart/form-data" >
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        
                        <h3>Welcome</h3>
                        <p>You can join Dorm Exchange System by filling the necessary places!</p>
                        <input type="submit" formaction="dormExchangeHomePage.php" name="" value="Login"/><br/>
                    </div>
                   <div class="col-md-9 register-right">
                       
                         <div class="tab-content" id="myTabContent">
						                             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="register-heading">Apply to Dorm Exchange System</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input  name="firstname" type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input name="lastname" type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>

										<div class="form-group">
                                            <input name="room" type="text" class="form-control" placeholder="Room Number *" value="" />
											
                                        </div>
										
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                      
									
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                       
                                     
                                        <input name="submit" type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
  </div>
                          
                                    </div>
                                </div>
								 </div>
                                </div>
</form>

<?php
if(isset($_POST["submit"])){
		
		
		$field_names = array("firstname","lastname","email","password","room");
		$n_fields = 5;
		$count=0;
		for($i=0;$i<$n_fields; $i++) {
		$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			}
		}
		
		$db=new mysqli("localhost","root","201511062", "dormdatabase");
		
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$email=$_POST["email"];
		$room=$_POST["room"];
		$password=$_POST["password"];
		
		
		
		$secret = password_hash($password, PASSWORD_BCRYPT);
		if($firstname !=''||$lastname !=''||$email !=''||$$password !=''){

			
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo"Please enter a valid email address";}
			else {
				
			if(strlen($_POST['password']) < 8){
			echo "Password is too short."; }
			
			else {
			$query_str2="select email from student where email =\"" .$email . "\"  LIMIT 1";
			$result1 =$db->query($query_str2);
			$n_rows1= $result1 -> num_rows1;
			if($n_rows1==1){
				echo "This email is used. Enter a different email!!"; }
			else {
			$field_names = array("firstname","lastname","email","password","room");
			$n_fields = 5;
			$count=0;
			for($i=0;$i<$n_fields; $i++) {
			$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			
			}
		}
		if($count==$n_fields){
			$query_str1="select firstname, lastname from student where firstname =\"" .$firstname . "\" and lastname = \"".$lastname. "\" LIMIT 1";
			$result =$db->query($query_str1);
		$n_rows= $result -> num_rows;
		
		if ($n_rows==1){
			
				 echo "The student is already present in the student table" ;
		
		}
		
		else {
		
   
			$query_str="INSERT INTO student(firstname,lastname,email,password,room,dormID)VALUES('$firstname' , '$lastname' , '$email' , '$password' , '$room',1)";
				if ($db->query($query_str) === TRUE) {
		
			echo "<br/><br/><span>Data Inserted successfully...!!</span>";
			
			}
		
			
			
		
			else{
			echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
			}
			}
		}
			
				
		}
		}
		}
		}
		}

		
			
		
	?>
	
	
	</body>
	</html>