<?php
  require_once('inicio.php');
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <?php
      require_once("menu.php");
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php
                $categories = array(1 => 'Impressora', 'Hardware', 'Software', 'Rede');
                $file = fopen('../../apps/help_desk/file.hd', 'r');
                
                while(!feof($file)) {

                  $chamado = fgets($file);

                  if(!empty($chamado) && ($chamado[0] == $_SESSION['id'] || $_SESSION['profile_id'] == 1)){
                    $chamado = explode('#', $chamado);
              ?>
                    <div class="card mb-3 bg-light">
                        <div class="card-body">
                        <h5 class="card-title"><?= $chamado[1] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $categories[$chamado[2]] ?></h6>
                        <p class="card-text"><?= $chamado[3] ?>.</p>

                        </div>
                    </div>

              <?php }} ?>


              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php">
                    <button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>