<?php
session_start();
?>
<html>
	 <head>
      <title>Borrowed Item</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Borrowed Item </h1>
   <br>
	<br>	
	
		
			
			
			
			<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "dormdatabase");
			$owner_id = $_SESSION["student_id"];
			$query1="select photograph,item_id,type, description,times_borrowed from item where item_id IN (select itemID from transaction where borrowerID='".$owner_id."')";
			
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
		  <p>You can give feedback for item you borrowed!</p><br><br>
		  <label> Item id: </label> <input name = "id" size=3> </input><br><br>
		   <label class="radio inline"> 
                                                    <input type="radio" name="feedback" value="very_bad" >
                                                    <span> Very	Bad </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="feedback" value="bad" >
                                                    <span>Bad </span> 
                                                </label>
												 <label class="radio inline"> 
                                                    <input type="radio" name="feedback" value="not_bad" >
                                                    <span> Not	Bad </span> 
                                                </label>
												 <label class="radio inline"> 
                                                    <input type="radio" name="feedback" value="good" >
                                                    <span> 	Good </span> 
                                                </label>
												 <label class="radio inline"> 
                                                    <input type="radio" name="feedback" value="very_good" >
                                                    <span> 	Very Good </span> 
                                                </label>
												
			
			<br><br>

			
			 <input name="submit" type="submit"   value="Give Feedback"/>
			 </form>
			<?php
if(isset($_POST["submit"])){
		$db=new mysqli("localhost","root","201511062", "dormdatabase");
	
	$id=$_POST["id"];
	$feedback=$_POST["feedback"];
	
	if($feedback=="very_bad"){
			$query_str="INSERT INTO feedback(itemID,feedback,borrowerID)VALUES('$id' , '$feedback' ,'$owner_id')";
				if ($db->query($query_str) === TRUE) {
		
		
			
			}
	}
	if($feedback=="bad"){
			$query_str="INSERT INTO feedback(itemID,feedback,borrowerID)VALUES('$id' , '$feedback' ,'$owner_id')";
				if ($db->query($query_str) === TRUE) {
		
		
			
			}
	}
	if($feedback=="not_bad"){
			$query_str="INSERT INTO feedback(itemID,feedback,borrowerID)VALUES('$id' , '$feedback' ,'$owner_id')";
				if ($db->query($query_str) === TRUE) {
		
		
			
			}
	}
	if($feedback=="good"){
			$query_str="INSERT INTO feedback(itemID,feedback,borrowerID)VALUES('$id' , '$feedback' ,'$owner_id')";
				if ($db->query($query_str) === TRUE) {
		
		
			
			}
	}
	if($feedback=="very_good"){
			$query_str="INSERT INTO feedback(itemID,feedback,borrowerID)VALUES('$id' , '$feedback' ,'$owner_id')";
				if ($db->query($query_str) === TRUE) {
		
		
			
			}
	}
}
		?>
			
		</body>
		</html>