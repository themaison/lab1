<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои интересы</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f5f7;
            color: #404952;
            font-size: 14px;
            font-weight: 500;
        }
        h1 {
            font-size: 48px;
            font-weight: 700;
        }
        h2 {
            font-size: 32px;
            color: #3168ff;
        }
        h3 {
            font-size: 24px;
        }
        span {
          font-size: 12px;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
            margin: 10px;
            padding-block: 5px;
            border-radius: 12px;
            margin-bottom: 40px;
            background-color: #fff;
            box-shadow: #d0d5d6 0px 5px 60px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 180px;
            box-shadow: #d0d5d6 0px 5px 60px;
            padding: 10px;
            z-index: 2;
        }
        .dropdown-content .category-type {
            padding: 10px;
            border-bottom: 1px solid #f2f5f7;
        }

        .dropdown-content .category-type:last-child {
            padding: 10px;
            border-bottom: none;
        }

        .dropdown-content .category-type:hover {
            background-color: #f2f5f7;
            border-radius: 4px;
        }

        .dropdown:hover .dropdown-content {
            display: flex;
            flex-direction: column;
            border-radius: 12px;
        }


        .interests {
          padding-top: 40px;
        }
        .header ul{
            display: flex;
            list-style: none;
            column-gap: 30px
        }

        .header ul li{
            font-weight: 500;
        }

        .header a{
            text-decoration: none;
            color: #404952;
        }

        .header a:hover {
            color: #3168ff;
        }
        .header #active-text{
            color: #3168ff;
        }
        .container {
            display:flex;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            gap: 20px;
        }

        .category-block {
            margin-bottom: 20px;
        }
        .category-block:last-child {
            margin-bottom: 0px;
        }

        .interest-block {
            border-bottom: 1px solid #f2f5f7;
            display: block;
            width: 100%;
        }

        .interest-block:last-child {
            border: none;
        }

        .leave-btn {
            padding: 5px 15px;
            border-radius: 8px;
            border: solid 2px #404952;
        }

        .leave-btn:hover {
            background-color: #f2f5f7;
            color: #fff;
        }

        .profile-data {
            position: fixed; /* Фиксирует плашку на экране */
            top: 80px; /* Отступ сверху, под шапкой. Измените это значение в соответствии с высотой вашей шапки */
            left: 50%; /* Центрирует плашку по горизонтали */
            transform: translateX(-50%); /* Смещает плашку на половину ее ширины влево, чтобы она была точно по центру */
            max-width: 80%; /* Ограничивает максимальную ширину плашки до 80% ширины экрана */
            text-align: center; /* Выравнивает текст по центру */
            background-color: #fff;
            color: #404952;
            border-radius: 12px;
            padding: 0px 15px;
        }
        
        .user-name {
            font-weight: 700px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav class="header">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>
                <div class="dropdown">
                    <a href="/interests" id="active-text">Мои интересы</a>
                    <div class="dropdown-content">
                        @foreach($interests as $category => $interestsArray)
                            <a href="#{{ $category }}" class="category-type">{{ $category }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li><a href="/album">Фотоальбом</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/test">Тест</a></li>
            <li><a href="/gb">Гостевая книга</a></li>
            <li><a href="/my_blog">Блог</a></li>
            <li><a href="/blog_uploader">Загрузка сообщений блога</a></li>
            @if($user)
                <li><a href="/logout" class="leave-btn">Выйти</a></li>
            @else
                <li><a href="/admin/login">Вход в админ панель</a></li>
                <li><a href="/login">Вход</a></li>
                <li><a href="/register">Регистрация</a></li>
            @endif
        </ul>
        @if($user)
        <div class="profile-data">
            <p class="user-name">{{ $user->fullname }}</p>
        </div>
        @endif
    </nav>
    
    <div class="interests">
        <h1>Мои интересы</h1>
        <div class="container">
            @foreach($interests as $category => $interestsArray)
                <div class="category-block" id={{ $category }}>
                    <h2>{{ $category }}</h2>
                    @foreach($interestsArray as $interest)
                        <div class="interest-block">
                            <h3>{{ $interest['interest'] }}</h3>
                            <p>{{ $interest['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>