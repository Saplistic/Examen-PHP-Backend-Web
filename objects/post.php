<?php

class post
{
    protected $author;
    protected $title;
    protected $body;
    protected $date;

    public function __construct($author, $title, $body)
    {
        $this->author = $author;
        $this->title = $title;
        $this->body = $body;
        $this->date = time();
    }

    // author: String met de naam van de auteur in, deze moet minstens 3 karakters lang zijn en mag enkel letters bevatten
    // title: String met de titel van de blogpost, deze moet minstens 5 karakters bevatten
    // body: String met de inhoud van de post, deze is verplicht
    // date


    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }
}
?>