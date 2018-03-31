<?php
    //ARQUIVO DE CONFIGURAÇÃO
    require 'config.php';

	//INICIO DA SESÂO
	session_start();

	//AUTOLOAD
    spl_autoload_register(function ($class){
    	if(file_exists("controllers/".$class.'.php')) {
    		require "controllers/".$class.'.php';
    	} else if (file_exists('models/'.$class.'.php')) {
    		require 'models/'.$class.'.php';
    	} else {
    		require 'core/'.$class.'.php';
    	}
    });

    $home = new core();
    $home->run();

?>
