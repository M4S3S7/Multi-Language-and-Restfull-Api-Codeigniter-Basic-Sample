<?php
defined('BASEPATH') OR exit('No direct script access allowed');




//home_page
$route['default_controller']                                = 'welcome';
$route['blog']                                              = 'welcome/blog_list';
$route['blog/(:any)/(:any)']                                = 'welcome/blog_detail';

//dashboard pages
  //image Action
$route['dashboard']                                         = 'siteController/DashboardController/homePage';
$route['dashboard/image/(:any)']                            = 'siteController/DashBoardController/homePage/image/$1';
$route['dashboard/image/(:any)/(:any)/(:any)']              = 'siteController/DashBoardController/fileController/image/$1/$2';
  //menu Action bu kısmı eklemeyi unutmamam gerekiyor
$route['dashboard/menu']                                    = 'siteController/DashBoardController/menuController/menu';
$route['dashboard/menu/(:any)/(:any)']                      = 'siteController/DashBoardController/menuController/menuInsert';
  //blog page dashboard
$route['dashboard/blog']                                    = 'siteController/DashBoardController/blogController/blog';
$route['dashboard/blog/(:any)/(:any)']                      = 'siteController/DashBoardController/blogController/blogInsert';
  //error page
$route['404_override']                                      = '';
$route['translate_uri_dashes']                              = FALSE;




//api Routes
$route['auth/login']['post']           = 'auth/login';
$route['auth/logout']['post']          = 'auth/logout';
$route['book']['get']          	       = 'book';
$route['book/detail/(:num)']['get']    = 'book/detail/$1';
$route['book/create']['post']     	   = 'book/create';
$route['book/update/(:num)']['put']    = 'book/update/$1';
$route['book/delete/(:num)']['delete'] = 'book/delete/$1';
