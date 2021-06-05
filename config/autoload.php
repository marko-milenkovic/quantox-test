<?php

spl_autoload_register(function ($className) {
    if (file_exists('./Service/' . $className . '.php')) {
        require_once './Service/' . $className . '.php';
    } elseif (file_exists('./Controller/' . $className . '.php')) {
        require_once './Controller/' . $className . '.php';
    } elseif (file_exists('./Template/' . $className . '.php')) {
        require_once './Template/' . $className . '.php';
    } elseif (file_exists('./Entity/' . $className . '.php')) {
        require_once './Entity/' . $className . '.php';
    } elseif (file_exists('./Interface/' . $className . '.php')) {
        require_once './Interface/' . $className . '.php';
    } elseif (file_exists('./Trait/' . $className . '.php')) {
        require_once './Trait/' . $className . '.php';
    }
});