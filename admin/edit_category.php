<?php include 'includes/header.php';  ?>
<?php
$id=$_GET['id'];
$db=new Database();
$query='SELECT * FROM categories where id=:id';
$category=$db->select2($query,$id);
?>
<?php
$db=new Database();
$query='SELECT * FROM posts where id=:id';
$post=$db->select2($query,$id);
$query='SELECT * FROM categories';
$categories=$db->select($query);
?>
<?php session_start();
$db=new Database();
  if(isset($_POST['submit'])){
  $name=htmlentities($_POST['name']);
  if (isset($_POST['name'])) {
      if (strlen($_POST['name']) < 1) {
          $_SESSION['error'] ='All values are required';
          header("Location: edit_post.php");
          return;
      }
    //  $query=' ';
$success=$db->update_category("UPDATE categories SET name=:name WHERE id=:id",$_POST['name'],$id);
if($success>0)
{
  $_SESSION['success'] ='Category UPDATED';
  header("Location: index.php");
  return;
}
}
}
 ?>

 <?php
  $db=new Database();
   if(isset($_POST['delete'])){
     $db=new Database();
     $success=$db->delete("DELETE FROM categories WHERE id=:id",$id);
     if($success>0)
     {
       $_SESSION['success'] ='Category DELETED';
       header("Location: index.php");
       return;
     }
   }
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category"  value="<?php echo $category['name'];  ?>">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-primary" value="submit"/>
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete"type="submit" class="btn btn-danger" value="Delete"/>
  </div>
</form>
<?php include 'includes/footer.php';  ?>
