<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 01-10-16
 * Time: 12:11 PM
 *
 */


?>
<h1>Este es su codigo QR</h1>
<p><img src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=www.harold-sw1.cf SU CODIGO ES <?=$id?>&amp;chld=H|0"></p>
<a href="site" class="btn btn-danger">VOlver a inicio</a>
<form action="cargarArchivo.php" method="post" enctype="multipart/form-data">
    <button class="btn btn-warning"> Seleccione el archivo </button>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    <br />
    <input name="userfile" type="file" />
    <br/>
    <input type="submit" value="Enviar"/>
</form>

<?
