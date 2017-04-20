<?php include "includes/header.php"; ?>


<?php 
$db = new Database();
$query = "select posts.*,categories.name from posts INNER JOIN categories ON posts.category=categories.id order by posts.title " ;
$posts = $db->select($query);
$query="SELECT * FROM categories order by name desc";
$categories  =$db->select($query);

?>
<!---content here -->
<table class="table table-striped">
  <tr>
  <th>Post ID#</th>
  <th>Post Title</th>
  <th>Category</th>
  <th>Author</th>
  <th>Date</th>
  </tr>
  
  
  <?php while($row = $posts->fetch_assoc() ): ?>
    <tr>
 <td><?php echo $row['id']; ?></td>
  <td><a href="editpost.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td> 
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['author']; ?></td>
 <td><?php echo   formatDate($row['date']); ?></td>
  </tr>
<?php endwhile; ?>

</table>


<table class="table table-striped">
  <tr>
  <th>category ID</th>
  <th>category name</th>
  
  </tr>


 <?php while($row = $categories->fetch_assoc() ): ?>
    <tr>
 <td><?php echo $row['id']; ?></td>
  <td><a href="editcat.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td> 
  
  </tr>
<?php endwhile; ?>
</table>
 
   <?php include "includes/footer.php"?>