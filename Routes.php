<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Accueil;
use App\Controllers\Compte; 
use App\Controllers\Actualite; 
use App\Controllers\Concours; 
use App\Controllers\Candidature;




/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Accueil::class, 'afficher']);
$routes->get('compte/lister', [Compte::class, 'lister']);
$routes->get('actualite/afficher', [Actualite::class, 'afficher']);
$routes->get('accueil/afficher', [Accueil::class, 'afficher']);
//$routes->get('accueil/afficher/(:segment)', [Accueil::class, 'afficher']);
$routes->get('concours/afficher/', [Concours::class, 'afficher_crs']);
$routes->get('compte/creer', [Compte::class, 'creer']);
$routes->post('compte/creer', [Compte::class, 'creer']);
$routes->get('candidature/afficher', [Candidature::class, 'afficher']);
$routes->get('compte/connecter', [Compte::class, 'connecter']); 
$routes->post('compte/connecter', [Compte::class, 'connecter']);
$routes->get('compte/deconnecter', [Compte::class, 'deconnecter']);
$routes->get('compte/afficher_profil', [Compte::class, 'afficher_profil']);
$routes->get('concours/details/(:segment)', [Concours::class, 'details']);
$routes->get('candidature/suppression_candidature', [Candidature::class, 'suppression_candidature']);
$routes->post('candidature/suppression_candidature', [Candidature::class, 'suppression_candidature']);
$routes->get('concours/afficher_ccr_role', [Concours::class, 'afficher_ccr_role']);
$routes->get('concours/afficher_ccr_adm', [Concours::class, 'afficher_ccr_adm']);
$routes->get('concours/creer', [Concours::class, 'creer']);
$routes->post('concours/creer', [Concours::class, 'creer']);
$routes->get('candidature/trouver', [Candidature::class, 'trouver']); 
$routes->post('candidature/trouver', [Candidature::class, 'trouver']);



$routes->get('compte/update', [Compte::class, 'update']);
$routes->post('compte/update', [Compte::class, 'update']);

$routes->get('candidature/afficher/(:alphanum)/(:alphanum)', [Candidature::class, 'afficher']);
