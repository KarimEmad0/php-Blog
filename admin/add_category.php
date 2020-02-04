<?php include 'includes/header.php';  ?>
<?php
session_start();
$db=new Database();
  if(isset($_POST['submit'])){
  $name=htmlentities($_POST['name']);
  if (isset($_POST['name'])) {
      if (strlen($_POST['name'])<1 ) {
          $_SESSION['error'] ='name value are required';
          header("Location: add_category.php");
          return;
      }
$success=$db->category("INSERT INTO categories (name) values (:name)",$_POST['name']);
    if($success>0)
      {
          $_SESSION['success'] ='category added';
          header("Location: index.php");
          return;
        }
    }
}
 ?>
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <?php
    if (isset($_SESSION['error'])) {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-primary" value="submit"/>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
</form>
<?php include 'includes/footer.php';  ?>
