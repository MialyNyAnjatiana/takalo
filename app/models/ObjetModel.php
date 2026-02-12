<?php

namespace app\models;

use PDO;

class ObjetModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getObjets() {
        $stmt = $this->db->query("
            SELECT o.*, 
                   u.nom AS nomUser, 
                   c.nom AS nomCategorie,
                   p.lien_photo
            FROM objet o
            JOIN User u ON o.idUser = u.id
            JOIN categorie c ON o.idCategorie = c.id
            LEFT JOIN photo p ON p.idObjet = o.id
            GROUP BY o.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getObjetById($id) {
        $stmt = $this->db->prepare("
            SELECT o.*, 
                   u.nom AS nomUser, 
                   c.nom AS nomCategorie
            FROM objet o
            JOIN User u ON o.idUser = u.id
            JOIN categorie c ON o.idCategorie = c.id
            WHERE o.id = ?
            LIMIT 1
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPhotosByObjet($idObjet) {
        $stmt = $this->db->prepare("SELECT lien_photo FROM photo WHERE idObjet = ?");
        $stmt->execute([$idObjet]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function addObjet($description, $prix, $idUser, $idCategorie, array $photos = []) {
        $stmt = $this->db->prepare("
            INSERT INTO objet (description, prix, idUser, idCategorie)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([$description, $prix, $idUser, $idCategorie]);
        $idObjet = $this->db->lastInsertId();

        if (!empty($photos)) {
            $this->addPhotos($idObjet, $photos);
        }

        return $idObjet;
    }

    public function updateObjet($idObjet, $description, $prix, $idCategorie, array $photos = []) {
        $stmt = $this->db->prepare("
            UPDATE objet 
            SET description = ?, prix = ?, idCategorie = ? 
            WHERE id = ?
        ");
        $stmt->execute([$description, $prix, $idCategorie, $idObjet]);

        if (!empty($photos)) {
            $this->deletePhotos($idObjet);
            $this->addPhotos($idObjet, $photos);
        }
    }

    public function deleteObjet($idObjet) {
        $this->deletePhotos($idObjet);
        $stmt = $this->db->prepare("DELETE FROM objet WHERE id = ?");
        $stmt->execute([$idObjet]);
    }

    private function addPhotos($idObjet, array $photos) {
        $stmt = $this->db->prepare("INSERT INTO photo (lien_photo, idObjet) VALUES (?, ?)");
        foreach ($photos as $photo) {
            $stmt->execute([$photo, $idObjet]);
        }
    }

    private function deletePhotos($idObjet) {
        $stmt = $this->db->prepare("DELETE FROM photo WHERE idObjet = ?");
        $stmt->execute([$idObjet]);
    }

    public function getObjetsByUser($idUser) {
        $stmt = $this->db->prepare("
            SELECT o.*, 
                   u.nom AS nomUser,
                   c.nom AS nomCategorie
            FROM objet o
            JOIN User u ON o.idUser = u.id
            JOIN categorie c ON o.idCategorie = c.id
            WHERE o.idUser = ?
        ");
        $stmt->execute([$idUser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
