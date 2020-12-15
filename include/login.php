<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Tiendas Luxenter ::</title>
    <!-- Icono-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <link rel='shortcut icon' type='image/png' href='images/icons/favicon.png' />

    <!-- BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--JQUERY 3.2.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" content="text/css" href="include/css.css">
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">

</head>

<body>

    <div class='row justify-content-center'>
        <div class='text-center mt-5'>
            <img width='700px' src="images/newLogo.png">
        </div>
    </div>

    <div class="container">

        <div class="row justify-content-center ">
            <div class="titulo_modificar text-center titulo ">
                <h4 class="">ACCESO PORTAL TIENDAS</h4>
            </div>
        </div>

        <div class="row justify-content-center formulario">

            <div name="formulario" class="col-4">
                <form name='añadir' method="POST" action="index.php?">

                    <div class="form-group">
                        <input type="text" class="form-control user" name="user" value="<?php if (isset($_POST["user"])) {
                                                                                            echo $_POST["user"];
                                                                                        } ?>" placeholder="Usuario" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control " name="password" value="" placeholder="Contraseña" required>
                    </div>

                    <?php if ((isset($msg))) { ?>
                        <div id='aviso' class="alert alert-danger text-center"><?= $msg  ?> <a class='boton_X text-right'>x</a></div>
                    <?php } ?>

                    <div class="text-center">
                        <input type='submit' class="entrar btn " value='Entrar'>
                    </div>

                </form>
            </div>
        </div>

    </div>



</body>

</html>