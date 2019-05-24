<?php
namespace config;

use Exception;
use DOMDocument;

class Util
{
    /**
     * 
     * @return string
     */
    public static function fnGerarSenhaRandomica() {
        return  uniqid(md5(rand()), true);
    }

    /**
     * @return Array string
     */
    public static function fnDebugg($pValor)
    {
        echo "<pre>";
        var_dump($pValor);
        echo "</pre>";
        echo "<br>";
        die("************");
    }

    /**
     * Debuga a aplicacao sem parar
     */
    public static function fnDebuggSemDie($pValor)
    {
        echo "<pre>";
        var_dump($pValor);
        echo "</pre>";
        echo "<br>";
    }
    
    /**
     * entrada '2011-08-01 16:30:08'
     * SaÃ­da = 01/08/2011 16:30:08
     */
    public static function fnFormatarData($pData,$isComTracos,$isDataBanco){
       
        $separador = "/";
        
        if ($isComTracos){
            $separador = "-";
        }
        
        if($isDataBanco){
            return  strftime("%Y".$separador."%m".$separador."%d", strtotime($pData));
        }else{
            return  strftime("%d".$separador."%m".$separador."%Y", strtotime($pData));
        }
    }
    /**
     * saida '20110801 16:30:08'
     * entrada = 01/08/2011 16:30:08
     */
    public static function fnFormatarDataBanco($pData){
        
        $rsdata = explode("/",$pData);
        $vAnoHora = explode(" ",$rsdata[2]);
        
        /*
         * Verifica se possui hora na data
         */
        if ( count($vAnoHora) > 0 ) {
            
            
            return  $vAnoHora[0]."-".$rsdata[1]."-".$rsdata[0]." ".$vAnoHora[1];
            
        }
        else { // Nao possui hora na data
            
            return  $rsdata[2]."-".$rsdata[1]."-".$rsdata[0];
            
        }
        
        
    }
    
    public static function fnRetiraAcentos(string $pTexto) {
        $array1 = array("Ã¡", "Ã ", "Ã¢", "Ã£", "Ã¤", "Ã©", "Ã¨", "Ãª", "Ã«", "Ã­", "Ã¬", "Ã®", "Ã¯", "Ã³", "Ã²", "Ã´", "Ãµ", "Ã¶", "Ãº", "Ã¹", "Ã»", "Ã¼", "Ã§"
            , "Ã�", "Ã€", "Ã‚", "Ãƒ", "Ã„", "Ã‰", "Ãˆ", "ÃŠ", "Ã‹", "Ã�", "ÃŒ", "ÃŽ", "Ã�", "Ã“", "Ã’", "Ã”", "Ã•", "Ã–", "Ãš", "Ã™", "Ã›", "Ãœ", "Ã‡");
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
            , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C");
        return str_replace($array1, $array2, $pTexto);
    }
    public static function fnFormataNumero($pValor) {
        return number_format($pValor, 2, ",", ".");
    }
    
    public static function fnRetirarMascaraCpf(string $pTexto){
        return str_replace(array(".","/","-"),"",$pTexto);
    }

    public static function fnListarDiretorios()
    {
        $dir = opendir(".");

        while ($temp = readdir($dir)) {
            if ($temp == ".." || $temp == "." || $temp == "images" || ! is_dir($temp) || (substr($temp, 0, 1) == "."))
                continue;
            $subdir[] = $temp;
        }

        closedir($dir);

        rsort($subdir);

        return $subdir;
    }

    public static function fnMontaCaminhosValidos($pNomeDiretorio, $pQuantidade)
    {
        $Retorno = array();
        $stringPath = "";

        for ($i = 0; $i <= $pQuantidade; $i ++) {
            $Retorno[] = $stringPath . $pNomeDiretorio;
            $stringPath .= ".." . Constantes::DS;
        }

        return $Retorno;
    }
    
    public static function fnValidaCPF(string $pCpf){
        // Verifiva se o numero digitado contem todos os digitos
        $pCpf = str_pad(ereg_replace('[^0-9]', '', $pCpf), 11, '0', STR_PAD_LEFT);
        
        // Verifica se nenhuma das sequencias abaixo foi digitada, caso seja, retorna falso
        if (strlen($pCpf) != 11 || $pCpf == '00000000000' || $pCpf == '11111111111' || $pCpf == '22222222222' || $pCpf == '33333333333' || $pCpf == '44444444444' || $pCpf == '55555555555' || $pCpf == '66666666666' || $pCpf == '77777777777' || $pCpf == '88888888888' || $pCpf == '99999999999')
        {
            return false;
        }
        else
        {   // Calcula os numeros para verificar se o CPF Ã© verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $pCpf{$c} * (($t + 1) - $c);
                }
                
                $d = ((10 * $d) % 11) % 10;
                
                if ($pCpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
    
    
    
    public static function LimparSession() {
        
        // Verifica se a sessÃ£o estÃ¡ iniciada
        if (!isset($_SESSION)) { session_start(); }
        
        // Finaliza todas as sessÃµes
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
            $_SESSION[$key] = NULL;
        }
        
        // DestrÃ³i todas
        session_destroy();
    }
    
    /**
     * Criar uma session no sistema
     * @param string $key
     * @param string $value
     */
    public static function CriarSession(string $key, $value) {
        
        // Verifica se a sessÃ£o estÃ¡ iniciada
        if (!isset($_SESSION)) { session_start(); }
        
        // Cria a sessÃ£o corrente
        $_SESSION[$key] = $value;
    }
    
    /**
     * FunÃ§Ã£o para retornar o objeto carregado na session
     * @param string $key
     * @param string $value
     */
    public static function GetSession(string $key) {
        
        // Verifica se a sessÃ£o estÃ¡ iniciada
        if (!isset($_SESSION)) { session_start(); }
        
        // Retorna a sessÃ£o corrente
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        else {
            return null;
        }
    }
    
    /**
     * FunÃ§Ã£o para validar se a sessÃ£o estÃ¡ carregada,
     * caso nÃ£o esteja, o sistema irÃ¡ redirecionar
     * para uma pÃ¡gina especÃ­fica
     * @param string $key
     * @param string $value
     */
    public static function ValidarSession(string $key, string $redirect) {
        
        // Verifica se a sessÃ£o estÃ¡ iniciada
        if (!isset($_SESSION)) { session_start(); }
        
        // A sessÃ£o nÃ£o estÃ¡ carregada
        if(!isset($_SESSION[$key])) {
            header('Location: ' . $redirect);
            die();
        }
        else {
            return TRUE;
        }
    }
    
    public static function  GravarLog($e){
        
        try {
            
            $dom = new DOMDocument("1.0", "UTF-8");
            
            $dom->preserveWhiteSpace = false;
            
            $dom->formatOutput = true;
            
            $root = $dom->createElement("logErros");
            
            $erro = $dom->createElement("Erro");
            
            $descricao = $dom->createElement("descricao",$e->getMessage());
            
            $trace  = $dom->createElement("trace",$e->getTraceAsString());
            
            $dono  = $dom->createElement("arquivo",$e->getFile());
            
            $linha = $dom->createElement("linha",$e->getLine());
            
            $data  = $dom->createElement("data",date("d/M/Y H:i:s"));
            
            $erro->appendChild($descricao);
            $erro->appendChild($trace);
            $erro->appendChild($dono);
            $erro->appendChild($linha);
            $erro->appendChild($data);
            
            $root->appendChild($erro);
            $dom->appendChild($root);
            
            
            if(file_exists("../../temp/log.xml")){
              
                unlink("../../temp/log.xml");
                $dom->save("../../temp/log.xml");
                
            }else {
                //die("sdfjksdjfl");
                $dom->save("../../temp/log.xml");
            }
            
        } catch (Exception $e) {
            // Ignora a falha
        }
    }
    
    
    
}

?>