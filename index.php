<?php
//started 6:30pm

require_once "router.php";
$route = new Route();
// add / generate the necsary routes
$route->Add("/", "index.html");
$route->Add("/api/jokes", "api.rest.jokes.php");
$route->Dispatch(); // dispatch the routing system
