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


### 2020-08-08(토) 

##### 로그인 모듈 업데이트

- list.php 내 로그인, 로그아웃 기능 구현

- 로그인 시 login_process.php 이동
    - session_start();

- 미 로그인 사용자와 로그인 사용자 기능 구분
    - 글쓰기 / 댓글 달기

- 본인 작성 글 기능 구분
    - 글 수정 / 글 삭제 / 댓글 삭제
    
### 2020-08-09(일)
##### OOP study

- OOP 구성요소
    - 클래스(Class)와 객체(Object)
    - 상속
    - 접근 제어자
    - 다형성
    - 추상클래스
    - 인터페이스
    - 예외처리
    
- 클래스의 구성요소
    - 생성자
    - 속성(Property, 멤버 변수)
    - 메서드
    - 소멸자
- 클래스 선언과 내부 구성
    ```bash
      class BaseClass{
       
          // constructor
          function __construct(){
              // invoked constructor of BaseClass     
          }  

          //property
          private [static] $name;
  
          // method
          function [static] prtName(){}        
        
          //destructor 
          function __destruct(){
              // invoked destructor of BaseClass 
          }
      }  
    ```    
- 객체 생성 
    ```bash
      $obj1 = new BaseClass();  
    ```
  
- 생성자
    - 상속 시 부모 클래스의 생성자는 자동으로 호출되지 않는다.
    - 클래스 내 생성자가 없을 경우, 이전 버전과의 호환성을 해결하기 위해
      클래스 이름과 동일한 메서드를 정의하고 이를 생성자로 실행한다.
    - 자손 클래스 내 생성자가 없을 경우, 부모 클래스의 생성자를 호출한다.
    - 부모 클래스의 생성자 호출 시 parent::__construct() 사용
    
- 소멸자
    - 클래스가 소멸될 경우 실행된다.
    - 객체의 참조변수가 없을 경우 Garbage Collector에 의해 객체는 메모리상에서 제거된다.
    
- 속성(Property, 멤버변수)
    - 인스턴스 멤버변수와 클래스 멤버변수로 구분
    - 인스턴스 멤버 변수 선언 시 접근 제어자 필요
    - 인스턴스 속성 접근 시 '->' 연산자 사용
    - 클래스 속성 접근 시 '::' 연산자 사용
- $this
    - 현재 클래스에 대한 객체의 주소
    - 객체 내 메서드에서 멤버에 접근 시 사용
    - 인스턴스 멤버 접근 시
    ```bash
    $this->변수명; - $변수명(X)
    $this->메서드명();
    ```
- 상수
    - 클래스 내 'const' 키워드 사용
    - 객체 생성 없이 클래스 이름을 이용하여 접근 가능
    - 클래스 내 메서드에서 접근 시 $this 사용 불가 -> 'self::' 키워드 사용

- 메서드
    - 접근제어자 반드시 필요X, 사용하지 않을 시 디폴트 값으로 public 사용
    - 클래스 메서드와 인스턴스 메서드로 구분
    - 오버로딩 지원X

- 인스턴스 멤버 VS 클래스 멤버
    - 인스턴스 멤버
        - 각 인스턴스의 개별적인 저장 공간을 가짐
        - 인스턴스 생성 후, '$this->변수명 or 메서드명'으로 접근
        - 인스턴스를 생성할 때 만들어지며, 참조변수가 없을 때 가비지 컬렉터에 의해
        자동 소멸
    - 클래스 멤버
        - 같은 클래스 내에서 모든 인스턴스들이 공유하는 변수
        - static 키워드 사용하여 정의
        - 인스턴스 생성 없이 '클래스명::$변수명 or 메서드명'으로 접근
        - 클래스가 로딩될 때 생성되며, 프로그램이 종료될 때 소멸

    
