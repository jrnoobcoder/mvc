<!-- frontend/views/about.php -->

<?php
$title = 'About Page';
ob_start();
?>

<h1>About Us</h1>
<p>This is the content of the about page.</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/master.php';
?>
