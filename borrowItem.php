<?php
session_start();
?>
<html>
	 <head>
      <title>Borrow Item</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Borrow Item </h1>
   <br>
	<br>	
	
		
			
			
			
			<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "dormdatabase");
			
				$query_all = $db->query("select photograph,item_id,type, description,times_borrowed from item where item_borrowed=0 ");
				
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
			
		
  			
			
				    
				    
		
if(isset($_POST["submit"])){
	
	
			$item_id=$_POST["item_id"];
			$owner_id = $_SESSION["student_id"]; 
			$query_date="Select times_borrowed from item where item_id=$item_id";
			$borrowedDate=$query_date;
			$start_date = date('Y-m-d H:i:s');
			$agreedDateOfReturn=date('Y-m-d', strtotime($start_date. ' + $borrowedDate days'));

			$query_str="Insert Into transaction(itemID,borrowerID,agreedDateOfReturn)VALUES('$item_id','$owner_id','$agreedDateOfReturn')";
			
			
				if ($db->query($query_str) === TRUE) {
					
			$query2="UPDATE item SET item_borrowed='1' WHERE item_id = '".$item_id."'";
			$db->query($query2);
			echo "<br/><br/><span>Item borrowed...!!</span>";
			header('Location:http://localhost/borrowItem.php');
				}
				

		
			else{
			echo "<p>Borrowed Failed  </p>";
			}}	

			?>
			
		
			
			<br><br>
			 <form  method="post"  >
			 
			


<label> Item id: </label> <input name = "item_id"> </input><br>
			
			<br>

			
			 <input name="submit" type="submit"   value="Borrow this item"/>
			 </form>
			
		</body>
		</html>