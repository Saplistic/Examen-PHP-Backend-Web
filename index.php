<?php

session_start();

// Vanaf nu zit de inhoud van het bestand "posts.data" in de variabele "raw_posts"
$raw_posts = file_get_contents('./posts.data');

//create an empty array of posts if it doesn't exist yet
if(!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = array();
}
require_once('objects/post.php');

//unserialize the posts into an array with usable objects
$posts = array();
foreach($_SESSION['posts'] as $post) {
    $posts[] = unserialize($post);
}
//omkeren van array
$posts = array_reverse($posts);

?><!doctype html>
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
                <a class="nav-linkx" href="post.php">New Post</a>
            </li>
        </ul>
    </div>
</nav>


<main role="main" class="container" id="mainContent">
    <div class="jumbotron">
        <?php 
        foreach($posts as $post) {
            echo "
            <div class='row' style='border-bottom: 1px solid black;'>
            <div class='col-9'>
              <h2>" . $post->getTitle() ."</h2>
              <p>" . $post->getBody() . "</p>
            </div>
  
            <div class='col-3'>
              <small>Gepost op " . date('d/m/Y h:i:s', $post->getDate()) . " door " . $post->getAuthor() . "</small>
            </div>
          </div>";

        }
        
        ?>
    </div>
</main>


</body>
</html>
