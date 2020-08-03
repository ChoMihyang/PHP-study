<?php
include_once "model/Book.php";

class Model
{
    // 재고 도서 목록 저장
    private $books;

    public function __construct()
    {
        $this->books = array(
            "Chori JJang"     => new Book("Chori JJang", "YC Jung", "Chori's life I"),
            "Younghan JJang"  => new Book("Younghan JJang", "YH Woo", "Younghan's life I"),
            "Dalwoong"        => new Book("Dalwoong", "DW Yun", "Soju hanjan ha ka?")
        );
    }

// 도서 목록 반환
    public function getBookList()
    {
        return $this->books;
    }
    // 지정 도서 반환
    public function getBook($argTitle){
        return $this->books[$argTitle];
    }
}
?>

