<?php

    class core {

        public function run() {

            $url = explode('index.php', $_SERVER['PHP_SELF']);
            $url = end($url);
            $parametros = array();
            if(!empty($url)) {
                $url = explode('/', $url);
                array_shift($url);
                $file = $url[0];
                if(file_exists('controllers/'.$file.'Controller.php')){
                    $curentController = $url[0].'Controller';
                    array_shift($url);
                } else {
                    $curentController = 'homeController';
                    $curentAction = 'erro_404';
                }

                if(isset($url[0]) && !empty($url[0])) {
                    $controller = new $curentController();
                    $c = $url[0];
                    if(method_exists($controller, $c)) {
                        $curentAction = $url[0];
                        array_shift($url);
                    } else {
                        $curentAction = 'erro_404';

                    }
                } else {
                     $curentAction = 'index';
                }

                if(count($url) > 0) {
                    $parametros = $url;
                }

            } else {
                $curentController = 'homeController';
                $curentAction = 'index';
                $parametros = array();
            }

            $controller = new $curentController();
            call_user_func_array(array($controller, $curentAction), $parametros);


        }

    }

?>
