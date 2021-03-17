<?php
/**
 * Gestion du chargement automatique des classes
 * 
 * @author Romu.
 */

namespace app\src\lib;

class Autoloader {

    /**
     * Chargement automatique des classes
     * @return void
     */
    public static function autoload() : void {
        spl_autoload_register(function(string $className) {
            self::fileIntergrator(self::deleteNamespace($className));
        });
    }


    /**
     * @param string $file. Nom du/des fichier à require
     * @return void
     */
    private static function fileIntergrator(string $files) : void {
        $fileList = self::explodeClassList($files);

        // Liste des repertoires dans lesquelles on recherche des classes
        $directoryList = [
            BACK_ROOT . '/lib/',
            BACK_ROOT . '/controller/',
            BACK_ROOT . '/model/dataAccessObject/',
            BACK_ROOT . '/model/entities/',
            BACK_ROOT . '/model/services/'
        ];

        foreach($fileList as $file) {
            foreach($directoryList as $directory) {
                if(is_file($directory . $file . '.php')) {
                    require_once($directory . $file . '.php');
                }
            }
        }
    }

    /**
     * Récupère la liste des classes sous forme de chaine de caractère puis la transforme en tableau
     * @param stirng $classList
     * @return array
     */
    private static function explodeClassList(String $classList) : array {
        return explode(" ", $classList);
    }

    /**
     * Supprime le namespace du nom de la classe
     * @params String
     * @return String
     */
    private static function deleteNamespace(String $className) : String {
        $explode = explode('\\', $className);

        // Le dernier élément du tableau correspond au nom de la classe
        return end($explode);
    }
}