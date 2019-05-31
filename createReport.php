<?php
session_start();
?>
<html>
	 <head>
      <title>Create Report</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Create Report </h1>
   <br>
	<br>	
	<?php
	$db = mysqli_connect("localhost", "root", "201511062", "dormdatabase");
			$owner_id = $_SESSION["student_id"];
			//$query1="select photograph,item_id,type, description,times_borrowed from item WHERE ownerID= '".$owner_id."' AND item_borrowed=1";
			$query1="select* from transaction WHERE itemID IN (select item_id from item WHERE ownerID= '".$owner_id."' AND item_borrowed=1)";

				$query_all = $db->query($query1);
				
			echo "<table border = 1> ";//style='border:1px'>";
			echo "	<tr>"; //<th>";
			echo "		<td> itemID </td>"; 
			echo "		<td> borrowerID </td>";
			
		
			
			echo "	</tr>";
			
				    
			while($row = $query_all->fetch_assoc()) {
				
				
				$itemID = $row["itemID"];
				$borrowerID = $row["borrowerID"];
				
				 
				
				
				echo "<tr>";  
				echo "		<td> $itemID</td>"; 
				echo "		<td> $borrowerID </td>"; 
				
			
			
				echo "</tr>";
				$count++; 	
			}	
			echo "</table>";	
if(isset($_POST["submit"])){
	
	
			$explanation=$_POST["explanation"];
			$borrower_id=$_POST["borrower_id"];
			
			$reporter_id = $_SESSION["student_id"];
			//$query2="Select borrowerID from transaction where itemID='".$item_id."'";
		//	$reported_id=$db->query($query2);

			$query_str="INSERT INTO report(explanation,reportedID,reporterID)VALUES('$explanation','$borrower_id','$reporter_id')";
				if ($db->query($query_str) === TRUE) {
		
			echo "<br/><br/><span>Data deleted successfully...!!</span>";
			header('Location:http://localhost/deleteclubMembers.php');
				}
				

		
			else{
			echo "<p>Deletion Failed  </p>";
			}}	

			?>
			
		
			
			<br><br>
			 <form  method="post"  >
			 
			

<label> Borrower Id  </label> <input name = "borrower_id"> </input><br>
<label> Report Explanation  </label> <input name = "explanation"> </input><br>
			
			<br>

			
			 <input name="submit" type="submit"   value="Report"/>
			 </form>
				</body>
		</html>