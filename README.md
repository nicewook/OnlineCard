# Charlie Parker - 온라인 명함 (PHP & Tailwind CSS)

이 프로젝트는 PHP와 Tailwind CSS를 사용하여 찰리 파커 테마의 온라인 명함을 구현한 것입니다.

## 주요 기능

-   프로필 정보 (이름, 직함, 설명, 소셜 링크)
-   찰리 파커 음악 감상 (유튜브 임베드)
-   가상 서적 목록 (Picsum 이미지 활용)
-   찰리 파커 테마의 가상 경력 및 학력 정보
-   찰리 파커 주요 공연 정보 (프로젝트)
-   다크 모드 / 라이트 모드 전환 (로컬 스토리지 저장)
-   반응형 디자인

## 기술 스택

-   PHP
-   Tailwind CSS (CDN)
-   Font Awesome (CDN)

## 시작하기

### 1. PHP 설치

이 프로젝트를 실행하려면 시스템에 PHP가 설치되어 있어야 합니다.

-   **macOS (Homebrew 사용)**:
    ```bash
    brew install php
    ```
-   **Linux (Debian/Ubuntu 기반)**:
    ```bash
    sudo apt update
    sudo apt install php
    ```
-   **Linux (Fedora/CentOS 기반)**:
    ```bash
    sudo dnf install php
    ```
-   **Windows**:
    -   [XAMPP](https://www.apachefriends.org/index.html) 또는 [WampServer](https://www.wampserver.com/en/)와 같은 통합 패키지를 설치하거나, [PHP 공식 웹사이트](https://www.php.net/downloads)에서 직접 다운로드하여 설치할 수 있습니다.

설치 후 터미널 또는 명령 프롬프트에서 다음 명령어로 PHP 버전을 확인하여 설치를 검증합니다:
```bash
php -v
```

### 2. 프로젝트 설정 및 실행

1.  **프로젝트 클론 또는 다운로드**: 이 저장소를 로컬 환경으로 가져옵니다.
    ```bash
    git clone https://github.com/your-username/OnlineCard.git # 실제 저장소 주소로 변경해주세요
    cd OnlineCard
    ```
    (또는 ZIP 파일 다운로드 후 압축 해제)

2.  **PHP 내장 웹 서버 실행**: 프로젝트의 루트 디렉토리에서 다음 명령어를 실행하여 PHP 내장 웹 서버를 시작합니다.
    ```bash
    php -S localhost:8000
    ```
    (다른 포트 번호를 사용해도 됩니다. 예: `php -S localhost:3000`)

3.  **웹 브라우저에서 확인**: 웹 브라우저를 열고 주소창에 다음을 입력합니다:
    ```
    http://localhost:8000
    ```
    (서버 실행 시 지정한 포트 번호 사용)

## 서버 중지

PHP 내장 웹 서버를 중지하려면 서버가 실행 중인 터미널 창에서 `Ctrl + C`를 누릅니다.

## 참고

-   본 프로젝트의 책 이미지 및 공연 이미지는 [Picsum Photos](https://picsum.photos/)에서 가져온 랜덤 이미지입니다.
-   경력, 학력, 공연 정보는 찰리 파커의 실제 정보와 가상의 내용을 조합하여 재미있게 구성되었습니다.
-   프로필 이미지는 `profile.jpg`로 저장되어 있으며, 원하는 이미지로 교체할 수 있습니다. 