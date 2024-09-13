<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'IndexController';
$route['404_override'] = 'IndexController/notfound';
$route['translate_uri_dashes'] = FALSE;

//home Index
$route['danh-muc/(:any)/(:any)']['GET'] = 'IndexController/category/$1/$2';
$route['thuong-hieu/(:any)/(:any)']['GET'] = 'IndexController/brand/$1/$2';
$route['san-pham/(:any)/(:any)']['GET'] = 'IndexController/product/$1/$2';
$route['cart']['GET'] = 'IndexController/cart';
$route['add-to-cart']['POST'] = 'IndexController/add_to_cart';
$route['delete-all-cart']['GET'] = 'IndexController/delete_all_cart';
$route['delete-item/(:any)']['GET'] = 'IndexController/delete_item/$1';
$route['update-cart-item']['POST'] = 'IndexController/update_cart_item';
$route['dang-nhap']['GET'] = 'IndexController/login';
$route['dang-ky']['POST'] = 'IndexController/signup';
$route['dang-xuat']['GET'] = 'IndexController/logout';
$route['checkout']['GET'] = 'IndexController/checkout';
$route['confirmCheckout']['POST'] = 'IndexController/confirmCheckout';
$route['online-checkout']['POST'] = 'OnlineCheckoutController/online_checkout';
$route['login-customer']['POST'] = 'IndexController/login_customer';
$route['thanks']['GET'] = 'IndexController/thanks';
$route['tim-kiem']['GET'] = 'IndexController/tim_kiem';
$route['shop']['GET'] = 'IndexController/shop';
$route['about']['GET'] = 'IndexController/about';
$route['user']['GET'] = 'IndexController/user';
$route['user-history']['GET'] = 'IndexController/user_history';
$route['resume']['GET'] = 'IndexController/resume';


//pagination
$route['pagination/(:num)'] = 'IndexController/index/$1';
$route['pagination'] = 'IndexController';
$route['danh-muc/(:any)/(:any)/(:any)']['GET'] = 'IndexController/category/$1/$2/$3';
$route['thuong-hieu/(:any)/(:any)/(:any)']['GET'] = 'IndexController/brand/$1/$2/$3';
$route['tim-kiem/(:any)']['GET'] = 'IndexController/tim_kiem/$1';

//email
$route['test-mail'] = 'IndexController/send_mail';
$route['xac-thuc-dang-ky']['GET'] = 'IndexController/xac_thuc_dang_ky';

//ADMIN
//login
$route['login']['GET'] = 'LoginController/index';
$route['login-user']['POST'] = 'LoginController/login';
$route['register-admin']['GET'] = 'LoginController/register_admin';
$route['register-insert']['POST'] = 'LoginController/register_insert';

//dashboard
$route['dashboard']['GET'] = 'DashboardController/index';
$route['logout']['GET'] = 'DashboardController/logout';

//Brand
$route['brand/create']['GET'] = 'BrandController/create';
$route['brand/list']['GET'] = 'BrandController/index';
$route['brand/store']['POST'] = 'BrandController/store';
$route['brand/edit/(:any)']['GET'] = 'BrandController/edit/$1';
$route['brand/update/(:any)']['POST'] = 'BrandController/update/$1';
$route['brand/delete/(:any)']['GET'] = 'BrandController/delete/$1';

//blog
$route['blog/create']['GET'] = 'BlogController/create';
$route['blog/list']['GET'] = 'BlogController/index';
$route['blog/store']['POST'] = 'BlogController/store';
$route['blog/edit/(:any)']['GET'] = 'BlogController/edit/$1';
$route['blog/update/(:any)']['POST'] = 'BlogController/update/$1';
$route['blog/delete/(:any)']['GET'] = 'BlogController/delete/$1';
$route['blog']['GET'] = 'IndexController/blog';
$route['blog-detail/(:any)/(:any)']['GET'] = 'IndexController/blog_detail/$1/$2';

//post
$route['post/create']['GET'] = 'PostController/create';
$route['post/list']['GET'] = 'PostController/index';
$route['post/store']['POST'] = 'PostController/store';
$route['post/edit/(:any)']['GET'] = 'PostController/edit/$1';
$route['post/update/(:any)']['POST'] = 'PostController/update/$1';
$route['post/delete/(:any)']['GET'] = 'PostController/delete/$1';


//Category
$route['category/create']['GET'] = 'CategoryController/create';
$route['category/list']['GET'] = 'CategoryController/index';
$route['category/store']['POST'] = 'CategoryController/store';
$route['category/edit/(:any)']['GET'] = 'CategoryController/edit/$1';
$route['category/update/(:any)']['POST'] = 'CategoryController/update/$1';
$route['category/delete/(:any)']['GET'] = 'CategoryController/delete/$1';

//Product
$route['product/create']['GET'] = 'ProductController/create';
$route['product/list']['GET'] = 'ProductController/index';
$route['product/store']['POST'] = 'ProductController/store';
$route['product/edit/(:any)']['GET'] = 'ProductController/edit/$1';
$route['product/update/(:any)']['POST'] = 'ProductController/update/$1';
$route['product/delete/(:any)']['GET'] = 'ProductController/delete/$1';

//order
$route['order/list']['GET'] = 'OrderController/index';
$route['order/print_order/(:any)']['GET'] = 'OrderController/print_order/$1';
$route['order/view/(:any)']['GET'] = 'OrderController/view/$1';
$route['order/delete/(:any)']['GET'] = 'OrderController/delete_order/$1';
$route['order/process']['POST'] = 'OrderController/process';

//slider
$route['slider/create']['GET'] = 'SliderController/create';
$route['slider/list']['GET'] = 'SliderController/index';
$route['slider/store']['POST'] = 'SliderController/store';
$route['slider/edit/(:any)']['GET'] = 'SliderController/edit/$1';
$route['slider/update/(:any)']['POST'] = 'SliderController/update/$1';
$route['slider/delete/(:any)']['GET'] = 'SliderController/delete/$1';

//contact
$route['contact']['GET'] = 'IndexController/contact';
$route['send_contact']['POST'] = 'IndexController/send_contact';

//comment
$route['comment/send']['POST'] = 'IndexController/comment_send';

//get user & admin
$route['user/admin']['GET'] = 'OrderController/user_admin';
$route['user/customer']['GET'] = 'OrderController/customer';
