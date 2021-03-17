<?php
 /**
  * Gestion des routes du projet
  * L'url arrive au format : http://piedDeVigne/public/index.php?p='controller/action/parametres'
  * On récupère la chaine de caractère de l'argument "p" pour définir les fichiers à insérer et les méthodes à executer
  * 
  * @author: Romu 
  *
  */
  
namespace app\src\lib;

class Rooter {
    // ATTRIBUTS
    private $_get = [];
    private $_default = ['Articles', 'newArticle', ''];
    private $_controller;
    private $_action;

    // CONSTRUCTEUR
    /**
     * @param array $get. $_GET
     */
    public function __construct(array $get) {
        $this->explodeUrl($get);
        $this->defineController();
        $this->defineAction();  
    }
    
    // METHODES
    /**
     * Récupère les paramètres de l'url sous forme de tableau
     * puis explose le paramètre 'p' si il existe, sinon on lui attribut des valeurs par défaut
     * @param array $get. Url sous forme de tableau
     * @return void
     */
    private function explodeUrl(array $get) : void {
        if(isset($get['p'])) {

            // suppression du "trailing slash" eventuel (le / de fin de chaine)
            $cleanGet = ($get['p'][-1] === '/') ? substr($get['p'],0, -1) : $get['p'];

            $this->_get = explode('/', $cleanGet);
        } else {
            $this->_get = $this->_default;
        }
    }

    /**
     * Défini le controller à utiliser
     * @return void
     */
    private function defineController() : void {
        $file = $this->_get[0] . 'Controller';
        $this->_controller = (is_file(BACK_ROOT . '/controller/' . $file . '.php')) ? $file : 'ArticlesController';
    }

    /**
     * Défini l'action à utiliser
     * @return void
     */
    private function defineAction() : void {
        $this->_action = (isset($this->_get[1])) ? $this->_get[1] : 'newArticle';    
    }

    /**
     * @return void
     */
    public function getRoot() : void {
        // Inclus mon controller
        require_once(BACK_ROOT . '/controller/' . $this->_controller . '.php');
        
        $controller = $this->_controller;
        $action = $this->_action;
        $params = '';
        
        // Instancie mon controller
        $new  = new $controller;

        // Appel de la méthode (action)
        $new->$action($params);
    }
}