<!-- frontend/views/index.php -->

<?php
$title = 'Admin Dashboard';
ob_start();
?>

<h1>Welcome to the Admin Page</h1>
<p>This is the content of the home page.</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/master.php';
?>
