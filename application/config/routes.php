<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'Main/error404';

$route['AddOffer'] = 'Offers/showAddOfferForm';
$route['Offers'] = 'Offers/showOffers';
$route['Offer/(:num)'] = 'Offers/showOffer/$1';
$route['User/(:any)'] = 'Users/showUser/$1';
$route['Participants/(:num)'] = 'Participants/showParticipants/$1';
$route['Verify/(:any)'] = 'Verify/index/$1';
$route['ForgottenPassword'] = 'Users/showForgottenPasswordForm';
$route['ChangePassword/(:any)'] = 'Users/showChangePasswordForm/$1';
