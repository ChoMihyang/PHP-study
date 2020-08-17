<?php
require_once "./model/Model.php";
require_once "./conf/db_info.php";
require_once "./conf/board_info.php";
require_once "./model/util.php";

class Controller
{
    public $model, $pathInfo;

    public function __construct()
    {
        $this->model = new model();
    }

    // http 요청 시 index.php 에서 실행되는 메서드
    public function invoke()
    {
        $pathInfo = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        // 작성, 수정, 삭제 구분 (router 기능)
        if (empty($pathInfo[4])) {
            $boardList = $this->model->getBoardsList();
            include "./view/list.php";
        } else {
            switch ($pathInfo[4]) {
                case "login_process":
                    $this->model->loginProcess();
                    break;
                case "write":
                    include "./view/write.php";
                    break;
                case "write_process":
                    // TODO 유효성 검사 실시 코드 작성
                    $this->model
                        ->writeBoard($_POST['name'], $_POST['title'], $_POST['content']);
                    break;
                case "viewBoard?board_id={$_GET['board_id']}":
                    $this->model->viewBoard($_GET['board_id']);
                    include "./view/viewBoard.php";
                    break;
                case "modify?board_id={$_GET['board_id']}":
                    include "./view/modify.php";
                    break;
                case "modify_process?board_id={$_GET['board_id']}":
                    $this->model->modifyBoard($_GET['board_id'], $_POST['title'], $_POST['content']);
                    break;
                case "delete_process?board_id={$_GET['board_id']}";
                    $this->model->deleteBoard($_GET['board_id']);
                    break;
                default:
                    echo "잘못된 접근입니다.";
                // TODO 목록 페이지 이동
            }
        }
    }
}

?>