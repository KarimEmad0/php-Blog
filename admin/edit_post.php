<?php include 'includes/header.php';  ?>
<?php
$id=$_GET['id'];
$db=new Database();
$query='SELECT * FROM posts where id=:id';
$post=$db->select2($query,$id);
$query='SELECT * FROM categories';
$categories=$db->select($query);
?>
<?php session_start();
$db=new Database();
  if(isset($_POST['submit'])){
  $title=htmlentities($_POST['title']);
  $body=htmlentities($_POST['body']);
  $category=htmlentities($_POST['category']);
  $author=htmlentities($_POST['author']);
  $tags=htmlentities($_POST['tags']);

  if (isset($_POST['body']) && isset($_POST['title']) && isset($_POST['category'])
      && isset($_POST['author']) && isset($_POST['tags'])) {
      if (strlen($_POST['body']) < 1 || strlen($_POST['title']) < 1 || strlen($_POST['category']) < 1 || strlen($_POST['author']) < 1|| strlen($_POST['tags']) < 1) {
          $_SESSION['error'] ='All values are required';
          header("Location: edit_post.php");
          return;
      }

    //  $query=' ';
$success=$db->update("UPDATE posts SET category=:category , title=:title , body=:body , author=:author , tags=:tags WHERE id=:id", $_POST['category'],$_POST['title'],$_POST['body'],$_POST['author'],$_POST['tags'],$id);
if($success>0)
{
  $_SESSION['success'] ='POST UPDATED';
  header("Location: index.php");
  return;
}
else {echo "FAILED";}
}
}
 ?>
    <?php
   $db=new Database();
    if(isset($_POST['delete'])){
      $db=new Database();
      $success=$db->delete("DELETE FROM posts WHERE id=:id",$id);
      if($success>0)
      {
        $_SESSION['success'] ='Post DELETED';
        header("Location: index.php");
        return;
      }
    }
 ?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $id;?>"  >
<div class="form-group">
  <?php
  if (isset($_SESSION['error'])) {
      echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
      unset($_SESSION['error']);
  }
  ?>
  <label>Post title</label>
</div>
<input name="title" type="text" class="form-control" placeholder="Enter title" value="<?php echo $post['title'];?>">
<div class="form-Body">
  <label>Post Body</label>
  <textarea name="body" class="form-control" placeholder="Enter Post Body">
    <?php echo $post['body']; ?>
  </textarea>
</div>
<div class="form-group">
  <label>Category</label>
  <select  class="form-control" name="category">
    <?php foreach ($categories as $category):?>
      <?php if($category['id']==$post['category']){
        $selected='selected';
      }
      else{$selected=' ';}
      ?>
    <option <?php echo $selected;?> value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?></option>
<?php endforeach; ?>
  </select>
</div>

<div class="form-group">
  <label>Author</label>
  <input name="author" type="text" class="form-control"placeholder="Enter Author Name" value="<?php echo $post['author'];  ?>">
</div>

<div class="form-group">
  <label>Tags</label>
  <input name="tags" type="text" class="form-control"placeholder="Enter Tags" value="<?php echo $post['tags']; ?>">
</div>
<div>
<input  name="submit"type="submit" class="btn btn-primary" value="submit"/>
<a href="index.php" class="btn btn-default">Cancel</a>
<input name="delete"type="submit" class="btn btn-danger" value="Delete"/>
</div>
<br>
</form>

<?php include 'includes/footer.php';  ?>
                                <!--content  -->
