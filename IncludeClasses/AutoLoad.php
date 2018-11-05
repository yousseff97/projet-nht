
<?php
/**
 * Created by PhpStorm.
 * User: loubou
 * Date: 28/05/2018
 * Time: 18:57
 */
function loadClass($maClasse)
{
    require $maClasse.'.php';
}
spl_autoload_register('loadClass');