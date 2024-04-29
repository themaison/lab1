<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоальбом</title>

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
        span {
          font-size: 12px;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            margin: 10px;
            padding-block: 5px;
            border-radius: 12px;
            margin-bottom: 40px;
            background-color: #fff;
            box-shadow: #d0d5d6 0px 5px 60px;
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

        .album {
            padding-top: 40px;
        }
        
        .album .container {
            display:flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            gap: 20px;
        }

        .album-cell {
            padding: 20px;
        }

        .album-cell:hover {
            background-color: #fafafa;
            /* border: 1px solid #404952; */
            border-radius: 18px;
            cursor: pointer;
            color: #3168ff;
        }

        .album-cell:active {
            background-color: #f5f5f5;
        }

        .album-cell p{
            font-weight: 700;
            font-size: 18px;
        }

        img {
            max-width: 180px;
            height: auto;
            border-radius: 8px;
        }
        .header #active-text{
            color: #3168ff;
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
            <li><a href="/interests">Мои интересы</a></li>
            <li><a href="/album" id="active-text">Фотоальбом</a></li>
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
    <div class="album">
        <h1>Фотоальбом</h1>
        <div class="container">
            @foreach ($photos as $photo)
                <div class="album-cell">
                    <img src="{{ asset($photo['filename']) }}" alt="{{ $photo['caption'] }}">
                    <p>{{ $photo['caption'] }}</p>
                </div>
            @endforeach
        </div>
    </div>    
    
</body>
</html>
