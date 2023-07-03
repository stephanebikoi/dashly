<?php

namespace App\Core;

use App\Controllers\DashboardsController;
/**
 * router principal
 */
class Main {
    public function start() {

        
         //on demarre la session
        session_start();

        // on retire le "trailing slash" eventuel de l'url

        $uri = $_SERVER['REQUEST_URI'];

        // on verifi si uri n'est poas vide ert se termine par un /
        if ((!empty($uri)) && ($uri != '/') && ($uri[-1] === "/")) {
            //on enleve le  /
            $uri = substr($uri, 0, -1);

            // on envoi le code de redirection permanente
            http_response_code(301);

            //on redirige vers l'url sans /
            header ('Location: '.$uri);
        }

        // on gere les parametre d'url
        // p=controleur/methode/parametres
        //on separe les parametre dans un tableau
        $params = [];
        if(isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        if ( $params[0] != '') {
            //on a au moins un parametre
            // on recupere le nom du cntrolleur a instancier
            // on met une majuscule en 1ere lettre , on ajout le namspace complet avant et on ajoute "controller apres

            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';
            
            // on instancie le controller
            $controller = new $controller();

            // on recupere le 2ieme parametre
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (method_exists($controller, $action)) {
                // on verifie si il reste des parametre on les passe a la methode
                (isset($params[0])) ? call_user_func_array([$controller, $action],$params) : $controller->$action();
            } else {
                http_response_code(404);
                echo " la page recherchee n'existe pas";
            }


           
        } else {
            //on a pas de parametre on instanci le controlleur par defaut
            $controller = new DashboardsController;

            // on appele index 

            $controller->index();
        }
        }

}