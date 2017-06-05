<?php 
include("db.php");
//Send variables through header to get the search results
if(isset($_GET['ss'])){
    	// Prepare a select statement
    	$sql = "SELECT * FROM user WHERE Email LIKE '%" . $_GET['ss'] . "%'";
		
	
    
    	$result = mysqli_query($conn, $sql);    
        // Check number of rows in the result set
	if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>".$row["Fname"].		 $row["Lname"]." ".$row["Email"] . "</p>";
        	}
        } else{
        	echo "<p>No matches found</p>";
	}
}
 
// close connection
mysqli_close($conn);
?>