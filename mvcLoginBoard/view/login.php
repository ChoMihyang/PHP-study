<?php
//로그아웃 처리
// 로그아웃 버튼 클릭 시 $_POST['logout'] -> true 전환
// 로그인 상태 true -> 세션 파괴 조건 포함
if(isset($_POST['logout']) && $_POST['logout']){
    if(isset($_SESSION['login']) && $_SESSION['login']){
        $_SESSION = array();
        session_destroy();
        echo "<script>alert('로그아웃 되었습니다.');</script>";
    }
}
?>

    <!--로그인 폼 & 회원정보 표시-->
<?php if(!$_SESSION['login']):?>
    <form action="<?php echo boardInfo::FILETO_LOGIN_PROCESS?>" method="post" autocomplete="off">
        <div id="loginBox">
            <div><h1>로그인</h1></div>
            <div id="inputInfo">
                <div class="row">
                    <div class="head">ID</div>
                    <div><input type="text" name="id"></div>
                </div>
                <div class="row">
                    <div class="head">PASSWORD</div>
                    <div><input type="password" name="password"></div>
                </div>
            </div>
            <div id="loginBtn"><input type="submit" id="login" value="로그인하기"></div>
        </div>
    </form>
<?php else:?>
    <form action=" <?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div id="loginBox">
            <div><h1>회원 정보</h1></div>
            <div id="userInfo">
                <h2>&nbsp;안녕하세요.<br>&nbsp;<?= $_SESSION['userName']." 님, 환영합니다!"; ?></h2>
            </div>
            <input type="hidden" name="logout" value="true">
            <div id="logoutBtn"><input id="logout" type="submit" value="로그아웃"></div>
        </div>
    </form>
<?php endif;?>