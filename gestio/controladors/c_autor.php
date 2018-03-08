<?php

$ruta = "../../";

include $ruta . "gestio/classes/cls_includes.php";

switch ($_GET['accio']) {
    case 'a':
        header("location:" . $ruta . "gestio/vistes/v_autor.php?idaut=0");
        break;
    case 'l';
        header("location:" . $ruta . "gestio/llistats/ll_autor.php");
        break;
    case 'c';
        $idautor = $_GET['idaut'];
        header('location:' . $ruta . 'gestio/vistes/v_autor.php?idaut=' . $idautor);
        break;
    case 'v';
        switch ($_POST['h_accio']) {
            case 'Acceptar': 
                $idautor=$_GET['idaut'];
                $autor = $_POST['autor'];
                $aut=new autor($ruta);
                $aut->carregaValors($idaut,$autor);
                $retorn=$aut->afegeix();
                header('Location:'.$ruta.'gestio/vistes/v_autor.php?idaut='.$retorn);
                break;
            case 'Esborrar':
                $idautor = $_GET['idaut'];
                $autor = $_POST['h_autor'];
                $aut = new autor($ruta);
                $aut->carregaValors($idautor, $autor);
                $aut->esborra();
                header("location:" . $ruta . "gestio/llistats/ll_autor.php");
                break;
            case 'Guardar':
                $idautor = $_GET['idaut'];
                $autor = $_POST['autor'];
                $aut = new autor($ruta);
                $aut->carregaValors($idautor, $autor);
                $aut->modifica();
                header('Location:' . $ruta.'gestio/vistes/v_autor.php?idaut=' . $idautor);
                break;
        }

    default:
        break;
}
