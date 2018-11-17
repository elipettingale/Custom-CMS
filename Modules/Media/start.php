<?php

if (!app()->routesAreCached()) {
    require __DIR__ . '/Routes/admin.php';
    require __DIR__ . '/Routes/api.php';
}
