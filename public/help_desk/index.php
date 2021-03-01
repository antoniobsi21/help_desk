<?php
  session_start();
  if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true){
    header('Location: home.php');
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-login">
          <div class="card mx-auto">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="POST">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Senha">

                  <?php
                    if(isset($_SESSION['error']) && $_SESSION['error'] == 'login_error') {
                  ?>
                    <small class="form-text text-danger">
                      Senha incorreta.
                    </small>


                  <?php
                    } else if(isset($_SESSION['error']) && $_SESSION['error'] == 'login_required') {

                  ?>
                    <small class="form-text text-danger">
                      Necessário logar.
                    </small>

                  <?php } ?>

                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>