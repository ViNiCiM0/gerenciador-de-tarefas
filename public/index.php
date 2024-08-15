<?php

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once __DIR__ . '/../principal.php';
} elseif ($_SERVER['PATH_INFO'] === '/nova-tarefa') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../principal.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../save.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-tarefa') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../edit.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../update.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-tarefa') {
    require_once __DIR__ . '/../delete.php';
}

//ARRUMAR O EDIT NAO TA FUNCIONANDO ESSA BOSTA