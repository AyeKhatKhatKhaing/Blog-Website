<?php
require_once('template/core/auth.php');
require_once('template/core/base.php');
require_once('template/core/function.php');

$id=$_GET['id'];
if(postDelete($id)){
    linkTo('post_list.php'); 
}