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
$route['default_controller'] = 'teacher';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login']='welcome';
$route['signup']='welcome/register';

//all managing users' session
$route['register']='user/add_user';
$route['authenticate']='user/auth';
$route['logout']='user/logout';

//managing classroom data
$route['home']='dashboard';

//classroom
$route['classroom']['get']='classroom';
$route['classroom']['post']='classroom/add';
$route['classroom/(:num)/edit']['get']='classroom/edit/$1';
$route['classroom/update']['post']='classroom/update';
$route['classroom/(:num)/delete']['get']='classroom/remove/$1';
$route['classroom/all']['get']='classroom/get_all';
$route['classroom/(:num)/view']['get']='classroom/get_class/$1';
$route['classroom/assign']['post']='classroom/assign';
$route['classroom/(:num)/assign']['get']='classroom/assign_students/$1';


//students
$route['student']['get']='student';
$route['student']['post']='student/add';
$route['student/(:num)/edit']['get']='student/edit/$1';
$route['student/update']['post']='student/update';
$route['student/(:any)/delete']['get']='student/remove/$1';
$route['student/all']['get']='student/get_all';
$route['student/assign']['post']='student/assign';
$route['student/(:num)/view']['get']='student/get_student/$1';

//subject
$route['subject']['get']='subject';
$route['subject']['post']='subject/add';
$route['subject/(:num)/edit']['get']='subject/edit/$1';
$route['subject/update']['post']='subject/update';
$route['subject/(:any)/delete']['get']='subject/remove/$1';
$route['subject/all']['get']='subject/get_all';
$route['subject/assign']['post']='subject/assign';
$route['subject/(:num)/view']['get']='subject/get_student/$1';