<?php include 'includes/header.php';  ?>

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
          header("Location: add_post.php");
          return;
      }
$success=$db->insert("INSERT INTO posts (category,title,body,author,tags) values (:category,:title,:body,:author,:tags)",$_POST['category'],$_POST['title'],$_POST['body'],$_POST['author'],$_POST['tags']);
if($success>0)
{
  $_SESSION['success'] ='Post added';
  header("Location: index.php");
  return;
}
}
}
 ?>
<?php
$db=new Database();
$query='SELECT * FROM categories';
$categories=$db->select($query);
?>
<form role="form" method="post" action="add_post.php">
    <?php
    if (isset($_SESSION['error'])) {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>
<div class="form-group">
  <label>Post title</label>
</div>
<input name="title" type="text" class="form-control"placeholder="Enter title">
<div class="form-Body">
  <label>Post Body</label>
  <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
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
    <option <?php echo $selected;?> value="<?php echo $category['id'];?>"> <?php echo $category['name']; ?></option>
<?php endforeach; ?>
  </select>
</div>

<div class="form-group">
  <label>Author</label>
  <input name="author" type="text" class="form-control"placeholder="Enter Author Name">
</div>

<div class="form-group">
  <label>Tags</label>
  <input name="tags" type="text" class="form-control"placeholder="Enter Tags">
</div>
<div>
  <input name="submit" type="submit" class="btn btn-primary" value="submit"/>
<a href="index.php" class="btn btn-default">Cancel</a>
</div>
<br>
</form>

<?php include 'includes/footer.php';  ?>
                                <!--content  -->
