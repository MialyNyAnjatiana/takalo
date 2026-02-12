<?php

namespace app\controllers;

use app\models\ObjetModel;
use Flight;

class ObjetController {

    public function getObjets() {
        $model = new ObjetModel(Flight::db());
        $objets = $model->getObjets();
        Flight::render('home', ['objets' => $objets]);
    }

    public function getDetailObjet($id) {
        $model = new ObjetModel(Flight::db());
        $objet = $model->getObjetById($id);
        if (!$objet) Flight::redirect('/home');

        $photos = $model->getPhotosByObjet($id);
        Flight::render('produit', [
            'objet' => $objet,
            'photos' => $photos
        ]);
    }

    public function addObjetForm() {
        Flight::render('add_objet'); // Affiche formulaire ajout
    }

    public function addObjet() {
        $req = Flight::request();
        $description = $req->data->description;
        $prix = $req->data->prix;
        $idCategorie = $req->data->idCategorie;
        $idUser = $_SESSION['user']['id'] ?? null;

        // Upload photos
        $uploadedPhotos = [];
        if (!empty($_FILES['photos']['name'][0])) {
            foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                $filename = basename($_FILES['photos']['name'][$key]);
                move_uploaded_file($tmpName, __DIR__ . '/../../public/assets/img/' . $filename);
                $uploadedPhotos[] = $filename;
            }
        }

        $model = new ObjetModel(Flight::db());
        $model->addObjet($description, $prix, $idUser, $idCategorie, $uploadedPhotos);

        Flight::redirect('/home');
    }

    public function editObjetForm($idObjet) {
        $model = new ObjetModel(Flight::db());
        $objet = $model->getObjetById($idObjet);
        $photos = $model->getPhotosByObjet($idObjet);
        Flight::render('edit_objet', [
            'objet' => $objet,
            'photos' => $photos
        ]);
    }

    public function updateObjet($idObjet) {
        $req = Flight::request();
        $description = $req->data->description;
        $prix = $req->data->prix;
        $idCategorie = $req->data->idCategorie;

        // Upload nouvelles photos
        $uploadedPhotos = [];
        if (!empty($_FILES['photos']['name'][0])) {
            foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                $filename = basename($_FILES['photos']['name'][$key]);
                move_uploaded_file($tmpName, __DIR__ . '/../../public/assets/img/' . $filename);
                $uploadedPhotos[] = $filename;
            }
        }

        $model = new ObjetModel(Flight::db());
        $model->updateObjet($idObjet, $description, $prix, $idCategorie, $uploadedPhotos);

        Flight::redirect("/objet/$idObjet");
    }

    public function deleteObjet($idObjet) {
        $model = new ObjetModel(Flight::db());
        $model->deleteObjet($idObjet);
        Flight::redirect('/home');
    }

    public function getObjetsByUser($idUser) {
        $model = new ObjetModel(Flight::db());
        $objets = $model->getObjetsByUser($idUser);
        Flight::render('objetUser', ['objets' => $objets, 'idUser' => $idUser]);
    }
}


