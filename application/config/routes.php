<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['agenda/delete'] = 'agenda/delete';
$route['agenda/create'] = 'agenda/create';
$route['agenda/(:any)'] = 'agenda/set_color/$1';
$route['agenda'] = 'agenda';


$route['laporan_detail/excel/(:any)'] = 'laporan/detail_excel/$1';
$route['laporan/detail/(:any)'] = 'laporan/detail/$1';
$route['laporan/cari/excel/(:any)'] = 'laporan/cari_excel/$1';
$route['laporan/cari'] = 'laporan/cari';
$route['laporan/excel'] = 'laporan/excel';
$route['laporan'] = 'laporan';


$route['payment/update/(:any)'] = 'payment/update/$1';
$route['payment/create'] = 'payment/create';
$route['payment'] = 'payment';


$route['projek/delete/(:any)'] = 'projek/delete/$1';
$route['projek/update/(:any)'] = 'projek/update/$1';
$route['projek/create'] = 'projek/create';
$route['projek/detail/(:any)'] = 'projek/detail/$1';
$route['projek'] = 'projek';


$route['klien/delete/(:any)'] = 'klien/delete/$1';
$route['klien/update/(:any)'] = 'klien/update/$1';
$route['klien/create'] = 'klien/create';
$route['klien'] = 'klien';


$route['server/delete/(:any)'] = 'server/delete/$1';
$route['server/update/(:any)'] = 'server/update/$1';
$route['server/create'] = 'server/create';
$route['server'] = 'server';

$route['admin/update/(:any)'] = 'admin/update/$1';
$route['admin'] = 'admin/kelola';

$route['home/short'] = 'halaman/short_tahun';
$route['home'] = 'halaman/home';
$route['logout'] = 'halaman/logout';
$route['login'] = 'halaman/login';
$route['default_controller'] = 'halaman';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
?>