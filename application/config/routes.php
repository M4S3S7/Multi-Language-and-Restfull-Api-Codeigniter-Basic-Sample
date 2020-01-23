<?php
defined('BASEPATH') OR exit('No direct script access allowed');




//home_page
$route['default_controller'] = 'welcome';


//dashboard pages
$routue['dashboard']                                        = 'siteController/DashboardController/homePage';
$route['dashboard/image/(:any)']                            = 'siteController/DashBoardController/homePage/image/$1';
$route['dashboard/image/(:any)/(:any)/(:any)']              = 'siteController/DashBoardController/fileController/image/$1/$2';

//error page
$route['404_override']                = '';
$route['translate_uri_dashes']        = FALSE;




//api Routes
$route['auth/login']['post']           = 'auth/login';
$route['auth/logout']['post']          = 'auth/logout';
$route['book']['get']          	       = 'book';
$route['book/detail/(:num)']['get']    = 'book/detail/$1';
$route['book/create']['post']     	   = 'book/create';
$route['book/update/(:num)']['put']    = 'book/update/$1';
$route['book/delete/(:num)']['delete'] = 'book/delete/$1';
