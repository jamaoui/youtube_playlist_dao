<?php

namespace app\Controllers;

use app\models\Voiture;

class VoitureController extends BaseController
{
    /**
     * @return Voiture
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Voiture();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les voitures
        $voitures = static::getModel()->latest();

        // View (afficher les données)
        static::view("list", $voitures);
    }

    public static function createAction()
    {
        static::view('create');
    }

    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setModele($_POST['modele'])
                ->setPrix($_POST['prix'])
                ->create();
            if ($created === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function editAction()
    {
        static::view('edit', self::getModel()::view($_GET['id']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
                ->setModele($_POST['modele'])
                ->setPrix($_POST['prix'])
                ->update($_POST['id']);
            if ($updated === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function destroyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id']);
            if ($deleted === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }
}