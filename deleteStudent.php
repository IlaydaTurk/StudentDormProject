<html>
	 <head>
      <title>Select Student</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Select Student </h1>
   <br>
	<br>	
	
		
			
			
			
			<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "dormdatabase");
			
				$query_all = $db->query("select student_id,firstname, lastname, email,room from student");
				
			echo "<table border = 1> ";//style='border:1px'>";
			echo "	<tr>"; //<th>";
			echo "		<td> student_id </td>"; 
			echo "      <td> firstname </td>"; 
			echo "      <td> lastname </td>"; 
			echo "      <td> email </td>"; 
			echo "      <td> room </td>"; 
			
			echo "	</tr>";
			
				    
			while($row = $query_all->fetch_assoc()) {
				
				
				$student_id = $row["student_id"];
				$firstname = $row["firstname"];
				$lastname = $row["lastname"];
				$email = $row["email"];
				$room = $row["room"];
				
				echo "<tr>";  
				echo "		<td> $student_id </td>"; 
				
	
			echo "		<td> $firstname </td>"; 
			echo "      <td> $lastname </td>"; 
			echo "      <td> $email </td>";
			echo "      <td> $room </td>"; 
				echo "</tr>";
				$count++; 	
			}	
			echo "</table>";	
			
		
  			
			
				    
				    
		
if(isset($_POST["submit"])){
	
	
			$id=$_POST["id"];

			$query_str="DELETE FROM student WHERE student_id = '$id'";
			
				if ($db->query($query_str) === TRUE) {
		
			echo "<br/><br/><span>Data deleted successfully...!!</span>";
			header('Location:http://localhost/deleteStudent.php');
				}
				

		
			else{
			echo "<p>Deletion Failed  </p>";
			}}	

			?>
			
		
			
			<br><br>
			 <form  method="post"  >
			 
			


<label> Student id: </label> <input name = "id" size=3> </input><br>
			
			<br>

			
			 <input name="submit" type="submit"   value="Delete selected club member"/>
			 </form>
			
		</body>
		</html>