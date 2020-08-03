<?php
class Book{
    public $title;          // 도서명
    public $author;         // 저자
    public $description;    // 설명

    public function __construct($argTitle, $argAuthor, $argDescription)
    {
        $this->title        = $argTitle;
        $this->author       = $argAuthor;
        $this->description  = $argDescription;
    }
}
?>


