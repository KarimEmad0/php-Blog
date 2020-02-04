<?php include 'includes/header.php';  ?>
<?php
session_start();
$db = new Database();
$posts = $db->select("SELECT posts.*, categories.name FROM posts inner join categories on posts.category= categories.id order by posts.date desc");
$categories = $db->select("SELECT * FROM categories order by name desc");
 ?>
    <table class="table table-striped"> <!-- class in bootstrap  -->

      <?php
       if(isset($_SESSION['success'])){
        echo('<p style="color: green;">' . htmlentities($_SESSION['success']) . "</p>\n");
        unset($_SESSION['success']);
      }

       ?>

      <tr> <!--table row to make row  -->
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
      </tr>
        <?php foreach ($posts as $post ): ?>
        <tr > <!--table row to make row  -->
        <td><?php echo $post['id']; ?></td>
        <td> <a href="edit_post.php?id=<?php echo $post['id']; ?>">  <?php echo $post['title']; ?> </a></td>
        <td><?php echo $post['name']; ?></td>
        <td><?php echo $post['author']; ?></td>
        <td><?php echo formatdate($post['date']); ?></td>
        </tr>
     <?php endforeach ; ?>
    </table>
    <table class="table table-striped"> <!-- class in bootstrap  -->
      <tr> <!--table row to make row  -->
        <th>Category ID#</th>
        <th>Category Name</th>
      </tr>
      <?php foreach ($categories as $category ): ?>
      <tr > <!--table row to make row  -->
      <td><?php echo $category['id']; ?></td>
      <td> <a href="edit_category.php?id=<?php echo $category['id']; ?>">  <?php echo $category['name']; ?> </a></td>
      </tr>
   <?php endforeach ; ?>

    </table>

<?php include 'includes/footer.php';  ?>
                                <!--content  -->
