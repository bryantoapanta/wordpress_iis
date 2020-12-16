<?php

include_once 'databaseConnect.php';

function CtlLogin()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["user"]) && isset($_POST["password"])) { //si los post estan definidos 
            if (ModeloUserDB::userCheck($_POST["user"], $_POST["password"])) { //llamo a la funcion para comprobar que la contraseña y el usuario son correctos
                $_SESSION['user'] = $_POST["user"];
                $msg = "Usuario valido";
                header("Location: ?");
            } else $msg = "Usuario o contraseña no validos";
        }
    }
    include_once 'include/login.php';
}

// Pagina Gestionar
function CtlCargarLinks()
{
    $datos = ModeloUserDB::obtener_links($_POST['categoria']);
    //var_dump($datos);
    include_once 'include/links.php';
}

//Pagina Rankings
function CtlCargarRanking()
{
    var_dump($_POST);
    include_once 'include/rankings/ranking_clientes.php';
}

function CtlCerrar_Sesion()
{
    session_destroy();
}
