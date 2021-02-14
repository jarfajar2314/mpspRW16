<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login</title>
</head>

<body style="background-color: hsl(218,67%,98%);">
    <div class="container" style="width:700px; margin-top:50px;">
        <div class="login">
            <h1>Login</h1>
            <form action="<?php echo base_url('login/proses_login/'); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required autocomplete="off">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('Home/index') ?>" type="submit" class="btn btn-primary">Kembali</a>
            </form>
            <br>
            <p>Belum punya akun? <a href="<?php echo base_url('Home/register') ?>"> ayo bikin!</a></p>
            <?php
            if (isset($data)) {
                echo $data;
            }
            ?>
        </div>
    </div>
</body>

</html>