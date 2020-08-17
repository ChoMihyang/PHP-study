<?php
class DBException extends Exception{

}
class PostException extends Exception{

}
class A{
    function test(){
        try{
            // 해피 시나리오
            // 예외 발생 유무 판별식 위치
            // 예) post 값을 받는데 수신되지 않은 값이 있는지 없는지?
            // if(~) throw new Exception(); -> 예외 발생시키기
            // 처리해야할 코드들이 많아지면서 catch 문도 증가

            if(true) throw new PostException();
            echo "1";
        }catch(DBException $e){
            //타입 힌팅 -> 어떤 예외 객체에 해당하는지 정확하지 않기 때문
            // 현 예외가 발생했을 때 처리해야 할 구문
            // DB예외일 경우 에러 메시지 출력 후 번역 중지
        }catch(PostException $e){
            // Post예외일 경우 경고 메시지 출력 후, 이전페이지로 복귀
            echo "2";
            throw $e; // try 문 밖으로 예외가 던져짐
            echo "2.5";
        }finally{
            echo "3";
        }
        echo "4";
    }
}

try {
    $obj = new A();
    $obj->test();
}catch (Exception $e){
    echo "마지막";
}
?>