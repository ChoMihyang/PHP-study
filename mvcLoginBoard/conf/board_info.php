<?php
class boardInfo
{
    const TABLE_NAME = "mybulletin";
    const URL = "http://localhost";
    const PATH = "/htdocs/PHP/mvcLoginBoard/";
    const INDEX = "index.php";

    const FILETO_WRITE = "write";
    const FILETO_LIST = self::PATH;
    const FWILETO_VIEW = "viewBoard";
    const FILETO_MODIFY = "modify";
    const FILETO_LOGIN_PROCESS = self::INDEX."/login_process";
    const FILETO_WRITE_PROCESS = "write_process";
    const FILETO_MODIFY_PROCESS = "modify_process";
    const FILETO_DELETE_PROCESS = "delete_process";
    const FILETO_COMMENT_WRITE_PROCESS = self::INDEX."/comment_write";
//    const FILETO_DELETE = "delete.php";
}
?>

