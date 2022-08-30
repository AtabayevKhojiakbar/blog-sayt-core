<?php
    include "connect.php";
    $bool=false;
    $sql = "select posts.title, posts.view, posts.id, users.name from posts inner join users on users.id=posts.user_id order by posts.id asc ";
    $query = mysqli_query($connect, $sql);
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select title, text from posts where id='$id'";
    $query = mysqli_query($connect, $sql);
    $query = mysqli_fetch_assoc($query);
    $title = $query['title'];
    $text = $query['text'];
    $bool=true;
}


    ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link
            rel="stylesheet"
            type="text/css"
            href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />
</head>
<body>
<div class="container">
<a href="index.php" class="btn btn-success">Bosh sahifaga qaytish</a>
    <div class="card " style="margin-top: 100px">
        <table id="table_id">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>comments</th>
                    <th>Views</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($col=mysqli_fetch_assoc($query)):
                $mm=$col['id'];
                $sql="select count(id) as c from comments where post_id='$mm'";
                $cnt = mysqli_query($connect, $sql);
                $cnt=mysqli_fetch_assoc($cnt);
                ?>
                <tr>
                    <td><?= $col['id']?></td>
                    <td><?= $col['name']?></td>
                    <td><?= $col['title']?></td>
                    <td><?= $cnt['c']?></td>
                    <td><?= $col['view']?></td>
                    <td>
                        <a class="btn btn-warning" href="edit.php?id=<?= $col['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg></a>
                        <a href="delete.php?id=<?= $col['id']?>" id="del" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg></a>
                    </td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<?php
    if (isset($_GET['mes'])){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Update',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
<?php
}
    if(isset($_GET['as'])){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Post o\'chirildi',
                showConfirmButton: false,
                timer: 1200
            })
        </script>
<?php
    }
?>

<script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>

<script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $("#table_id").dataTable();
    });

    $('#del').on('click', function (e){
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'O\'chirish',
            text: 'postni o\'chirmoqchimisiz?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ha',
            cancelButtonText: 'Yo\'q',
        }).then((result) => {
            if (result.value){
                document.location.href = href;
            }
        })

    })
</script>
</body>
</html>