<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
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
          color: #3168ff;
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
            background-color: #fff;
            box-shadow: #d0d5d6 0px 5px 60px;
        }
        .header ul{
            display: flex;
            list-style: none;
            column-gap: 30px
        }
        .header a{
            text-decoration: none;
            color: #404952;
        }
        .header a:hover {
            color:#3168ff;
        }
        .header #actual{
            color: #3168ff;
        }

        .page-content {
          padding-top: 80px;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .input-data {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
        }

        .form-block span {
          display:block;
          color: red;
          font-weight: 500;
        }

        .form-block{
          display: flex;
          flex-direction: column;
          margin-bottom: 20px;
        }
        .form-block .form-block-label{
          display:block;
          font-weight: bold;
          margin-bottom: 10px;
        }
        .form input[type='text'], 
        .form input[type='tel'], 
        .form input[type='date'],
        .form input[type='email'],
        select, textarea{
          padding: 15px;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          width: 240px;
          border: none;
          border-radius: 8px;
          background-color: #f2f5f7;
          margin-bottom: 5px;
          font-weight: 500;
          color: #404952;
        }

        .form .radio-style {
          font-weight: 500;
          margin-right: 10px;
        }

        .form input[type='submit'], 
        .form input[type='reset'] {
          padding: 15px 40px;
          background-color: #3168ff;
          border-radius: 8px;
          border: none;
          color: white;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          cursor: pointer;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          font-weight: 500;
       }

       .form input[type='reset'] {
        background-color: #f1f5ff;
        color: #3168ff;
      }

      .form input[type='submit']:hover{
          background-color: #404952;
          color: #fff;
      }

      .form input[type='reset']:hover{
          background-color: #e4ecff;
          color: #3168ff;
      }

      .form .errors{
        margin-top: 20px;
      }

      .errors-list{
        padding: 10px;
        border: 1px solid red;
        border-radius: 8px;
        list-style: none;
      }

      .error-field {
        margin-bottom: 10px;
        padding: 10px 5px;
        background-color: #faf5f6;
        border-radius: 4px;
        color: red;
        font-weight: 500;
      }

      .error-field:last-child{
        margin-bottom: 0px;
      }

      .field-name{
        display: inline;
        padding: 5px;
        text-align:center;
        background-color: red;
        color: #fff;
        border-radius: 4px;
        margin-right: 10px;
      }

      .divider {
        border-bottom: 1px solid #f2f5f7; /* Цвет и толщина линии */
        padding-bottom: 10px; /* Отступ от текста до линии */
      }

      .reviews{
        width: 100%;
        text-align: left;
        border-radius: 12px;
        padding: 4px;
        background-color:#f2f5f7;
      }

      .reviews td, .reviews th {
        padding: 10px;
        border-radius: 8px;
      }

      .reviews th {
        background-color:#e3e9ec;
        color:#404952;
      }

      .reviews tr{
        color:#404952;
      }

      .reviews tr:hover{
        color:#3168ff;
        cursor: pointer;
      }

      .info-block{
        text-align: center;
        font-size: 64px;
        font-weight: 700;
        color: #f2f2f2;
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
            position: fixed; 
            top: 80px; 
            left: 50%; 
            transform: translateX(-50%);
            max-width: 80%; 
            text-align: center;
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
            <li><a href="/interests">Мои интересы</a></li>
            <li><a href="/album">Фотоальбом</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/test">Тест</a></li>
            <li><a href="/gb" id="actual">Гостевая книга</a></li>
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
    <div class="page-content">
        <h1>Гостевая книга</h1>
        <div class="container">
          <h2 class="divider">Новый отзыв</h2>
            <form class="form" method="post" action="/gb/store" >
                @csrf
                
                <div class="input-data">
                  <div class="form-block">
                    <label for="fullname" class="form-block-label">ФИО</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Напишите данные...">
                    {!! isset($errors_data) && $errors_data['fullname'] ? '<span>' . $errors_data['fullname'] . '</span>' : '' !!}
                </div>
    
                <div class="form-block">
                    <label for="email" class="form-block-label">Почта</label>
                    <input id="email" name="email" type="email" placeholder="Напишите вашу почту...">
                    {!! isset($errors_data) && $errors_data['email'] ? '<span>' . $errors_data['email'] . '</span>' : '' !!}
                </div>
                </div>

                <div class="form-block">
                  <label for="message" class="form-block-label">Отзыв</label>
                  <textarea id="message" name="message" rows="4" cols="200" placeholder="Напишите текст отзыва..."></textarea>
                  {!! isset($errors_data) && $errors_data['message'] ? '<span>' . $errors_data['message'] . '</span>' : '' !!}
              </div>

                <input type="submit" value="Опубликовать" id="submit">
                <input type="reset" value="Очистить">
    
              </form>
        </div>

        <div class="container">
          <h2 class="divider">Отзывы</h2>
            @isset($messages)
                @if(count($messages) > 0)
                  <table class="reviews">
                    <thead>
                        <tr>
                            <th scope="col">ФИО</th>
                            <th scope="col">Почта</th>
                            <th scope="col">Отзыв</th>
                            <th scope="col">Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message['fullname'] }}</td>
                                <td>{{ $message['email'] }}</td>
                                <td>{{ $message['message'] }}</td>
                                <td>{{ $message['datetime'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="info-block">
                  <p>Отзывов пока нет</p>
                </div>
                @endif
            @else
            <div class="info-block">
              <p>Отзывов пока нет</p>
            </div>
            @endisset
          </div>
        </div>
    </div>
</body>
</html>