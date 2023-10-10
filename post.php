<?php 

session_start();
if(!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = array();
}

//array met autofill waarden te maken als er bestaan
if(!empty($_SESSION['validationFill'])) {
    $autoFill = $_SESSION['validationFill'];
}?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Blog</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Simple Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="post.php">New Post</a>
            </li>
        </ul>
    </div>
</nav>


<main role="main" class="container" id="mainContent">
    <div class="jumbotron">

        <div class="row">
            <div class="col-12">
                <?php if(isset($_SESSION['validationErrors'])) {
                    foreach($_SESSION['validationErrors'] as $error) {
                        echo "
                        <div id='formError' class='alert alert-danger' role='alert' >
                        $error
                        </div>";
                    }
                    $_SESSION['validationErrors'] = array();
                }?>

                <p class="lead">Post toevoegen</p>
                <form action="process.php" method="POST">

                    <label for="title">Titel</label><br>
                    <input type="text" name="title" value="<?php echo isset($autoFill['title']) ? $autoFill['title'] : 'no filled' ?>"><hr>

                    <label for="title">Gebruiker</label><br>
                    <input type="text" name="author" value="<?php echo (isset($_COOKIE['username']) ? $_COOKIE['username'] : '') ?>"><hr>

                    <label for="title">Content</label><br>
                    <textarea name="body" style="width: 600px; height: 200px;"><?php echo isset($autoFill['body']) ? $autoFill['body'] : 'no field2' ?></textarea><hr>

                    <input type="submit" class="btn btn-success" name="createPost" value="Voeg toe">
                </form>
            </div>

        </div>
    </div>
</main>

</body>
</html>
