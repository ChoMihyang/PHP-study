<?php
require_once "./conf/board_info.php";
?>

<form action="<?php echo boardInfo::INDEX."/".boardInfo::FILETO_LIST?>" method="post">
    <select name="searchOption" >
        <option value="title">제목</option>
        <option value="name">작성자</option>
        <option value="content">내용</option>
        <option value="titleControl">제목+내용</option>
    </select>
    <input type="text" name="keyword" size="25" autocomplete="off">
    <input type="submit" value="검색">
</form>