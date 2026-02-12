<?php

namespace app\controllers;

use app\models\DemandeModel;
use Flight;

class DemandeController {

    public function getDemandesRecues() {
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


        $idUser = $_SESSION['user']['id'];

        $model = new DemandeModel(Flight::db());
        $demandes = $model->getDemandesRecues($idUser);

        Flight::render('demandes_recues', [
            'demandes' => $demandes
        ]);
    }

    public function getDemandesEnvoyees() {

    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        $idUser = $_SESSION['user']['id'];

        $model = new DemandeModel(Flight::db());
        $demandes = $model->getDemandesEnvoyees($idUser);

        Flight::render('demandes_envoyees', [
            'demandes' => $demandes
        ]);
    }

    public function envoyerDemande() {

        $idUserEnvoyeur = $_SESSION['user']['id'];

        $idUserReceveur = Flight::request()->data->idUserReceveur;
        $idObjet = Flight::request()->data->idObjet;
        $idObjetEchange = Flight::request()->data->idObjetEchange;

        $model = new DemandeModel(Flight::db());
        $model->envoyerDemande($idUserEnvoyeur, $idUserReceveur, $idObjet, $idObjetEchange);

        Flight::redirect('/demandes-envoyees');
    }

    public function accepter($idDemande) {

        $model = new DemandeModel(Flight::db());
        $model->changerEtat($idDemande, 'acceptee');

        Flight::redirect('/demandes-recues');
    }

    public function refuser($idDemande) {

        $model = new DemandeModel(Flight::db());
        $model->changerEtat($idDemande, 'refusee');

        Flight::redirect('/demandes-recues');
    }
}
