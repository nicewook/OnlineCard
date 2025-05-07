<?php
// 데이터 정의 (나중에 이 부분을 동적으로 변경할 수 있습니다)
$name = "Charlie Parker";
$title = "Jazz Musician";
$description = "찰리 파커는 재즈 역사상 가장 영향력 있는 음악가 중 하나로, 비밥 재즈의 선두주자로 알려져 있습니다.";
$profileImageUrl = "profile.jpg"; // 프로필 이미지 경로

$socialLinks = [
    ["name" => "Kakao", "url" => "#", "icon" => "fas fa-comment"], // Font Awesome 아이콘 클래스로 변경
    ["name" => "LinkedIn", "url" => "#", "icon" => "fab fa-linkedin-in"],
    ["name" => "Facebook", "url" => "#", "icon" => "fab fa-facebook-f"],
    ["name" => "Instagram", "url" => "#", "icon" => "fab fa-instagram"],
    ["name" => "X", "url" => "#", "icon" => "fab fa-x-twitter"], // 최신 X 로고로 변경
];

// 찰리 파커의 대표곡 유튜브 동영상으로 변경
$videos = [
    [
        "title" => "Charlie Parker - Now's The Time",
        "embed_id" => "ryNtmkfeJk4",
        "description" => "Charlie Parker의 대표곡 중 하나인 'Now's The Time'. 비밥 재즈의 중요한 작품으로 꼽힙니다."
    ],
    [
        "title" => "Charlie Parker - All The Things You Are",
        "embed_id" => "UTORd2Y_X6U",
        "description" => "Charlie Parker가 연주한 재즈 스탠더드 'All The Things You Are'. 그의 뛰어난 즉흥 연주를 들을 수 있습니다."
    ],
    [
        "title" => "Charlie Parker - Ornithology",
        "embed_id" => "Z2tvlp7RnlM",
        "description" => "파커의 대표작 'Ornithology'. 그의 별명인 'Bird'에서 영감을 받은 곡으로 비밥 재즈의 정수를 보여줍니다."
    ]
];

$books = [
    // 책 정보 추가 (예시)
    // ["cover" => "book1_cover.jpg", "title" => "나의 첫 프롬프트 엔지니어링 책", "url" => "#"]
];

?>
<!DOCTYPE html>
<html lang="ko" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> - 온라인 명함</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Tailwind 다크 모드 설정
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <!-- Font Awesome CDN 추가 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* 커스텀 스타일이 필요하면 여기에 추가 */
        .dark body {
            background-color: #2D3748; /* 다크 모드 배경색 */
        }
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
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
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white font-sans transition-colors duration-300">
    <div class="container mx-auto p-4 md:p-8 max-w-4xl">
        <!-- Header -->
        <header class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <div class="bg-blue-500 rounded-full w-10 h-10 flex items-center justify-center text-white font-bold mr-3">Ossw1</div>
                <h1 class="text-2xl font-semibold"><?php echo htmlspecialchars($name); ?></h1>
            </div>
            <nav class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">Kakao Talk</a>
                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">Jazz Lounge</a>
                <button id="theme-toggle" class="p-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
            </nav>
        </header>

        <!-- Profile Section -->
        <section class="bg-gray-100 dark:bg-gray-800 p-8 rounded-lg shadow-lg text-center md:text-left md:flex md:items-center">
            <img src="<?php echo htmlspecialchars($profileImageUrl); ?>" alt="<?php echo htmlspecialchars($name); ?>" class="w-40 h-40 md:w-48 md:h-48 rounded-full mx-auto md:mx-0 md:mr-8 border-4 border-white dark:border-gray-700">
            <div>
                <h2 class="text-blue-600 dark:text-blue-400 text-xl md:text-2xl font-semibold"><?php echo htmlspecialchars($title); ?></h2>
                <h1 class="text-3xl md:text-5xl font-bold my-2 text-gray-800 dark:text-white"><?php echo htmlspecialchars($name); ?></h1>
                <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base mb-4">Charlie Parker</p>
                <p class="text-gray-700 dark:text-gray-300 mb-6"><?php echo htmlspecialchars($description); ?></p>
                <div class="flex justify-center md:justify-start space-x-3 social-icon">
                    <?php foreach ($socialLinks as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" title="<?php echo htmlspecialchars($link['name']); ?>" target="_blank" class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-white rounded-full text-sm">
                            <i class="<?php echo htmlspecialchars($link['icon']); ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Videos Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Charlie Parker's Music</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($videos as $video): ?>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4">
                        <h3 class="font-semibold text-md mb-2 text-gray-800 dark:text-white truncate" title="<?php echo htmlspecialchars($video['title']); ?>"><?php echo htmlspecialchars($video['title']); ?></h3>
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe 
                                class="w-full h-full rounded-md"
                                src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['embed_id']); ?>" 
                                title="<?php echo htmlspecialchars($video['title']); ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-xs mt-2 truncate" title="<?php echo htmlspecialchars($video['description']); ?>"><?php echo htmlspecialchars($video['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Books Section -->
        <?php if (!empty($books)): ?>
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Books</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($books as $book): ?>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                     <a href="<?php echo htmlspecialchars($book['url']); ?>" target="_blank">
                        <img src="<?php echo htmlspecialchars($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-md mb-1 truncate text-gray-800 dark:text-white"><?php echo htmlspecialchars($book['title']); ?></h3>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php else: ?>
        <section class="mt-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Books</h2>
            <p class="text-gray-500 dark:text-gray-400">아직 출간된 책 정보가 없습니다.</p>
        </section>
        <?php endif; ?>

        <!-- Footer -->
        <footer class="text-center text-gray-500 dark:text-gray-400 py-12 mt-8">
            <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($name); ?>. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // 테마 토글 기능
        document.addEventListener('DOMContentLoaded', function() {
            // 로컬 스토리지에서 테마 설정 불러오기
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            
            // 초기 테마 설정
            if (!isDarkMode) {
                document.documentElement.classList.remove('dark');
            }
            
            // 테마 전환 버튼 이벤트 리스너
            const themeToggle = document.getElementById('theme-toggle');
            themeToggle.addEventListener('click', function() {
                const html = document.documentElement;
                const isDark = html.classList.contains('dark');
                
                if (isDark) {
                    html.classList.remove('dark');
                    localStorage.setItem('darkMode', 'false');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('darkMode', 'true');
                }
            });
        });
    </script>
</body>
</html> 