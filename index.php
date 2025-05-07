<?php
// 메일 발송 처리 로직 추가
$mailSent = false;
$mailError = false;
$formSubmitted = false; // 폼 제출 여부 확인 변수

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmitted = true; // 폼이 제출되었음을 표시
    // 폼 데이터 가져오기 및 간단한 유효성 검사
    $form_name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING); // 변수명 변경 (전역 $name과 충돌 방지)
    $form_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $form_message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    if (!empty($form_name) && !empty($form_email) && filter_var($form_email, FILTER_VALIDATE_EMAIL) && !empty($form_message)) {
        $to = "kiwook.jeong+test@gmail.com"; // 요청하신 수신자 이메일
        $subject = "온라인 명함에서 온 메시지: " . $form_name;
        $body = "이름: " . $form_name . "\n";
        $body .= "이메일: " . $form_email . "\n\n";
        $body .= "메시지:\n" . $form_message;

        $headers = "From: webmaster@example.com\r\n"; // 실제 발신자 주소 또는 서버 기본값 사용 고려
        $headers .= "Reply-To: " . $form_email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            $mailSent = true;
        } else {
            $mailError = true;
        }
    } else {
        $mailError = true; // 유효하지 않은 입력
    }
}

// 데이터 정의
$pageOwnerName = "Charlie Parker"; // 페이지 소유자 이름 변수명 변경 (기존 $name)
$title = "Jazz Musician";
$description = "찰리 파커는 재즈 역사상 가장 영향력 있는 음악가 중 하나로, 비밥 재즈의 선두주자로 알려져 있습니다.";
$profileImageUrl = "profile.jpg";

$socialLinks = [
    ["name" => "Kakao", "url" => "#", "icon" => "fas fa-comment"],
    ["name" => "LinkedIn", "url" => "#", "icon" => "fab fa-linkedin-in"],
    ["name" => "Facebook", "url" => "#", "icon" => "fab fa-facebook-f"],
    ["name" => "Instagram", "url" => "#", "icon" => "fab fa-instagram"],
    ["name" => "X", "url" => "#", "icon" => "fab fa-x-twitter"], 
];

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
    ["cover_image" => "https://picsum.photos/seed/book1/200/300", "title" => "The Bebop Bible: Scales & Licks"],
    ["cover_image" => "https://picsum.photos/seed/book2/200/300", "title" => "Bird's Cookbook: Secret Recipes for Hot Licks"],
    ["cover_image" => "https://picsum.photos/seed/book3/200/300", "title" => "Ornithology: A Study of Flight & Fancy"],
    ["cover_image" => "https://picsum.photos/seed/book4/200/300", "title" => "Now's The Time: A Memoir of Midnight Jams"],
    ["cover_image" => "https://picsum.photos/seed/book5/200/300", "title" => "Chasin' The Bird: A Life in Alto Sax"],
    ["cover_image" => "https://picsum.photos/seed/book6/200/300", "title" => "The Dial & Savoy Sessions: Uncovered", "status" => "품절임박"],
];

$performances = [
    [
        "title" => "Bird with Strings",
        "venue" => "Carnegie Hall, New York",
        "date" => "1949년 9월 17일",
        "description" => "클래식 현악기와 함께한 파커의 가장 유명한 공연 중 하나로, 재즈와 클래식의 조화를 선보였습니다.",
        "image" => "https://picsum.photos/seed/perf1/400/300",
        "tag" => "전설적 공연"
    ],
    [
        "title" => "Massey Hall Quintet",
        "venue" => "Massey Hall, Toronto",
        "date" => "1953년 5월 15일",
        "description" => "디지 길레스피, 버드 파월, 찰스 밍거스, 맥스 로치와 함께한 역사적인 재즈 공연입니다.",
        "image" => "https://picsum.photos/seed/perf2/400/300",
        "tag" => "올스타 라인업"
    ],
    [
        "title" => "Paris Jazz Festival",
        "venue" => "Salle Pleyel, Paris",
        "date" => "1949년 5월",
        "description" => "유럽 투어 중 파리에서 열린 공연으로, 유럽 관객들에게 비밥 재즈를 알리는 중요한 순간이었습니다.",
        "image" => "https://picsum.photos/seed/perf3/400/300"
    ],
    [
        "title" => "Birdland Opening Night",
        "venue" => "Birdland, New York",
        "date" => "1949년 12월 15일",
        "description" => "그의 별명을 따서 명명된 클럽의 개장 공연으로, 이후 재즈의 메카가 되었습니다.",
        "image" => "https://picsum.photos/seed/perf4/400/300",
        "tag" => "역사적 순간"
    ],
    [
        "title" => "Savoy Sessions Live",
        "venue" => "Savoy Ballroom, New York",
        "date" => "1947년",
        "description" => "Savoy 레코드 레이블과 함께한 라이브 세션으로, 당시 최고의 재즈 연주를 들을 수 있었던 공연입니다.",
        "image" => "https://picsum.photos/seed/perf5/400/300"
    ],
    [
        "title" => "52nd Street Jam Sessions",
        "venue" => "Three Deuces, New York",
        "date" => "1945년-1948년",
        "description" => "뉴욕 52번가의 재즈 클럽에서 열린 정기 잼 세션으로, 비밥 혁명의 중심지였습니다.",
        "image" => "https://picsum.photos/seed/perf6/400/300",
        "tag" => "정기 공연"
    ],
    [
        "title" => "West Coast Tour",
        "venue" => "Billy Berg's, Los Angeles",
        "date" => "1945년 12월",
        "description" => "디지 길레스피와 함께한 서부 해안 투어로, 캘리포니아에 비밥 사운드를 소개했습니다.",
        "image" => "https://picsum.photos/seed/perf7/400/300"
    ],
    [
        "title" => "Royal Roost Residency",
        "venue" => "Royal Roost, New York",
        "date" => "1948년",
        "description" => "찰리 파커가 로열 루스트에서 진행한 장기 레지던시 공연으로, 많은 레코딩이 이루어졌습니다.",
        "image" => "https://picsum.photos/seed/perf8/400/300",
        "tag" => "레코딩 라이브"
    ]
];

$careers = [
    [
        "period" => "1945 - 1955 (The Golden Age)",
        "title" => "Chief Architect of Bebop",
        "company_display" => "<i class='fas fa-music mr-2 text-blue-500'></i>The School of Swing & Improvisation",
    ],
    [
        "period" => "Late 1940s (Birdland Era)",
        "title" => "Headliner & Resident Virtuoso",
        "company_display" => "<i class='fas fa-crow mr-2 text-purple-500'></i>Birdland Jazz Club (New York)",
    ],
    [
        "period" => "Early 1940s (The Minton's Spark)",
        "title" => "Jam Session Revolutionary",
        "company_display" => "<i class='fas fa-bolt mr-2 text-yellow-500'></i>Minton's Playhouse (Harlem)",
    ],
    [
        "period" => "Throughout his career",
        "title" => "Master of the Alto Saxophone",
        "company_display" => "<i class='fas fa-drum-steelpan mr-2 text-red-500'></i>Worldwide Stages & Smoky Backrooms",
    ]
];

$education = [
    [
        "category" => "Honorary Doctorate",
        "degree" => "Doctor of Musical Arts (Honoris Causa)",
        "institution" => "University of Bebop (Posthumous)",
        "logo_icon" => "fas fa-graduation-cap text-green-500"
    ],
    [
        "category" => "Street Smarts & Night Clubs",
        "degree" => "Advanced Studies in Harmony & Rhythm",
        "institution" => "The Kansas City Scene & 52nd Street, NYC",
        "logo_icon" => "fas fa-street-view text-green-500"
    ],
    [
        "category" => "Self-Taught Genius",
        "degree" => "PhD in 'Playing What They Ain't'",
        "institution" => "The Woodshed University (Self-Directed)",
        "logo_icon" => "fas fa-book-reader text-green-500"
    ],
    [
        "category" => "Early Influences",
        "degree" => "Apprenticeship under Buster Smith & Lester Young",
        "institution" => "The Ether School of Jazz Legends",
        "logo_icon" => "fas fa-microphone-alt text-green-500"
    ]
];

?>
<!DOCTYPE html>
<html lang="ko" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageOwnerName); ?> - 온라인 명함</title>
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
                <div class="bg-blue-500 dark:bg-blue-600 rounded-full w-10 h-10 flex items-center justify-center text-white text-lg mr-3">
                    <i class="fas fa-record-vinyl"></i>
                </div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white"><?php echo htmlspecialchars($pageOwnerName); ?></h1>
            </div>
            <nav class="flex items-center space-x-4">
                <a href="#about" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-user mr-1"></i> 소개
                </a>
                <a href="#career" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-award mr-1"></i> 약력
                </a>
                <a href="#projects" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-tasks mr-1"></i> 프로젝트
                </a>
                <a href="#contact" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-envelope mr-1"></i> 연락
                </a>
                <button id="theme-toggle" class="p-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
            </nav>
        </header>

        <!-- Profile Section -->
        <section class="bg-gray-100 dark:bg-gray-800 p-8 rounded-lg shadow-lg text-center md:text-left md:flex md:items-center">
            <img src="<?php echo htmlspecialchars($profileImageUrl); ?>" alt="<?php echo htmlspecialchars($pageOwnerName); ?>" class="w-40 h-40 md:w-48 md:h-48 rounded-full mx-auto md:mx-0 md:mr-8 border-4 border-white dark:border-gray-700">
            <div>
                <h2 class="text-blue-600 dark:text-blue-400 text-xl md:text-2xl font-semibold"><?php echo htmlspecialchars($title); ?></h2>
                <h1 class="text-3xl md:text-5xl font-bold my-2 text-gray-800 dark:text-white"><?php echo htmlspecialchars($pageOwnerName); ?></h1>
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
        <section id="books" class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Books</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <?php foreach ($books as $book): ?>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="relative w-full aspect-[2/3] flex-shrink-0">
                        <img src="<?php echo htmlspecialchars($book['cover_image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/80 via-black/50 to-transparent">
                            <h4 class="text-white text-xs sm:text-sm font-semibold text-center truncate" title="<?php echo htmlspecialchars($book['title']); ?>">
                                <?php echo htmlspecialchars($book['title']); ?>
                            </h4>
                        </div>
                    </div>
                    <div class="p-3 text-center mt-auto">
                        <?php if (isset($book['status']) && $book['status'] == '품절임박'): ?>
                            <span class="text-sm font-semibold text-red-500 dark:text-red-400"><?php echo htmlspecialchars($book['status']); ?></span>
                        <?php else: ?>
                            <span class="text-sm text-gray-600 dark:text-gray-400">&nbsp;</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Careers & Education Section Wrapper -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16">
            <!-- Careers Section -->
            <section id="career">
                <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Careers</h2>
                <div class="space-y-8">
                    <?php foreach ($careers as $index => $career): ?>
                    <div class="relative pl-8">
                        <?php if ($index > 0): ?>
                            <div class="absolute left-3.5 top-4 bottom-0 w-px bg-gray-300 dark:bg-gray-600"></div>
                        <?php endif; ?>
                        <div class="absolute left-0 top-2.5">
                            <span class="block w-3 h-3 bg-blue-500 dark:bg-blue-400 rounded-full"></span>
                        </div>
                        <div class="mb-2">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-700 dark:text-blue-300 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <?php echo htmlspecialchars($career['period']); ?>
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-1"><?php echo htmlspecialchars($career['title']); ?></h3>
                        <div class="text-gray-700 dark:text-gray-300">
                            <?php if (isset($career['logo_icon'])): ?>
                                <span class="mt-1"><i class="<?php echo htmlspecialchars($career['logo_icon']); ?> mr-2"></i><?php echo htmlspecialchars($career['company'] ?? ''); ?></span>
                            <?php elseif (isset($career['logo'])): ?>
                                <img src="<?php echo htmlspecialchars($career['logo']); ?>" alt="<?php echo htmlspecialchars($career['company'] ?? ''); ?>" class="h-6 mt-1 inline-block">
                            <?php elseif (isset($career['company_display'])): ?>
                                <div class="mt-1"><?php echo $career['company_display']; ?></div>
                            <?php elseif (isset($career['company'])): ?>
                                <p class="mt-1"><?php echo htmlspecialchars($career['company']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Education Section -->
            <section id="education">
                <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Education</h2>
                <div class="space-y-8">
                    <?php foreach ($education as $index => $edu): ?>
                    <div class="relative pl-8">
                        <?php if ($index > 0): ?>
                            <div class="absolute left-3.5 top-4 bottom-0 w-px bg-gray-300 dark:bg-gray-600"></div>
                        <?php endif; ?>
                        <div class="absolute left-0 top-2.5">
                            <span class="block w-3 h-3 bg-green-500 dark:bg-green-400 rounded-full"></span>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1"><?php echo htmlspecialchars($edu['category']); ?></p>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-1"><?php echo htmlspecialchars($edu['degree']); ?></h3>
                        <div class="flex items-center text-gray-700 dark:text-gray-300">
                            <?php if (isset($edu['logo_icon'])): ?>
                                <i class="<?php echo htmlspecialchars($edu['logo_icon']); ?> mr-2 text-lg"></i>
                            <?php elseif (isset($edu['logo'])): ?>
                                <img src="<?php echo htmlspecialchars($edu['logo']); ?>" alt="<?php echo htmlspecialchars($edu['institution']); ?>" class="h-5 mr-2">
                            <?php endif; ?>
                            <span><?php echo htmlspecialchars($edu['institution']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <!-- Projects/Performance Section -->
        <section id="projects" class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">공연 프로젝트</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <?php foreach ($performances as $performance): ?>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="relative w-full h-48">
                        <img src="<?php echo htmlspecialchars($performance['image']); ?>" alt="<?php echo htmlspecialchars($performance['title']); ?>" class="w-full h-full object-cover">
                        <?php if (isset($performance['tag'])): ?>
                        <span class="absolute top-3 right-3 px-3 py-1 bg-blue-500 text-white text-xs font-semibold rounded-full">
                            <?php echo htmlspecialchars($performance['tag']); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex-grow">
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-1"><?php echo htmlspecialchars($performance['title']); ?></h3>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            <p><i class="fas fa-map-marker-alt mr-1"></i> <?php echo htmlspecialchars($performance['venue']); ?></p>
                            <p><i class="far fa-calendar-alt mr-1"></i> <?php echo htmlspecialchars($performance['date']); ?></p>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm"><?php echo htmlspecialchars($performance['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="mt-16 py-12 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4 md:px-8 max-w-4xl">
                <h2 class="text-3xl font-bold mb-10 text-center text-gray-800 dark:text-white">Contact Me</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                    <!-- Left Column: Mail Form -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-gray-700 dark:text-gray-200">메시지 보내기</h3>

                        <?php if ($formSubmitted && $mailSent): ?>
                        <div class="mb-4 p-4 bg-green-100 dark:bg-green-700 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-100 rounded-md">
                            메시지가 성공적으로 전송되었습니다!
                        </div>
                        <?php elseif ($formSubmitted && $mailError): ?>
                        <div class="mb-4 p-4 bg-red-100 dark:bg-red-700 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-100 rounded-md">
                            메시지 전송에 실패했습니다. 모든 필드를 올바르게 입력했는지 확인해주세요.
                        </div>
                        <?php endif; ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#contact" method="POST">
                            <div class="mb-4">
                                <label for="form_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">이름</label>
                                <input type="text" name="name" id="form_name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="홍길동" value="<?php echo isset($form_name) && $mailError ? htmlspecialchars($form_name) : ''; ?>">
                            </div>
                            <div class="mb-4">
                                <label for="form_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">이메일</label>
                                <input type="email" name="email" id="form_email" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="your@email.com" value="<?php echo isset($form_email) && $mailError ? htmlspecialchars($form_email) : ''; ?>">
                            </div>
                            <div class="mb-6">
                                <label for="form_message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">메시지</label>
                                <textarea name="message" id="form_message" rows="5" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" placeholder="메시지를 입력해주세요..."><?php echo isset($form_message) && $mailError ? htmlspecialchars($form_message) : ''; ?></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
                                    <i class="fas fa-paper-plane mr-2"></i> 전송하기
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Right Column: Map and Contact Info -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-gray-700 dark:text-gray-200">오시는 길 (미왕빌딩)</h3>
                        <div class="mb-6">
                            <!-- Google 지도 퍼가기 (사용자 제공 코드로 수정) -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.5248928911114!2d127.02677717717215!3d37.495536572057105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca15a761629d7%3A0xb1a5b1108d745e85!2z66-47JmVKOyjvCk!5e0!3m2!1sko!2skr!4v1746621690208!5m2!1sko!2skr"
                                width="100%"
                                height="256"
                                style="border:0; border-radius: 0.375rem;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 space-y-3">
                            <p><i class="fas fa-map-marker-alt mr-2 w-5 text-center text-blue-500"></i> <span class="font-semibold">미왕빌딩</span><br> <span class="ml-7">서울특별시 강남구 강남대로 378</span></p>
                            <p><i class="fas fa-phone-alt mr-2 w-5 text-center text-blue-500"></i> 전화: 02-XXX-XXXX (가상 번호)</p>
                            <p><i class="fas fa-envelope mr-2 w-5 text-center text-blue-500"></i> 이메일: contact@example.com (가상 이메일)</p>
                            <p><i class="fas fa-subway mr-2 w-5 text-center text-blue-500"></i> 지하철: 강남역 (2호선, 신분당선) 1번 출구</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-gray-500 dark:text-gray-400 py-12 mt-8">
            <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($pageOwnerName); ?>. All rights reserved.</p>
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