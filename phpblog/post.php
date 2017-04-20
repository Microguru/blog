<?php include 'includes/header.php';?>

<?php 
$id =$_GET['id'];
$db =new Database(); 

$query="SELECT * FROM posts where id= ".$id;
 

$post =$db->select($query)->fetch_assoc();

$query="SELECT * FROM categories";
 

$categories  =$db->select($query);



?> 
        <div class="blog-post">
            <h2 class="blog-post-title"><?php  echo $post['title']; ?> </h2>
            <p class="blog-post-meta"> <?php  echo formatDate($post['date']);?> by <a href="#"><?php  echo $post['author'];?></a></p>
             
              <?php echo  $post['body']; ?>
            <p>
          </div><!-- /.blog-post -->
          
         
          



















<?php include 'includes/footer.php' ;?>