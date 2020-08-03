<?php
include_once "model/Model.php";

class Controller
{
    // Model 객체 관리
    public $model;

    public function __construct(){
        // Model 객체 로드
        $this->model = new Model();
    }
    // http request 요청 시 실행
    public function invoke(){
        // 전체 도서 목록 출력
        if(!isset($_GET['book'])){
            $books = $this->model->getBookList();
            include "view/booklist.php";
        }
        // 특정 도서에 대한 정보 출력
        else{
            $book = $this->model->getBook($_GET['book']);
            include "view/viewbook.php";
        }
    }
}
?>