<?php
$ruta="../../";

include $ruta."gestio/classes/cls_includes.php";

switch ($_GET['accio']) {
    case 'a':
        header("location:".$ruta."gestio/vistes/v_autor.php?idaut=0");
        break;
    case 'l';
        header("location:".$ruta."gestio/llistats/ll_autor.php");
        break;
    case 'v';
        break;
    default:
        break;
}
