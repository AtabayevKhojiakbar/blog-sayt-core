<?php
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Mediumish - A Medium style template by WowThemes.net</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
</head>
<body>

<?php  include 'navbar.php'?>
================================================== -->

<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle">Mediumish</h1>
        <p class="lead">
            Bootstrap theme, medium style, simply perfect for bloggers
        </p>
    </div>
    <!-- End Site Title
    ================================================== -->

    <!-- Begin Featured
    ================================================== -->
    <section class="featured-posts">
        <div class="section-title">
            <h2><span>Featured</span></h2>
        </div>
        <div class="card-columns listfeaturedtag">

    <?php  $sql="select posts.id, posts.user_id, posts.title, posts.text, posts.img, posts.created_at, users.name from posts inner join users on posts.user_id=users.id order by posts.id desc limit 4;";
            $result = mysqli_query($connect,$sql);
            while($rows=mysqli_fetch_assoc($result)){
    ?>
            <!-- begin post -->
            <div class="card">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="single.php?id=<?=$rows['id']?>">
                            <div class="thumbnail" style="background-image:url(<?php  echo $rows['img']?>);">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="card-block">
                            <h2 class="card-title"><a href="single.php?id=<?php echo $rows['id'] ?>"><?php  echo $rows['title'];?></a></h2>
                            <h4 class="card-text"><?php  echo substr($rows['text'],0,50); ?></h4>
                            <div class="metafooter">
                                <div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="author.php?id=<?php  echo $rows['user_id'];?>"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal" alt="Sal"></a>
								</span>
                                    <span class="author-meta">
								<span class="post-name"><a href="author.php?id=<?php echo $rows['user_id']; ?>"><?php echo $rows['name'] ; ?></a></span><br/>
								<span class="post-date"><?php echo $rows['created_at'];  ?></span><span class="dot"></span><span class="post-read">6 min read</span>
								</span>
                                    <span class="post-read-more"><a href="#" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php  } ?>
            <!-- end post -->

        </div>
    </section>
    <!-- End Featured
    ================================================== -->

    <!-- Begin List Posts
    ================================================== -->
    <section class="recent-posts">
        <div class="section-title">
            <h2><span>All Posts</span></h2>
        </div>
        <div class="card-columns listrecent">
            <?php
                $sql = "select posts.id, posts.user_id, posts.title, posts.text, posts.img, posts.created_at, users.name from posts inner join users on posts.user_id=users.id;"
            ?>
            <!-- begin post -->
            <div class="card">
                <a href="single.php">
                    <img class="img-fluid" src="assets/img/demopic/5.jpg" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="single.php">Autumn doesn't have to be nostalgic, you know?</a></h2>
                    <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.php"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="author.php">Sal</a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.php" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->

        </div>
    </section>
    <!-- End List Posts
    ================================================== -->

<?php include 'footer.php'?>

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

