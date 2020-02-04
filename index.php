<?php
include 'includes/header.php';
$db=new Database();
$query='SELECT * FROM posts';
$rows=$db->select($query);

$query='SELECT * FROM categories';
$categories=$db->select($query);
 ?>
 <?php if($rows):?>
              <?php foreach ($rows as $row): ?>
                    <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author']; ?></a></p>
                    <p><?php echo shortenText($row['body']) ;?></p>
                      <a class="readmore" href="post.php?id=<?php echo urlencode( $row['id']); ?>">Read More</a>
                    </div>
                <!-- /.blog-post -->
              <?php endforeach; ?>
  <?php else: ?>
      <p>THERE IS NO POSTS</p>
  <?php endif; ?>
                <!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>
