<?php
require_once('template/core/auth.php');
require_once('template/core/base.php');
require_once('template/core/function.php');

if(categoryRemovePin()){
    linkTo('category_add.php'); 
}