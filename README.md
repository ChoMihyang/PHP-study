# PHP study
2020년 여름방학 php 특강

### 2020-08-03(월)

##### MVC pattern Example

- MVC란?
    - Model / View / Controller
    - 소프트웨어 구조 설계 방식 중 하나
    - 비즈니스로직과 프레젠테이션 로직을 분리
    - 3개의 객체를 통해서 기능을 분리 / 구현
    
- Model 
    - 프로그램에서 사용되는 데이터 관리
    - 데이터베이스 접근 및 핸들링을 위한 CRUD작업
    
- View
    - 프로그램의 실행 결과를 보여주는 역할 수행
    - 사용자 인터페이스
    
- Controller
    - 모델 영역과 뷰 영역 사이에서 흐름제어 역할 수행
    - 실질적인 프로그래밍 로직 및 이벤트 처리
    - 사용자가 Request 할 수 있는 접근 경로
    
### 2020-08-05(수)
bulletin board : Login Module Update
    
- 공통 사용 권한
    - 글 보기 
    - 글 검색
    
- 로그인 사용자의 사용 권한
    - 글 작성
    - (본인 작성)글 수정
    - (본인 작성)글 삭제
    - 댓글 작성
    - (본인 작성)댓글 삭제
    
- 추가 파일
```bash
    - login_process.php
```
- style 태그 제거 후 CSS 파일로 이동