<?php

// Minimal versi PHP
$minPHPVersion = '7.2';
if (version_compare(PHP_VERSION, $minPHPVersion, '<')) {
    die("PHP version must be {$minPHPVersion} or higher. Current: " . PHP_VERSION);
}
unset($minPHPVersion);

// FCPATH = folder public
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Root project CI4 (folder spp1)
$rootPath = realpath(__DIR__ . '/..');

if (!$rootPath) {
    die("Root project CI4 tidak ditemukan!");
}

// Composer Autoload
$autoload = $rootPath . '/vendor/autoload.php';
if (!is_file($autoload)) {
    die("Composer autoload tidak ditemukan! Path: " . $autoload);
}
require $autoload;

// Load Paths.php
$pathsFile = $rootPath . '/app/Config/Paths.php';
if (!is_file($pathsFile)) {
    die("Paths.php tidak ditemukan! Path: " . $pathsFile);
}
require $pathsFile;

// Buat objek paths
$paths = new Config\Paths();

// OVERRIDE lokasi SYSTEM folder → ambil dari vendor
$paths->systemDirectory = $rootPath . '/vendor/codeigniter4/framework/system';

// Bootstrap file
$bootstrap = $paths->systemDirectory . '/bootstrap.php';
if (!is_file($bootstrap)) {
    die("Bootstrap file tidak ditemukan! Path: " . $bootstrap);
}

// Jalankan aplikasi
$app = require $bootstrap;
$app->run();
