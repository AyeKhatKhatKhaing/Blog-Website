<?php

function conn()
{
    return mysqli_connect("localhost", "root", "", "myblog");
}

$info = array(
    "name" => "Sample Blog",
    "short" => "SB",
    "description" => "ကျောင်းသားများအတွက် sample project"
);

$role = ["Admin", "Editor", "User"];
$url = "http://{$_SERVER['HTTP_HOST']}/php/sample_blog";
$con=mysqli_connect("localhost", "root", "", "myblog");