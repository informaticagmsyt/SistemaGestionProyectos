<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">

</head>
<body>
    <?php
    $nombre=array("name"=>"nombre",
                    "paceholder"=>"nombre",
                    "type"=>"text");
    echo form_open("/test/recibirdatos"); ?>

<label >
    Nombre
<?php  echo form_input($nombre);?>
</label>

<label>
<input name="apellido">
</label>

<label>
<input name="email">
</label>
<?php echo form_submit('','Subir Curso'); ?>
    <?php echo form_close(); ?>
</body>
</html>