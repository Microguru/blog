<?php include "includes/header.php" ?>

<?php 
 $db =new Database(); 
 
 if(isset($_POST['submit'])){
 	//assign var
 	$name =mysqli_real_escape_string($db->link,$_POST['name']);
 	
 	
    //
    if($name == '' ){
       //set error
    	$error= 'please fillout all required field';
    }
    else 
    {
    	$query ="insert into categories(name) values('$name')";
    	$update_row =$db->update($query);
    }
 }

?>
<form role="form" method="post" action="addcat.php">
  <div class="form-group">
    <label >Category Name</label>
    <input  name="name" type="text" class="form-control"  placeholder="Enter Category ">
  </div>
   <input name="submit" type="submit" class="btn btn-default" value="submit" />
     <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete" type="submit" class="btn btn-danger" value="Delete" />

</form>
   <?php include "includes/footer.php"?>