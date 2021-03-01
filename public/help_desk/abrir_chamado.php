<?php
  require_once('inicio.php');
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
      .card-abrir-chamado {
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

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="processa_chamado.php" method="POST">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" name="title" class="form-control" placeholder="Título">
                      <?php
                        if(isset($_SESSION['form_errors']['title']) && $_SESSION['form_errors']['title'] == 'empty'){
                      ?>
                        <small class="form-text text-danger">
                        É necessário um título.
                        </small>
                      <?php } ?>
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control" name="category">
                        <option value="">Criação Usuário</option>
                        <option value="1">Impressora</option>
                        <option value="2">Hardware</option>
                        <option value="3">Software</option>
                        <option value="4">Rede</option>
                      </select>
                      <?php
                        if(isset($_SESSION['form_errors']['category']) && $_SESSION['form_errors']['category'] == 'empty'){
                      ?>
                        <small class="form-text text-danger">
                        É necessário uma categoria.
                        </small>
                      <?php } ?>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" rows="3" name="desc"></textarea>
                      <?php
                        if(isset($_SESSION['form_errors']['desc']) && $_SESSION['form_errors']['desc'] == 'empty'){
                      ?>
                        <small class="form-text text-danger">
                        É necessário uma descrição.
                        </small>
                      <?php } unset($_SESSION['form_errors']); ?>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" href="home.php">
                          Voltar
                        </a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>