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
    private $_controller;
    private $_action;
    private $_params;
    private $_default = [
        'controlleur' => 'AccueilController',
        'action' => 'index',
        'params' => ''];

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
     * puis explose le paramètre 'p' si il existe ou qu'il ne renvoie pas une chaine vide , sinon on lui attribut des valeurs par défaut
     * @param array $get. Url sous forme de tableau
     * @return void
     */
    private function explodeUrl(array $get) : void {
        if(isset($get['p']) && $get['p'] != '') {
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
        // récupère le nom du controller puis on supprime l'élément du tableau
        $file = array_shift($this->_get) . 'Controller';
        $this->_controller = (is_file(BACK_ROOT . '/controller/' . $file . '.php')) ? $file : $this->_default['controlleur'];
    }

    /**
     * Défini l'action à utiliser
     * @return void
     */
    private function defineAction() : void {
        // récupère le nom de la méthode a executer puis on supprime l'élément du tableau
        $this->_action = (isset($this->_get[0])) ? array_shift($this->_get) : $this->_default['action'];

        // On vérifie que la méthode existe dans le controller, dans le cas contraire on renvoie les valeurs par défaut
        if(!method_exists($this->_controller, $this->_action)) {
            $this->_controller = $this->_default['controlleur'];
            $this->_action = $this->_default['action'];
        }
    }

    /**
     * Défini les paramètres
     * Les paramètres sont transmis sous forme de tableau
     * @return void 
     */
    private function defineParams() : void {
        $this->_params = (isset($this->_get[0])) ? $this->_get : $this->_default['params'];
    }

    /**
     * @return void
     */
    public function getRoot() : void {
        // Inclus mon controller
        require_once(BACK_ROOT . '/controller/' . $this->_controller . '.php');
        
        $controller = $this->_controller;
        $action = $this->_action;
        $params = $this->_params;
        
        // Instancie mon controller
        $new  = new $controller;

        // Appel de la méthode (action) avec les paramètres éventuels
        $new->$action($params);
    }
}