<?php
session_start();
?>
<html>
	 <head>
      <title>Lended Items</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Lended Item </h1>
   <br>
	<br>	
	
		
			
			
			
			<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "dormdatabase");
			$owner_id = $_SESSION["student_id"];
			$query1="select photograph,item_id,type, description,times_borrowed from item where item_id IN(select itemID from transaction) AND ownerID= '".$owner_id."'";
			
				$query_all = $db->query($query1);
				
			echo "<table border = 1> ";//style='border:1px'>";
			echo "	<tr>"; //<th>";
			echo "		<td> item_id </td>"; 
			echo "		<td> photograph </td>";
			echo "      <td> type </td>"; 			
			echo "      <td> description </td>"; 
			echo "      <td> times_borrowed </td>"; 
		
			
			echo "	</tr>";
			
				    
			while($row = $query_all->fetch_assoc()) {
				
				
				$item_id = $row["item_id"];
				$imgData = $row["photograph"];;
				$type = $row["type"];
				$description = $row["description"];
				$times_borrowed = $row["times_borrowed"];
				
				
				echo "<tr>";  
				echo "		<td> $item_id </td>"; 
				
			echo'		<td> <img src="data:image/jpeg;base64,'.base64_encode($row['photograph'] ).'" height="80" width="80" class="img-thumnail" /> </td>'; 
	
			echo "		<td> $type </td>"; 
			echo "      <td> $description </td>"; 
			echo "      <td> $times_borrowed </td>"; 
			
				echo "</tr>";
				$count++; 	
			}	
			echo "</table>";	
			?>
			
			<form class="form-horizontal" method="post"  >
		  <p>You can create a report for item you lended!</p><br><br>
		  <label> Item id: </label> <input name = "id" size=3> </input><br><br>
		    <label> Report Explanation: </label> <input name = "explanation" > </input><br><br>
												
			
			<br><br>

			
			 <input name="submit" type="submit"   value="Create Report"/>
			 </form>
			<?php
if(isset($_POST["submit"])){
		$db=new mysqli("localhost","root","201511062", "dormdatabase");
	
	$id=$_POST["id"];
	$explanation=$_POST["explanation"];
	
	if($explanation!="" AND $id!=""){
		$owner_id = $_SESSION["student_id"];
		$query1="select borrowerID from transaction WHERE itemID IN (select item_id from item WHERE ownerID= '".$owner_id."' AND item_borrowed=1)";
		
			
			$query_str="INSERT INTO report(itemID,feedback)VALUES('$id' , '$explanation' )";
				if ($db->query($query_str) === TRUE) {
					
		$query2="UPDATE report SET borrowerID=(select borrowerID from transaction WHERE itemID='".$id."' and ownerID= '".$owner_id."' ) WHERE itemID='".$id."'";
		if ($db->query($query2) === TRUE) {
			echo "Report created!";
		}
			}
	}
	
}
		?>
			
		
				    
				    
		


			
			
		
			
		
			
		</body>
		</html>