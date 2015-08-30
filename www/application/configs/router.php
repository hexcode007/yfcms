<?php

$route['default']['controller'] = "index";
$route['default']['action'] = "index";

$route['any']['article/([0-9]+).html'] = "article/detail/$1/";
$route['any']['article/p([0-9]+)[/]?'] = "article/index/$1/";
$route['any']['reg.html'] = "login/reg/";
$route['any']['login.html'] = "login/";
$route['any']['regsave.html'] = "login/regsave/";
return $route;

