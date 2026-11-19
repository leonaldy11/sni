
<?php

/**
 * ==========================================
 * CONFIGURATION APPLICATION SNI
 * ==========================================
 */

// Root folder project
// Karena config.php berada di dalam folder Config
$projectRoot = realpath(dirname(__DIR__));


// Normalisasi path
$projectRoot = str_replace('\\', '/', $projectRoot);


// Ambil informasi script yang sedang dijalankan
$scriptFile = str_replace(
    '\\',
    '/',
    realpath($_SERVER['SCRIPT_FILENAME'] ?? '') ?: ''
);

$scriptName = str_replace(
    '\\',
    '/',
    $_SERVER['SCRIPT_NAME'] ?? ''
);


// ==========================================
// BASE URL DETECTION
// ==========================================

$basePath = '';

if (
    $scriptFile !== '' &&
    $scriptName !== '' &&
    strpos($scriptFile, $projectRoot) === 0
) {

    $relativeScript = substr(
        $scriptFile,
        strlen($projectRoot)
    );

    if (
        $relativeScript !== '' &&
        substr($scriptName, -strlen($relativeScript)) === $relativeScript
    ) {

        $basePath = substr(
            $scriptName,
            0,
            strlen($scriptName) - strlen($relativeScript)
        );
    }
}


// Fallback jika deteksi sebelumnya gagal
if ($basePath === '') {

    $documentRoot = str_replace(
        '\\',
        '/',
        realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: ''
    );

    if (
        $documentRoot !== '' &&
        strpos($projectRoot, $documentRoot) === 0
    ) {

        $basePath = substr(
            $projectRoot,
            strlen($documentRoot)
        );
    }
}


// ==========================================
// URL CONFIGURATION
// ==========================================

define('BASE_URL', rtrim($basePath, '/'));

// URL Admin
define('URL', BASE_URL . '/Admin/');

// URL User
define('USER_URL', BASE_URL . '/');

// URL Assets Admin
define('ASSET_URL', BASE_URL . '/Admin/Assets/');

define('LAYOUT_URL', BASE_URL . '/Public/assets/');


// ==========================================
// PHYSICAL PATH CONFIGURATION
// ==========================================

// Root project
define('ROOT_PATH', $projectRoot . '/');

// Admin
define('ADMIN_PATH', ROOT_PATH . 'Admin/');

// Admin Views
define('VIEW_PATH', ADMIN_PATH . 'Views/');

// Admin Layouts
define('LAYOUT_PATH', VIEW_PATH . 'layouts/');

// Admin Assets (physical path)
define('ASSET_PATH', ADMIN_PATH . 'Assets/');

// Controller
define('CONTROLLER_PATH', ROOT_PATH . 'Controllers/');

// Model
define('MODEL_PATH', ROOT_PATH . 'Models/');

// Database
define('DB_PATH', ROOT_PATH . 'Db/');

// Config
define('CONFIG_PATH', ROOT_PATH . 'Config/');

// User Pages
define('PAGE_PATH', ROOT_PATH . 'Page/');

