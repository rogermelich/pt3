<?php
$ruta="../../";

include $ruta."gestio/classes/cls_includes.php";

switch ($_GET['accio']) {
    case 'al':
        header("location:".$ruta."gestio/vistes/v_llibre.php?idllib=0");
        break;
    case 'll';
        header("location:".$ruta."gestio/llistats/ll_llibre.php");
        break;
    case 'v';
        break;
    default:
        break;
}
