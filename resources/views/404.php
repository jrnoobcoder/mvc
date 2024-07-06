<!-- resources/views/about.php -->

<?php
$title = '404 Page Not Found';
ob_start();
?>

<h1>404 Page Not Found</h1>


<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/master.php';
?>
