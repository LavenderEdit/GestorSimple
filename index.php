<?php
session_start();
?>

<?php
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';

require_once __DIR__ . '/controllers/HomeController.php';

use Controllers\HomeController;
$homeController = new HomeController();
$homeController->index();

include __DIR__ . '/includes/footer-content.php';
include __DIR__ . '/includes/scripts.php';
?>