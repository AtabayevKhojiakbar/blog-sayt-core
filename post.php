<?php
include "connect.php";

if (isset($_POST['submit'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
    $img=$_POST['img'];
    $text=$_POST['text'];
    $date=$_POST['date'];
    $sql = "insert into posts(title, user_id, img, text, created_at) values ('$title', '$id', '$img', '$text', '$date')";
    $rlt = mysqli_query($connect, $sql);
    if($rlt){
        header("location: index.php");
    }
    else{ ?>
        <script>alert("Xatolik!")</script>
    <?php }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Add posts</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
</head>
<body>

<!-- Begin Nav
================================================== -->
<?php  include "navbar.php";?>
<!-- End Nav
================================================== -->





<!-- Begin add posts
================================================== -->
<div class="container mt-3 w-50">
    <h2>Add posts</h2>
    <p>Yangi post qoldirish:</p>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label>Title:</label>
            <input class="form-control" rows="5" id="comment" required name="title"></input>
        </div>
        <div class="mb-3 mt-3">
            <label >Img:</label>
            <input class="form-control" rows="5" id="comment" required name="img"></input>
        </div>
        <div class="mb-3 mt-3">
            <label for="comment">Text:</label>
            <textarea class="form-control" rows="5" id="comment" required name="text"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label >Date:</label>
            <input type="date" class="form-control" required id="comment" name="date">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<!-- End add Posts
================================================== -->

<!-- Begin AlertBar
================================================== -->
<div class="alertbar">
    <div class="container text-center">
        <img src="assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
    </div>
</div>
<!-- End AlertBar
================================================== -->

<!-- Begin Footer
================================================== -->
<?php include "footer.php" ?>
<!-- End Footer
================================================== -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/mediumish.js"></script>
</body>
</html>
