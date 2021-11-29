<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
/* ===========Category Product Routes============= */
$route['categories/(:any)'] = 'home/categories/$1';
$route['search'] = 'home/search';
$route['hot-products'] = 'home/hot_products';
$route['make-your-own-design'] = 'home/make_design';
$route['recent-products'] = 'home/recent_products';
$route['featured-products'] = 'home/featured_products';
$route['trending-products'] = 'home/trending_products';
$route['brand/(:any)']    = 'home/brand/$1';
$route['product/(:any)/(:any)'] = 'home/product/$1/$2';
$route['blog/(:any)/(:any)'] = 'blog/index/$1/$2';
$route['vendor/(:any)/(:any)'] = 'vendor/index/$1/$2';

/*--- New Route Url ---*/ 
$route['category/(:any)/(:any)/(:any)'] = 'home/category/$1/$2';
$route['sub-category/(:any)/(:any)/(:any)'] = 'home/sub_category/$1/$2';
$route['child-category/(:any)/(:any)/(:any)'] = 'home/child_category/$1/$2';
$route['brand/(:any)/(:any)/(:any)'] = 'home/brand/$1/$2';
$route['hot-offers/(:any)'] = 'home/hot_offers/$1';
$route['best-selling/(:any)'] = 'home/best_collection/$1';
/*--- End New Route Url ---*/

/*--- Old Route Url ---*/ 
$route['category/(:any)/(:any)'] = 'home/category/$1/$2';
$route['sub-category/(:any)/(:any)'] = 'home/sub_category/$1/$2';
$route['child-category/(:any)/(:any)'] = 'home/child_category/$1/$2';
$route['brand/(:any)/(:any)'] = 'home/brand/$1/$2';
/*--- End Old Route Url ---*/ 

$route['categories/(:any)'] = 'home/categories/$1';
$route['hot-products'] = 'home/hot_products';
$route['recent-products'] = 'home/recent_products';
$route['featured-products'] = 'home/featured_products';
$route['trending-products'] = 'home/trending_products';
$route['supplier'] = 'home/supplier';
$route['manufacture'] = 'home/manufacture';
$route['wholesaler'] = 'home/wholesaler';
$route['retailer'] = 'home/retailer';
$route['brand/(:any)']    = 'home/brand/$1';
$route['product/(:any)/(:any)'] = 'home/product/$1/$2';
$route['blog/(:any)/(:any)'] = 'blog/detail/$1/$2';
$route['vendor/(:any)/(:any)'] = 'vendor/index/$1/$2';
$route['about-us'] = 'page/about';
$route['term-and-conditions'] = 'page/term';
$route['return-policy'] = 'page/return_policy';
$route['privacy-policy'] = 'page/privacy_policy';
$route['secure-shopping'] = 'page/secure';
$route['delivery-infomation'] = 'page/delivery';
$route['security'] = 'page/security';
$route['faq'] = 'page/faq';
$route['tracking-order'] = 'page/tracking';
$route['contact-us'] = 'page/contact';
$route['brands'] = 'page/brands';
$route['eid-collection'] = 'home/eid_collection';
$route['best-selling'] = 'home/eid_collection';
$route['sales-contract'] = 'page/contract';
$route['subscribers'] = 'page/subscribers';
$route['app'] = 'page/app';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
