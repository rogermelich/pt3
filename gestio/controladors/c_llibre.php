<?php

$ruta = "../../";

include $ruta . "gestio/classes/cls_includes.php";

switch ($_GET['accio']) {
    case 'al':
        header("location:" . $ruta . "gestio/vistes/v_llibre.php?idllib=0");
        break;
    case 'll';
        header("location:" . $ruta . "gestio/llistats/ll_llibre.php");
        break;
    case 'cl';
        $idllibre = $_GET['idllib'];
        header('location:' . $ruta . 'gestio/vistes/v_llibre.php?idllib=' . $idllibre);
        break;
    case 'vl';
        switch ($_POST['h_accio']) {
            case 'Acceptar':
                $idllibre = $_GET['idllib'];
                $llibre = $_POST['llibre'];
                $llib = new llibre($ruta);
                $llib->carregaValors($idllibre, $llibre);
                $retorn = $llib->afegeix();
                header('Location:' . $ruta . 'gestio/vistes/v_llibre.php?idllib=' . $retorn);
                break;
            case 'Esborrar':
                $idllibre = $_GET['idllib'];
                $llibre = $_POST['h_llibre'];
                $llib = new llibre($ruta);
                $llib->carregaValors($idllibre, $llibre);
                $llib->esborra();
                header('location:' . $ruta . 'gestio/llistats/ll_llibre.php');
                break;
            case 'Guardar':
                $idllibre = $_GET['idllib'];
                $llibre = $_POST['llibre'];
                $llib = new llibre($ruta);
                $llib->carregaValors($idllibre, $llibre);
                $llib->modifica();
                header('Location:' . $ruta . 'gestio/vistes/v_llibre.php?idllib=' . $idllibre);
                break;
        }
        
    default:
        break;
}
