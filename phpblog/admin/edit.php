<?php include "includes/header.php" ?>

<form>
  <div class="form-group" action="post" method="add_post.php">
    <label >Post Title</label>
    <input name="title" type="text" class="form-control"  placeholder="Enter Post">
  </div>
  <div class="form-group" >
    <label >Post Body</label>
    <textarea name="body"  class="form-control"  placeholder="Enter body"></textarea>
  </div>
  <div class="form-group" >
  <label >category</label>
    <select name="category" class="form-control" >
  <option>News</option>
  <option>Events</option>
  </select>
  </div>
  <div class="form-group" >
  <label >Author</label>
    <input name="author" type="text" class="form-control"  placeholder="Enter author name">
  </div>
  <div class="form-group" >
  <label >Tags</label>
    <input name="tags" type="text" class="form-control"  placeholder="tag">
  </div>
<div>
   <button name="submit" type="submit" class="btn btn-default">Submit</button>
   <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>






<?php include "includes/footer.php"?>