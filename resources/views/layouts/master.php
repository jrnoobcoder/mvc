<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Default Title' ?></title>
    <link rel="stylesheet" href="/path/to/your/css">
</head>
<body>
    <header>
        <?php include __DIR__ . '/../partials/header.php'; ?>
		<?php //echo route('notFound'); ?>
    </header>
	
    <main>
        <?= $content ?? '' ?>
    </main>

    <footer>
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </footer>
    
    <script src="/path/to/your/js"></script>
</body>
</html>
