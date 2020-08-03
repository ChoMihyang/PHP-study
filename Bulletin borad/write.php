<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>글쓰기</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        * {
            margin: 0 auto;
            padding: 0;
        }

        body {
            background-color: #dbe9b7;
        }

        h1 {
            border-bottom: 1px solid #ababab;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        #writeBox {
            width: 600px;
            height: 630px;
            margin-top: 80px;
            padding: 20px;
            background-color: #fdfdf6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            font-family: 'Jua', sans-serif;
        }

        .row {
            padding: 10px 0;
        }

        .head {
            color: #838383;
            padding: 2px;
        }

        .input {
            vertical-align: middle;
        }
        input[type=text],
        input[type=password],
        textarea{
            border-radius: 4px;
            border: 1px solid #ababab;
            font-size: 18px;
            font-family: 'Jua', sans-serif;
        }
        .input input[id=inputUser],
        .input input[id=inputPw] {
            width: 90%;
            height: 30px;
        }
        .input input[id=inputTitle]{
            width: 100%;
            height: 30px;
        }
        textarea{
            resize:none;
        }
        #ctrl{
            text-align: center;
            margin-top: 7px;
        }
        .button{
            color: black;
            border-radius: 3px;
            display: inline-block;
            padding: 1px 8px 3px;
            margin: 0 4px;
            vertical-align: middle;
            cursor: pointer;
            font-size: 18px;
            font-family: 'Jua', sans-serif;
        }
        .white {
            border: 1px solid #b8b2a6;
            background-color: white;
        }
        .white:hover{
            background-color: #e8e4e1;
        }
        .brown{
            border: 1px solid #b8b2a6;
            background-color: #b8b2a6;
        }
        .brown:hover{
            background-color: #b9ac92;
        }
    </style>
</head>
<body>
<div id="writeBox">
    <div id="write"><h1>글 작성하기</h1></div>
    <form action="write_process.php" method="post" autocomplete="off">
    <div class="row">
        <div class="head">작성자</div>
        <div class="input"><input type="text" id="inputUser" name="name"></div>
    </div>
    <div class="row">
        <div class="head">비밀번호</div>
        <div class="input"><input type="password" id="inputPw" name="password"></div>
    </div>
    <div class="row">
        <div class="head">제목</div>
        <div class="input"><input type="text" id="inputTitle" name="title"></div>
    </div>
    <div class="row">
        <div class="head">내용</div>
        <div class="input"><textarea name="content" id="inputContent" cols="63" rows="10"></textarea></div>
    </div>
        <div id="ctrl">
            <input class="button brown" type="submit" value="작성하기">
            <button class="button white" onclick="location.href='list.php'">목록보기</button>
        </div>
    </form>
</div>
</body>
</html>