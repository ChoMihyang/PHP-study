<?php
require_once ('./controller/Controller.php');
require_once ('./conf/db_info.php');
require_once('util.php');
require_once ('./conf/board_info.php');

class Model
{
    public $boardList;

    // 로그인 실행 처리
    public function loginProcess(){
        $conn = dbConnect();
        $mysql = "SELECT * FROM user_info WHERE id = '{$_POST['id']}' AND password = '{$_POST['password']}'";
        $result = $conn->query($mysql);
        $row = $result->fetch_assoc();
        if(!$row){
            echo "<script>alert('아이디와 비밀번호를 재확인 바랍니다.');history.back();</script>";
        }else{
            // 로그인 정보 확인 완료 시 세션 시작하기
            session_start();

            $_SESSION['login']    = true;
            $_SESSION['userId']   = $row['id'];
            $_SESSION['userName'] = $row['name'];

            echo "<script>alert('로그인이 완료되었습니다.');</script>";
            moveListPage();
        }
    }
    // 게시글 목록 불러오기
    public function getBoardsList(): array
    {
        $conn = dbConnect();
        $mysql = "SELECT * FROM mybulletin WHERE board_pid = 0 ORDER BY board_id DESC";
        if ($result = $conn->query($mysql)) {
            while ($row = $result->fetch_assoc()) {
                // 배열의 값을 확인할 때는 var_dump 사용 but, 어렵게 나옴
                // -> <pre></pre>를 사용하면 좀 더 가독성 있음
                $this->boardList[] = $row;
            }
        } else {
            echo "조회 실패";
        }
        return $this->boardList;
    }

    // 게시글을 작성 처리 함수
    public function writeBoard(
        string $name,
        string $title,
        string $content

    )
    {
        // 무결성 검사 및 html 태그 제거하기
        $fieldSet = dataCheck("POST", array('title', 'content', 'name'), true);
        // DB 삽입 쿼리문 작성 및 SQL 연결 성공 여부 검사
        if($fieldSet) {
            $mysql = "INSERT INTO mybulletin VALUES(0, 0, '{$name}', '', '{$title}', '{$content}', 0, now())";
            if (connCheck($mysql)){
                echo "<script>alert('글 작성이 완료되었습니다.');</script>";
                moveListPage();
            }
        }else{
            // 에러 메시지 출력 후 재입력
            prtError("dataError");
        }
    }


    // 게시글을 보는 함수
    public function viewBoard(int $boardId)
    {
        // 조회수 증가
        updateHits($boardId);

        // 게시물의 번호값으로 해당 게시물 정보 조회
        $row = dbSelect($boardId);
        return $row;
    }

// 게시글을 수정하는 함수
    public function modifyBoard(
        int $board_id,
        String $title,
        String $content
    )
    {
        $fieldSet = dataCheck("POST", array('title', 'content'), true);
        if ($fieldSet) {
            $mysql = "UPDATE mybulletin SET title = '{$title}', content = '{$content}' WHERE board_id = {$board_id}";
            if (connCheck($mysql)) {
                echo "<script>alert('글 수정이 완료되었습니다.');</script>";
                moveListPage();
            }
        }else{
            prtError("dataError");
        }
    }


// 게시글을 삭제하는 함수
    public function deleteBoard(int $board_id)
    {
        $conn = dbConnect();
        $mysql = "DELETE FROM mybulletin WHERE board_id = $board_id";
        if(connCheck($mysql)){
            // 목록 페이지 이동
            echo "<script>alert('삭제가 완료되었습니다.');</script>";
            moveListPage();
        }
    }
}

?>