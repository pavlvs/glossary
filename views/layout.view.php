<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title><?php echo $viewBag['title']; ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">PHP Fundamentals:                                                               <?php echo $viewBag['title']; ?></a>
        </div>
    </nav>

    <?php require "$name.view.php"?>
</body>

</html>