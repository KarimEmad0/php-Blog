</div>
<!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Categories</h4>
      <?php    if($categories):?>
        <ol class="list-unstyled">

              <?php foreach ($categories as $key): ?>
                <li><a href="posts.php?categories=<?php echo $key['id'] ;?>"><?php echo $key['name']; ?></a></li>
              <?php endforeach; ?>
              </ol>
      <?php else: ?>
        <p>THERE IS NO CATEGORIES</p>
<?php endif; ?>
    </div>

</div>
<!-- /.blog-sidebar -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<footer class="blog-footer">
<p>PHPLoversBlog &copy: 2019</p>
<p>
<a href="#">Back to top</a>
</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script>
window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
</script>
<script src="js/bootstrap.js"></script>
</body>

</html>
