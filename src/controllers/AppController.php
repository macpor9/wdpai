<?php

require_once 'const.php';

class AppController {
    private $request;

    public function __construct(){
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost(): bool{
        return $this->request === "POST";
    }
    protected function isGet(): bool{
        return $this->request === "GET";
    }

    protected function render(string $template = null, array $variables = []){
        $templatePath = 'public/views/'.$template.'.php';
        $output = "File not found";

        if (file_exists($templatePath)){
            extract($variables);

            ob_start();

            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }

    protected function checkLogged(bool $requireLogged = true){
        if($requireLogged){
            if(!$_SESSION[SESSION_KEY_IS_LOGGED]){
                $url = "http://".$_SERVER['HTTP_HOST'];
                header("Location: {$url}");
                die();
            }
        }
        else if($_SESSION[SESSION_KEY_IS_LOGGED]){
            $url = "http://".$_SERVER['HTTP_HOST'];
            header("Location: {$url}/profile");
            die();
        }


    }
}