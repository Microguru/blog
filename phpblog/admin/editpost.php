<?php include "includes/header.php" ?>


<?php 
$id = $_GET['id'];
$db =new Database(); 

$query="SELECT * FROM posts WHERE id=".$id;
 
 
$post =$db->select($query)->fetch_assoc();

$query="SELECT * FROM categories";
 
 
$categories  =$db->select($query);
?> 

<?php
if(isset($_POST['submit'])){
  //assign var
  $title =mysqli_real_escape_string($db->link, $_POST['title']);
  
    $body =mysqli_real_escape_string($db->link, $_POST['body']);
  $category =mysqli_real_escape_string($db->link, $_POST['category']);
  $author =mysqli_real_escape_string($db->link, $_POST['author']);
  $tags =mysqli_real_escape_string($db->link,$_POST['tags']);
    if($title =='' ||$body ==''||$category == ''||$author ==''){
       //set error
      $error= 'please fillout all required field';
    } 
    else 
    {
      $query ="update posts
      set title='$title',body='$body',category='$category',author='$author',tags='$tags' where id=".$id;
      $update_row =$db->update($query);
    }
 }
?>

<?php
 if(isset($_POST['delete'])){
  $query="DELETE from posts where id =".$id;
  $delete_row =$db->delete($query);
 }
?>





<form role="form" method="post" action="editpost.php?id= <?php echo $id; ?>">
  <div class="form-group" >
    <label >Post Title</label>
    <input name="title" type="text" class="form-control"  placeholder="Enter Post" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group" >
    <label >Post Body</label>
    <textarea name="body"  class="form-control"  placeholder="Enter body">
      <?php  echo $post['body']; ?>
    </textarea>
  </div>
  <div class="form-group" >
  <label >category</label>
    <select name="category" class="form-control" >
    <?php while($row =$categories->fetch_assoc()  )  :?>
      <?php if($row['id'] == post['category']) {
          
         $selected ='selected';
        }
        else{
          $selected ='';
        }
        ?>
        
  <option <?php echo $selected; ?> ><?php echo $row['name']; ?></option>
<?php endwhile ;?>
 
  </select>
  </div>
  <div class="form-group" >
  <label >Author</label>
    <input name="author" type="text" class="form-control"  placeholder="Enter author name" value="<?php echo $post['author']; ?>">
  </div>
  <div class="form-group" >
  <label >Tags</label>
    <input name="tags" type="text" class="form-control"  placeholder="tag" value="<?php echo $post['tags']; ?>">
  </div>
<div>
   <input name="submit" type="submit" class="btn btn-default value="submit" />
   <a href="index.php" class="btn btn-default">Cancel</a>
   <input name="delete" type="submit" class="btn btn-danger" value="delete" />

  </div>
  <br>
</form>






<?php include "includes/footer.php"?>