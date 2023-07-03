<?php 
namespace App\Controllers;

abstract class Controller {

    public function __construct() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

    }

    public function render(string $fichier, array $donnees = [], string $template = 'layout') {
        
        // on extrait le contenu de $donnees
        extract($donnees);

        // On demarre le buffer de sortie
        ob_start();
        // Apartir de ce point toute sortie est conserve en memoire
        
        // on creer le chemin vers la vue
        require_once ROOT.'/views/'.$fichier.'.php';
        
        //transfere le buffer dans $contenu
        $contennu = ob_get_clean();

       require_once ROOT.'/Views/'.$template.'.php';
    }

    protected function isAdmin () {

        if (isset($_SESSION['auth']) ) {
            return true;
        } else {
            return header('Location: auths/login');
        }
    }
}