<?php
require_once('template/core/auth.php');
require_once('template/core/base.php');
require_once('template/core/function.php');

$id = $_GET['id'];
if (userDelete($id)) {
    linkTo('user_list.php');
}