<?php

/**
 * Created by PhpStorm.
 * User: harold
 * Date: 04-10-16
 * Time: 02:54 PM
 */
?>
<div class="jumbotron">
<h1><STRONG>PERFIL DE USUARIO</STRONG></h1>
  <?php
  echo "<img src='data:".$perf->tipoFoto.";base64,".$perf->foto1."' />";


  ?>
    <h2>Nombre: <strong> <?=$model->nombre?></strong></h2>
<h2>Nombre de usuario:  <strong> <?=$model->username?></strong></h2>
<h2>Email: <strong><?=$model->email?></strong></h2>
</div>