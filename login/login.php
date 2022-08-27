<?php
    include "../connect.php";
    $bool=true;
    if(isset($_GET['a'])){
        $bool=false;
    }
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from users where name='$user';";
        $result = mysqli_query($connect,$sql);
        if($result->num_rows>0){
            $rows = mysqli_fetch_assoc($result);
            $pas = $rows['password'];
            $id = $rows['id'];
            if($pas == $password){
                header("location:../post.php?id=$id");
//                echo "salom";
            }
        }
    }
    $mes=false;
    $message = '';
    if(isset($_POST['regster'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $about = $_POST['about'];
        $sql1 = "select * from users where name='$username';";
        $result1=mysqli_query($connect, $sql1);
        if($result1->num_rows==0){
            $sql2 = "select * from users where email='$email';";
            $result2 = mysqli_query($connect, $sql2);
            if($result2->num_rows==0){
                $sql = "insert into users(name, email, password, about) values ('$username', '$email', '$pass', '$about');";
                $result = mysqli_query($connect, $sql);
                $sql = "select id from users where name='$username'";
                $result = mysqli_query($connect, $sql);
                $idd=$result->fetch_assoc();
                $id=$idd['id'];
                header("location:../post.php?id=$id");
            }
            else{
                $mes = true;
                $message = "Bu emaildan foydalanilgan!";
            }
        }
        else{
            $mes = true;
            $message = "Bu nomdan foydalanilgan!";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration and login Form</title>
    <!-- importing fontawesome kit -->
    <script src="https://kit.fontawesome.com/667417c7ec.js" crossorigin="anonymous"></script>

    <!--    -->

    <!-- Lets add some styling -->
    <style>
        body {
            background: rgb(99, 140, 187);
            background: radial-gradient(circle, rgb(10, 51, 98) 54%, rgba(10, 3, 60, 0.97) 100%);
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100vw;
            min-height: 600px;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: white;
            width: 380px;
            margin: auto;
            height: 500px;
            border-radius: 25px;
            box-shadow: 0 0 10px black;
        }

        #account {
            position: relative;
            font-size: 90px;
            color: #e1cfcf;
            padding: 19px;
            background: rgb(99, 140, 187);
            background: radial-gradient(circle, rgb(10, 51, 98) 54%, rgba(10, 3, 60, 0.97) 100%);
            border-radius: 10px;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            top: -60px;
            left: calc(50% - 74px);
            box-shadow: 0 0 5px black;
        }

        .tabs {
            display: flex;
            position: relative;
            top: -25px;
            justify-content: center;
            color: rgb(73, 71, 71);
            height: 25px;
        }

        .reg-tab,
        .login-tab {
            width: 50%;
            text-align: center;
            padding-bottom: 10px;
            margin: auto 25px;
            cursor: pointer;
        }

        .reg-tab:hover,
        .login-tab:hover {
            color: rgb(10, 51, 98);
            border-bottom: 4px solid rgb(10, 51, 98);
        }
        .active{
            color: rgb(10, 51, 98);
            border-bottom: 4px solid rgb(10, 51, 98);
        }
        #login-form {
            display: block;
            padding-top: 25px;
        }

        form {
            width: 90%;
            display: flex;
            flex-direction: column;
            margin: 15px auto;
        }

        input {
            height: 27px;
            margin: 5px;
            border-radius: 15px;
            border: none;
            outline: none;
            background-color: rgb(209, 209, 209);
            padding: 5px;
            font-size: 17px;
            color: rgb(73, 73, 73);
            text-align: center;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .options {
            display: flex;
            align-items: center;
            margin-top: 25px;
            font-style: italic;
        }

        .remember {
            display: flex;
            align-items: center;
            width: 50%;
            text-align: center;
        }

        button {
            margin: 20px auto;
            font-size: 20px;
            background-color: rgb(10, 51, 98);
            color: white;
            padding: 10px 45px;
            border-radius: 18px;
            box-shadow: 0 0 2px rgb(117, 113, 113);
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: rgba(0, 81, 255, 0.781);
        }
        /*#registration-form{*/
        /*    display: none;*/
        /*}*/
        .tnc{
            display: flex;
            align-items: center;
            margin: auto;
            color: rgb(54, 52, 52);
            font-style: italic;
        }

        /* making design responsive */

@media screen and (max-width:600px) {
.container {
width: 90%;
}
}

@media screen and (max-width:350px) {
.container {
width: 320px;
}
}

</style>
</head>

<body>

<div class="container">
    <i id="account" class="fas fa-users"></i>
    <?php if($bool){?>
    <div class="tabs">

        <h2 class="login-tab">Login</h2>
    </div>
    <!-- login part -->

    <div id="login-form">
        <form action="" method="post">
            <input type="text" name="username" id="username" requiredplaceholder="username">
            <br>
            <input type="password" name="password" id="pass" required placeholder="password">

            <button type="submit" name = "submit">Login</button>
            <p><a href="?a=register" class="reg-tab">Create account</a></p>
        </form>
    </div>
    <?php  } ?>
    <!-- Lets add registration form -->
    <?php  if(isset($_GET['a'])){if(($_GET['a']=='register')){?>
        <div class="tabs">

            <h2 class="login-tab">Register</h2>
        </div>

    <div id="registration-form">

        <form action="" method="post">

            <input type="text" name="username" id="username" required placeholder="Enter Username">
            <input type="email" name="email" id="email" required placeholder="Enter Email">
            <input type="password" name="pass" id="pass"required placeholder="Enter Password">
            <input type="text" name="about" id="conform-pass" required placeholder="About">
            <button type="submit" name="regster">Register</button>
            <?php  if($mes){?>
                <h4 class="text text-danger"><?=$message?></h4>
           <?php } ?>
        </form>
    </div>
    <?php  } }?>

</div>
<!-- lets use some javascript to make these tabs to work -->
<!--<script>-->
<!--    const reg_form = document.querySelector("#registration-form");-->
<!--    const login_form = document.querySelector("#login-form");-->
<!---->
<!--    const reg_tab = document.querySelector('.reg-tab');-->
<!--    const login_tab = document.querySelector('.login-tab');-->
<!---->
<!--    reg_tab.addEventListener('click',e=>{-->
<!--        login_form.style.display = 'none';-->
<!--        reg_form.style.display = 'block';-->
<!--        reg_tab.classList.add('active');-->
<!--        login_tab.classList.remove('active')-->
<!--    })-->
<!--    login_tab.addEventListener('click',e=>{-->
<!--        reg_form.style.display = 'none';-->
<!--        login_form.style.display = 'block';-->
<!--        reg_tab.classList.remove('active');-->
<!--        login_tab.classList.add('active')-->
<!--    })-->
<!---->
<!--</script>-->
</body>

</html>
