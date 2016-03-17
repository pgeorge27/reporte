<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reporte</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $uploads = "uploads/";
            function listFileDate($path){
                $dir = opendir($path);
                $list = array();
                while ($file = readdir($dir)) {
                    if ($file != '..' &&
                        $file != '.') {
                        $mTime = filemtime($path . $file) . ',' . $file;
                        $list[$mTime] = $file;
                    }
                }
                closedir($dir);
                ksort($list);
                foreach ($list as $key => $value) {
                    return $list[$key];
                }
                return '';
            }
            $nombreImage = listFileDate($uploads);
            $dividirNombreImage = $nombreImage;
            $porcionNombre = explode("-",$dividirNombreImage);
            $porcionFecha = explode(".", $porcionNombre[1]);
            $fechaDia = substr($porcionFecha[0], 0, 2);
            $fechaMes = substr($porcionFecha[0], 2, 2);
            $fechaAnio = substr($porcionFecha[0], 4, 4);
            $hora = substr($porcionFecha[0], 9, 2);
            $minuto = substr($porcionFecha[0], 11, 2);
            $segundo = substr($porcionFecha[0], 13, 2);
        ?>
        <div class="container">
            <img src="http://lorempixel.com/200/100" alt="img-responsive" alt="Logo-Empresa"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><b>Reporte</b></h4>
                </div>
                <div class="panel-body">
                    <img class="img-responsive" src="<?php echo $uploads.$nombreImage ?>" alt="<?php $porcionNombre[0]; ?>" />
                </div>
                <div class="panel-footer">
                    <h5><b>Actualizado: </b>
                        <i><?php echo $fechaDia ."/".  $fechaMes ."/". $fechaAnio?>
                            <?php echo $hora .":". $minuto .":". $segundo?>
                        </i>
                    </h5>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.2.1.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
