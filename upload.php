<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Estatus de Reporte</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <img src="http://lorempixel.com/200/100" alt="img-responsive" alt="Logo-Empresa"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><b>Estatus de Reporte</b></h4>
                </div>
                <div class="panel-body">
                    <?php
                        date_default_timezone_set("America/Argentina/Buenos_Aires");
                        $today = date("dmY His");
                        $array = explode('.',$_FILES['fileUpload']['name']);
                        $extension = end($array);
                        $file_name = "-".$today.".".$extension;
                        $target_dir = "uploads/";
                        $target_file = $target_dir . $file_name;

                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                        if (isset($_POST['submit'])) {
                            $check = getimagesize($_FILES['fileUpload']['tmp_name']);
                            if ($check !== false) {
                                $variableMsj = '<p>El archivo es una imagen - ' . $check["mime"] . ".</p>";
                                $uploadOk = 1;
                            } else {
                                $variableMsj = '<p class="bg-warning">El archivo no es una imagen.</p>';
                                $uploadOk = 0;
                            }
                        }

                        if (file_exists($target_file)) {
                            $variableMsj = '<p class="bg-warning">El archivo ya existe.</p>';
                            $uploadOk = 0;
                        } else if ($_FILES['fileUpload']['size'] > 500000) {
                            $variableMsj = '<p class="bg-warning">El archivo es muy grande '. $_FILES['fileUpload']['size']."</p>";
                            $uploadOk = 0;
                        } else if (strcasecmp($imageFileType,"jpg") &&
                            strcasecmp($imageFileType,"png") &&
                            strcasecmp($imageFileType,"jpeg") &&
                            strcasecmp($imageFileType,"gif")) {
                                $variableMsj = '<p class="bg-warning">Solo archivos jpg, png, jpeg y gif estan permitidos.</p>';
                                $uploadOk = 0;
                        }

                        if ($uploadOk == 0) {
                            $variableMsj .= '<p class="bg-danger">Su archivo no fue cargado.</p>';
                        } else {
                            if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
                                $variableMsj = '<p class="bg-success">El archivo ' . basename($_FILES['fileUpload']['name']) . ' fue cargado satisfactoriamente.</p>';
                            } else {
                                $variableMsj = '<p class="bg-danger">Ocurrio un error al cargar su archivo.</p>';
                            }
                        }
                    ?>
                    <?php echo $variableMsj ?>
                    <div class="row"></div>
                    <a href="./index.php" class="btn btn-primary" role="button">Volver</a>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.2.1.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
