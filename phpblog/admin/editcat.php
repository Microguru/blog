<?php include "includes/header.php" ?>

<?php 
$id = $_GET['id'];
$db =new Database(); 
$query="SELECT * FROM categories WHERE id=".$id;
$category =$db->select($query)->fetch_assoc();
$query="SELECT * FROM categories";
$categories  =$db->select($query);
?> 

<?php
if(isset($_POST['submit'])) {
  
  //assign var
  $name = mysqli_real_escape_string($db->link, $_POST['name']); 
  
    
    if($name =='' ){
       //set error
      $error= 'please fillout all required field';
    } 
    else 
    {
      $query ="update posts
      set name='$name'
       where id=".$id;
      $update_row =$db->update($query);
    }
 }
?>

<?php 
 if(isset($_POST['delete'] )){
   $query = "delete from categories where id= ".$id;
   $delete_row =$db->delete($query);
   
   }
?>

<form role="form" method="post" action="editcat.php?id=<?php echo $id ?>">
  <div class="form-group">
    <label >Category Name</label>
    <input  name="name" type="text" class="form-control"  placeholder="Enter Category " value="<?php echo $category['name'] ; ?>">
  </div>
   <input name="submit" type="submit" class="btn btn-default" value="submit" />
      <a href="index.php" class="btn btn-default">Cancel</a>

    <input name="delete" type="submit" class="btn btn-danger" value="delete" />

</form>
   <?php include "includes/footer.php"?>