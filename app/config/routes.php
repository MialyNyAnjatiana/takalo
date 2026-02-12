<?php

use app\controllers\ObjetController;
use app\controllers\DemandeController;
use app\controllers\UserController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;


/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
	$router->group('', function(Router $router) use ($app) {


// Accueil / login
Flight::route('GET /', [UserController::class, 'showLogin']);
Flight::route('POST /login', [UserController::class, 'postLogin']);

// Objets
Flight::route('GET /home', [ObjetController::class, 'getObjets']);
Flight::route('GET /objet/@id', [ObjetController::class, 'getDetailObjet']);
Flight::route('GET /objets/user/@id', [ObjetController::class, 'getObjetsByUser']);

// CRUD objets
Flight::route('GET /objet/add', [ObjetController::class, 'addObjetForm']);       // Formulaire ajout
Flight::route('POST /objet/add', [ObjetController::class, 'addObjet']);          // Soumettre ajout
Flight::route('GET /objet/edit/@id', [ObjetController::class, 'editObjetForm']); // Formulaire modification
Flight::route('POST /objet/update/@id', [ObjetController::class, 'updateObjet']); // Soumettre modification
Flight::route('GET /objet/delete/@id', [ObjetController::class, 'deleteObjet']);  // Supprimer

// Demandes
Flight::route('GET /demandes-recues', [DemandeController::class, 'getDemandesRecues']);
Flight::route('GET /demandes-envoyees', [DemandeController::class, 'getDemandesEnvoyees']);
Flight::route('POST /envoyer-demande', [DemandeController::class, 'envoyerDemande']);
Flight::route('GET /demande/@id/accepter', [DemandeController::class, 'accepter']);
Flight::route('GET /demande/@id/refuser', [DemandeController::class, 'refuser']);




	
}, [ SecurityHeadersMiddleware::class ]);