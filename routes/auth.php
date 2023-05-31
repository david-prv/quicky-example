<?php

use Quicky\App;
use Quicky\Http\Request;
use Quicky\Http\Response;

const ADMIN_EMAIL = "admin@example.tld";
const ADMIN_PASS = "admin";

// Pseudo Controller

function controller_login($email) {
    App::session()->set("user.logged_in", "yes");
    App::session()->set("user.email_address", $email);
}

function controller_logout() {
    App::session()->destroy();
}

function controller_is_authorized() {
    return App::session()->get("user.logged_in") === "yes";
}

// End Pseudo Controller

App::route("GET", "/login", function (Request $_, Response $response) {
    $response->render("login");
    return $response;
});

App::route("GET", "/logout", function (Request $_, Response $response) {
    controller_logout();
    $response->redirect("/login");
    return $response;
});


App::route("GET", "/test", function (Request $_, Response $response) {
    App::router()->dump();
    return $response;
});

App::route("POST", "/login", function (Request $request, Response $response) {
    $email = $request->getField("email");
    $password = $request->getField("password");

    if ($email === ADMIN_EMAIL && $password === ADMIN_PASS) {
        controller_login($email);
        $response->redirect("/dashboard");
    } else {
        controller_logout();
        $response->redirect("/login");
    }

    return $response;
});

App::group("controller_is_authorized", function () {

    App::route("GET", "/dashboard", function (Request $request, Response $response) {
        $response->render("dashboard", [
            "USER_EMAIL" => App::session()->get("user.email_address")
        ]);
        return $response;
    });

});