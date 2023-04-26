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
|	https://codeigniter.com/userguide3/general/routing.html
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

// frontend
$route['default_controller'] = 'Home/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] =   'Dashboard/index';
$route['log-sign'] =   'Login/index';

$route['login'] =   'Login/index';
$route['register'] =   'Login/register';
$route['test_email'] =   'Login/send_example_email';

//member area
/* single */
$route['user/single'] =   'Single/index';
$route['user/single-add'] =   'Single/add';
$route['user/single-update/(:any)'] =   'Single/update/$1';
$route['user/single-detail/(:any)'] =   'Single/detail/$1';

/* album */
$route['user/album'] =   'Album/index';
$route['user/album-add'] =   'Album/add';
$route['user/album-update/(:any)'] =   'Album/update/$1';
$route['user/album-detail/(:any)'] =   'Album/detail/$1';

/* takedown */
$route['user/takedown'] =   'Takedown/index';
$route['user/takedown-add'] =   'Takedown/add';
$route['user/takedown-detail/(:any)'] =   'Takedown/detail/$1';

/* withdraw */
$route['user/withdraw'] =   'Withdraw/index';
$route['user/withdraw-add'] =   'Withdraw/add';
$route['user/withdraw-detail/(:any)'] =   'Withdraw/detail/$1';

//be
/* Admin_user manajemen */
$route['v2/user'] =   'Admin_user/index';
$route['v2/user-add'] =   'Admin_user/add';
$route['v2/user-add-detail/(:any)'] =   'Admin_user/index_material/$1';
$route['v2/user-update/(:any)'] =   'Admin_user/update/$1';
$route['v2/user-detail/(:any)'] =   'Admin_user/detail/$1';

/* single */
$route['v2/user/single'] =   'Admin_single/index';
$route['v2/user/single-add'] =   'Admin_single/add';
$route['v2/user/single-update/(:any)'] =   'Admin_single/update/$1';
$route['v2/user/single-detail/(:any)'] =   'Admin_single/detail/$1';


/* item manajemen */
$route['item'] =   'Item/index';
$route['item-add'] =   'Item/add';
$route['item-add-detail/(:any)'] =   'Item/index_material/$1';
$route['list-item-material/(:any)'] = 'Item/list_material_item/$1';
$route['item-update/(:any)'] =   'Item/update/$1';
$route['item-detail/(:any)'] =   'Item/detail/$1';

