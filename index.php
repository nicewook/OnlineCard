<?php
// 데이터 정의 (나중에 이 부분을 동적으로 변경할 수 있습니다)
$name = "Suh Seungwan";
$title = "Prompt Engineer";
$description = "유메타(주) 대표이사 · 세종사이버대학교 인공지능학과 겸임교수";
$profileImageUrl = "profile.jpg"; // 프로필 이미지 경로

$socialLinks = [
    ["name" => "Kakao", "url" => "#", "icon" => "fas fa-comment"], // Font Awesome 아이콘 클래스로 변경
    ["name" => "LinkedIn", "url" => "#", "icon" => "fab fa-linkedin-in"],
    ["name" => "Facebook", "url" => "#", "icon" => "fab fa-facebook-f"],
    ["name" => "Instagram", "url" => "#", "icon" => "fab fa-instagram"],
    ["name" => "X", "url" => "#", "icon" => "fab fa-twitter"], // 또는 fab fa-x-twitter 최신 X 로고
];

$videos = [
    [
        "thumbnail" => "video1_thumbnail.jpg", // 비디오 썸네일 이미지 경로
        "title" => "나만의 GPTs를 완성하는 프롬프트엔지니어링 기법",
        "source" => "클래스101 프롬프트 강의 (2024.2)",
        "url" => "#"
    ],
    [
        "thumbnail" => "video2_thumbnail.jpg",
        "title" => "MBC 다큐멘터리 - 프롬프...",
        "source" => "MBC 다큐멘터리 출연분 (2023.10)",
        "url" => "#"
    ],
    [
        "thumbnail" => "video3_thumbnail.jpg",
        "title" => "챗GPT가 쏘아올린 AI시대 직업, 억대 연봉이라고???",
        "source" => "온토리TV 출연분 (2023.7)",
        "url" => "#"
    ]
];

$books = [
    // 책 정보 추가 (예시)
    // ["cover" => "book1_cover.jpg", "title" => "나의 첫 프롬프트 엔지니어링 책", "url" => "#"]
];

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> - 온라인 명함</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN 추가 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* 커스텀 스타일이 필요하면 여기에 추가 */
        body {
            background-color: #2D3748; /* 다크 모드 배경색 예시 */
        }
        .social-icon a {
            width: 40px; /* 아이콘 버튼 크기 조절 */
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem; /* 아이콘 크기 조절 */
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="container mx-auto p-4 md:p-8 max-w-4xl">
        <!-- Header -->
        <header class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <div class="bg-blue-500 rounded-full w-10 h-10 flex items-center justify-center text-white font-bold mr-3">Ossw1</div>
                <h1 class="text-2xl font-semibold"><?php echo htmlspecialchars($name); ?></h1>
            </div>
            <nav class="space-x-4">
                <a href="#" class="text-gray-400 hover:text-white">Kakao Talk</a>
                <a href="#" class="text-gray-400 hover:text-white">Yumeta Lab</a>
            </nav>
        </header>

        <!-- Profile Section -->
        <section class="bg-gray-800 p-8 rounded-lg shadow-lg text-center md:text-left md:flex md:items-center">
            <img src="<?php echo htmlspecialchars($profileImageUrl); ?>" alt="<?php echo htmlspecialchars($name); ?>" class="w-40 h-40 md:w-48 md:h-48 rounded-full mx-auto md:mx-0 md:mr-8 border-4 border-gray-700">
            <div>
                <h2 class="text-blue-400 text-xl md:text-2xl font-semibold"><?php echo htmlspecialchars($title); ?></h2>
                <h1 class="text-3xl md:text-5xl font-bold my-2"><?php echo htmlspecialchars($name); ?></h1>
                <p class="text-gray-400 text-sm md:text-base mb-4">서승완 · 徐承完 · ソ·スンワン</p>
                <p class="text-gray-300 mb-6"><?php echo htmlspecialchars($description); ?></p>
                <div class="flex justify-center md:justify-start space-x-3 social-icon">
                    <?php foreach ($socialLinks as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" title="<?php echo htmlspecialchars($link['name']); ?>" target="_blank" class="bg-gray-700 hover:bg-gray-600 text-white rounded-full text-sm">
                            <i class="<?php echo htmlspecialchars($link['icon']); ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Videos Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($videos as $video): ?>
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <a href="<?php echo htmlspecialchars($video['url']); ?>" target="_blank">
                        <img src="<?php echo htmlspecialchars($video['thumbnail']); ?>" alt="<?php echo htmlspecialchars($video['title']); ?>" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1 truncate" title="<?php echo htmlspecialchars($video['title']); ?>"><?php echo htmlspecialchars($video['title']); ?></h3>
                            <p class="text-gray-400 text-sm"><?php echo htmlspecialchars($video['source']); ?></p>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Books Section -->
        <?php if (!empty($books)): ?>
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Books</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($books as $book): ?>
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                     <a href="<?php echo htmlspecialchars($book['url']); ?>" target="_blank">
                        <img src="<?php echo htmlspecialchars($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-md mb-1 truncate"><?php echo htmlspecialchars($book['title']); ?></h3>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php else: ?>
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6">Books</h2>
            <p class="text-gray-500">아직 출간된 책 정보가 없습니다.</p>
        </section>
        <?php endif; ?>

        <!-- Footer -->
        <footer class="text-center text-gray-500 py-12 mt-8">
            <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($name); ?>. All rights reserved.</p>
        </footer>
    </div>
</body>
</html> 