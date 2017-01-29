<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Main';
$route['Register'] = 'Main/register';
$route['Login'] = 'Main/login';
$route['AddOffer'] = 'Main/addOffer';
$route['Offers'] = 'Offers/showOffers';
$route['Offer/(:num)'] = 'Offers/showOffer/$1';
$route['User/(:any)'] = 'Users/showUser/$1';
$route['Participants/(:num)'] = 'Participants/showParticipants/$1';
$route['404_override'] = 'Main/error404';
$route['translate_uri_dashes'] = FALSE;
