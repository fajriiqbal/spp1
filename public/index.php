<?php

// -----------------------------------------------
// CodeIgniter 4 Standard Public Index (FIXED)
// -----------------------------------------------

// Path ke folder public
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Path ke root project (1 folder di atas public/)
define('ROOTPATH', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

// Load konfigurasi path
require ROOTPATH . 'app/Config/Paths.php';

// Buat instance path
$paths = new Config\Paths();

// Autoloader composer
require ROOTPATH . 'vendor/autoload.php';

// Path ke bootstrap CI4
$bootstrap = ROOTPATH . $paths->systemDirectory . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Cek bootstrap
if (!is_file($bootstrap)) {
    die('Bootstrap file not found at: ' . $bootstrap);
}

// Load CI4
$app = require $bootstrap;

// Jalankan aplikasi
$app->run();
