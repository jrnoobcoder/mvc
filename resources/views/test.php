<!-- resources/views/index.php -->

<?php
$title = 'Home Page';
ob_start();
?>

<h1>Welcome to the Home Page</h1>
<p>This is the content of the home page.</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/master.php';
?>
