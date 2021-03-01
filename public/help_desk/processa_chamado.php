<?php
    session_start();

    if(!(isset($_SESSION['authenticated'])) || $_SESSION['authenticated'] != true){
        echo "not authenticated";
    }

    $form_errors = array();
    if(!isset($_POST['title']) || $_POST['title'] == ''){
        $form_errors['title'] = 'empty'; 
    } else {
        $title = $_POST['title'];
    }
    if(!isset($_POST['category']) || $_POST['category'] == ''){
        $form_errors['category'] = 'empty'; 
    } else {
        $category = $_POST['category'];
    }
    if(!isset($_POST['desc']) || $_POST['desc'] == ''){
        $form_errors['desc'] = 'empty'; 
    } else {
        $desc = $_POST['desc'];
    }
    if(!empty($form_errors)){
        $_SESSION['form_errors'] = $form_errors;
        header('Location: abrir_chamado.php');
    }

    $file = fopen('../../apps/help_desk/file.hd', 'a');

    $line = $_SESSION['id'] . "#" . $title . "#" . $category . "#" . $desc . PHP_EOL;

    fwrite($file, $line);

    /*
    if(isset($_SESSION['chamados'])){
        $chamados = $_SESSION['chamados'];
    } else {
        $chamados = array();
    }
    $chamados[] = array(
        'title' => $title,
        'category' => $category,
        'desc' => $desc
    );

    <?php

if(isset($_SESSION['chamados'])){
    $categories = array(1 => 'Impressora', 'Hardware', 'Software', 'Rede');
    $chamados = $_SESSION['chamados'];

    foreach ($chamados as $chamado): ?>
    <div class="card mb-3 bg-light">
        <div class="card-body">
        <h5 class="card-title"><?= $chamado['title'] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $categories[$chamado['category']] ?></h6>
        <p class="card-text"><?= $chamado['desc'] ?>.</p>

        </div>
    </div>

    <?php endforeach; ?>
<?php } ?>


    $_SESSION['chamados'] = $chamados;
    */
    header('Location: home.php');
?>
