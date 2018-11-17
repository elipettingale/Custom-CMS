<?php

if (!app()->routesAreCached()) {
    require __DIR__ . '/Routes/admin.php';
}
