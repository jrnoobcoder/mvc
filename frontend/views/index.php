<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>Users</h1>
    <ul>

    <?php  
    	//basePath();
        //print_r($data);
        print_r($users);
    ?>
        <?php foreach ($users as $user): ?>
            <?php print_r($user->id); ?>
            <br>
        <?php endforeach; ?>
    </ul>
</body>
</html>
