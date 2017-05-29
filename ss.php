

<?php 
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    include('db.php');
    //$db = new db();
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysqli_real_escape_string($conn,$_POST['search']);
    $word = htmlentities($word);
    // build your search query to the database
   // $sql = "SELECT title, url FROM pages WHERE content LIKE '%" . $word . "%' ORDER BY title LIMIT 10";
	
	
	$sql="SELECT *from user WHERE Email like '%".$word."%' ";
	
	$results=mysqli_query($conn,$sql);
	
	while($f=mysqli_fetch_assoc($results)){
		 $end_result = '';
    // get results
   // $row = $db->select_list($sql);
	$row=$f['Email'];
			
		
            $result  = $f['Email'];
            // we will use this to bold the search word in result
            $bold           = '<span class="found">' . $word . '</span>';    
            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';            
        }
        echo $end_result;
    } else {
        echo '<li>No results found</li>';
    }




?>