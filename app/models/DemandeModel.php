<?php

namespace app\models;

use PDO;

class DemandeModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDemandesRecues($idUser) {

        $stmt = $this->db->prepare("
            SELECT d.*, 
                   u.nom AS nomEnvoyeur,
                   o1.description AS objetDemande,
                   o2.description AS objetPropose
            FROM demande_echange d
            JOIN User u ON d.idUserEnvoyeur = u.id
            JOIN objet o1 ON d.idObjet = o1.id
            JOIN objet o2 ON d.idObjetEchange = o2.id
            WHERE d.idUserReceveur = ?
        ");

        $stmt->execute([$idUser]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDemandesEnvoyees($idUser) {

        $stmt = $this->db->prepare("
            SELECT d.*, 
                   u.nom AS nomReceveur,
                   o1.description AS objetDemande,
                   o2.description AS objetPropose
            FROM demande_echange d
            JOIN User u ON d.idUserReceveur = u.id
            JOIN objet o1 ON d.idObjet = o1.id
            JOIN objet o2 ON d.idObjetEchange = o2.id
            WHERE d.idUserEnvoyeur = ?
        ");

        $stmt->execute([$idUser]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function envoyerDemande($idEnvoyeur, $idReceveur, $idObjet, $idObjetEchange) {

        $stmt = $this->db->prepare("
            INSERT INTO demande_echange 
            (idUserEnvoyeur, idUserReceveur, idObjet, idObjetEchange, etat)
            VALUES (?, ?, ?, ?, 'en_attente')
        ");

        $stmt->execute([$idEnvoyeur, $idReceveur, $idObjet, $idObjetEchange]);
    }

    public function changerEtat($idDemande, $etat) {

        $stmt = $this->db->prepare("
            UPDATE demande_echange
            SET etat = ?
            WHERE id = ?
        ");

        $stmt->execute([$etat, $idDemande]);
    }
}
