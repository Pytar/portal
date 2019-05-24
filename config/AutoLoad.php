<?php
namespace config;

require_once 'Util.php';
require_once 'Constantes.php';

class AutoLoad
{

    public function __construct()
    {
        
        spl_autoload_extensions('.php');
        spl_autoload_register(array(
            $this,
            'load'
        ));
    }

    private function load($className)
    {
        $extension = spl_autoload_extensions();

        $padroes = array();
        $padroes[] = "conexao";
        $padroes[] = "config";
        $padroes[] = "modelo";
        $padroes[] = "controlador";
        $padroes[] = "exception";
        $padroes[] = "DAO";
       

        $parts = explode('\\', $className);
        $classe = end($parts);
       // Util::fnDebugg($classe);
        foreach ($padroes as $dir) {
            //Util::fnDebugg($dir);
            $ListaCaminhoValidos = Util::fnMontaCaminhosValidos($dir, 4);

            foreach ($ListaCaminhoValidos as $path) {
                
                if (file_exists($path . Constantes::DS . $classe . $extension)) {

                    require_once ($path . Constantes::DS . $classe . $extension);
                    return;
                }
            }
        }
    }
}
?>