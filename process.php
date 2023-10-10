<?php 

session_start();

if (isset($_POST['createPost']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    echo "validating...";
    $validationErrors = array();

    //validatie titel
    if(!isset($_POST['title']) || strlen($_POST['title']) < 5) {
        $validationErrors['title'] = " <strong>Titel</strong> is verplicht en moet minstens 5 karakters lang zijn!";
    }
    //validatie auteur
    if(!isset($_POST['author']) || strlen($_POST['author']) < 3 || !ctype_alpha($_POST['author'])) {
        $validationErrors['author'] = "<strong>Autheur</strong> is verplicht, moet minstens 3 karakters lang zijn en mag enkel letters bevatten!";
    } else {
        //*gebruikersnaam opslaan als cookie als validatie geslaagd werd
        setcookie('username', ($_POST['author']), time() + (60*60*24 * 7));
    }
    //validatie inhoud
    if(empty($_POST['body'])) {
        $validationErrors['body'] = "<strong>Inhoud</strong> is verplicht.";
    }



    if(!empty($validationErrors)){

        echo "validatie mislukt...";

        $validationFill = array();

        $validationFill['title'] = $_POST['title'];
        $validationFill['body'] = $_POST['body'];
        
        $_SESSION['validationErrors'] = $validationErrors;
        $_SESSION['validationFill'] = $validationFill;
        header("Location: post.php");
        exit();
    }

    //indien validatie slaagt

    include_once('objects/post.php');
    $post = new post($_POST['author'], $_POST['title'], $_POST['body']);
    $serializedPost = serialize($post);
    array_push($_SESSION['posts'], $serializedPost);
    
    header("Location: index.php");

} else {
    echo "no form submitted";
    header("Location: index.php");

}

?>