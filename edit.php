<?php
include "connect.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select title, text from posts where id='$id'";
    $query = mysqli_query($connect, $sql);
    $query = mysqli_fetch_assoc($query);
    $title = $query['title'];
    $text = $query['text'];
}

if (isset($_POST['save'])){
    $title1=$_POST['title'];
    $text1=$_POST['text'];
    $id1=$_POST['id'];
    $sql = "update posts set title='$title1', text='$text1' where id='$id'";
    $result = mysqli_query($connect, $sql);
    if($result){
        header("location: admin.php?mes=1");
    }
}

?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<body>

<div class="container-fluid w-50  mt-5">
    <div class="container pt-5">
        <div class="w3-card-4">
            <div class="w3-container w3-brown">
                <h2>Post</h2>
            </div>
            <form class="w3-container" action="" method="post">
                <p>
                    <label class="w3-text-brown"><b>Title</b></label>
                    <input class="w3-input w3-border w3-sand" name="title" type="text" value="<?= $title?>"></p>
                <p>
                    <label class="w3-text-brown"><b>Text</b></label>
                    <textarea   class="w3-input w3-border w3-sand"  name="text" type="text"><?= $text?></textarea></p>
                <input type="hidden" name="id" value="<?= $id?>">
                <p>
                    <button type="submit" name="save" class="w3-btn w3-brown">Save</button></p>
            </form>
        </div>
    </div>
</div>


</body>
</html>



