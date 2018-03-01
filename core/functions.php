<?php

function dd($data) {
    die(var_dump($data));
}

function view($page, $data=[]) {
    extract($data);
    require("views/{$page}.php");
}
