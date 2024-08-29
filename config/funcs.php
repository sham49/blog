<?php

function dump($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function dd($arr){
	dump($arr);
	die();
}

function old($fieldname){
	return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function redirect($url){
    header("Location: {$url}");
    die;
}

function get_alerts(){
    if (!empty($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        unset($_SESSION['color']);
    }

    if (!empty($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
        unset($_SESSION['color']);
    }

    if(!empty($_SESSION['update'])){
    	echo $_SESSION['update'];
        unset($_SESSION['update']);
        unset($_SESSION['color']);
    }
}

function validation($post_name, $name){
    if(empty($_POST[$post_name])){
        $_SESSION[$post_name] = "Поле $name не может быть пустым";
    }else{
        unset($_SESSION[$post_name]);
    }
}