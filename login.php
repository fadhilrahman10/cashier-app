<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword">

  <title>Login</title>

  <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <div class="container h-100">
    <div class="row justify-content-center mt-5">
      <div class="col-4">
        <h1>Login</h1>
        <hr class="bg-dark" />
      </div>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-4">
        <form class="col-12" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="user" autofocus aria-describedby="emailHelp" />
            <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" />
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
            <label class="form-check-label" for="exampleCheck1">Show</label>
          </div>
          <button type="submit" name="proses" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['proses'])) {
    require 'config.php';

    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);

    $sql = 'select * from kasir where username =? and password =?';
    $row = $config->prepare($sql);
    $row->execute(array($user, $pass));
    $jum = $row->rowCount();
    if ($jum > 0) {
      session_start();
      $hasil = $row->fetch();
      $_SESSION['admin'] = $hasil;
      echo '<script>alert("Login Sukses");window.location="index.php"</script>';
    } else {
      echo '<script>alert("Login Gagal");history.go(-1);</script>';
    }
  }
  ?>
  <!-- js placed at the end of the document so the pages load faster -->
  <!-- <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>