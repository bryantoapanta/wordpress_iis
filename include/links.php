<div class="row">

    <div id="links" class="align-self-center col-4 offset-4 rounded">

        <button class="btn btn-outline-light mt-2 cancelar volver">X</button>

        <div class="row enlaces_paginas justify-content-center">

            <div class='col-12 text-center'>
                <h2><?= $_POST["categoria"] ?></h2>
            </div>

            <?php
            foreach ($datos as $item) {
                //echo substr($item["url"], 0, 1); //devuelve el primer caracter de la cadena
                if (substr($item["url"], 0, 1) == 'h') {
                    $url = $item["url"];
                } else $url = "http://82.223.11.63:8050/" . $item["url"];
                echo "
                <div class='col-12 text-center'>
                <a target = '_blank' href='" . $url . "'><button class='btn'>" . $item['nombre'] . "</button></a>
                </div>
                ";
            }
            ?>
        </div>

    </div>

</div>