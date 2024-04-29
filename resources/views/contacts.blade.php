<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
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

        .contacts {
          padding-top: 80px;
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
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
        }

        .contacts .container .contact-form{
          margin-bottom: 20px;
        }

        .form-block{
          margin-bottom: 20px;
        }
        .form-block .form-block-label{
          display:block;
          font-weight: bold;
          margin-bottom: 10px;
        }
        .form-block span {
          display:block;
          color: red;
          font-weight: 500;
        }
        .form input[type='text'], 
        .form input[type='tel'], 
        .form input[type='date'],
        .form input[type='email'],
        .form input[type='file'],
        .form input[type='password'],
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
          width: 270px;
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
        background-color: #f2f5f7;
        color: #404952;
      }

      .form input[type='submit']:hover{
          background-color: #404952;
      }

      .form input[type='reset']:hover{
          background-color: #dfe4e8;
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
            <li><a href="/interests">Мои интересы</a></li>
            <li><a href="/album">Фотоальбом</a></li>
            <li><a href="/contacts" id="active-text">Контакты</a></li>
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

    <div class="contacts">
    <h1>Контакты</h1>
      <div class="container">
        <form class="form" method="post" action="/contacts/validate" >
            @csrf

            <div class="form-block">
                <label for="fullname" class="form-block-label">ФИО</label>
                <input type="text" id="fullname" name="fullname" placeholder="Введите ваше имя" value="{{ old('fullname') }}">
                {!! isset($errors_data) && $errors_data['fullname'] ? '<span>' . $errors_data['fullname'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
                <label for="birthday" class="form-block-label">Дата рождения</label>
                <input id="birthday" name="birthday" type="date" value="{{ old('birthday') }}">
                {!! isset($errors_data) && $errors_data['birthday'] ? '<span>' . $errors_data['birthday'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
              <label for="phone" class="form-block-label">Телефон</label>
              <input type="tel" id="phone" name="phone" placeholder="Введите телефон" value="{{ old('phone') }}">
              {!! isset($errors_data) && $errors_data['phone'] ? '<span>' . $errors_data['phone'] . '</span>' : '' !!}
            </div>
            
            <div class="form-block">
              <label for="gender" class="form-block-label">Пол</label>
              <input name="gender" type="radio" value="" style="display:none;" checked>
              <label class="radio-style"><input type="radio" name="gender" value="Мужской">Мужской</label>
              <label class="radio-style"><input type="radio" name="gender" value="Женский">Женский</label>
              {!! isset($errors_data) && $errors_data['gender'] ? '<span>' . $errors_data['gender'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
              <label for="age" class="form-block-label">Возраст</label>
              <select id="age" name="age" value="{{ old('age') }}">
                <option value="">Не выбрано</option>
                <option value="14-17">14-17</option>
                <option value="18-24">18-24</option>
                <option value="25-40">25-40</option>
                <option value="40+">40+</option>
              </select>
              {!! isset($errors_data) && $errors_data['age'] ? '<span>' . $errors_data['age'] . '</span>' : '' !!}
            </div>
            
            <div class="form-block">
              <label for="email" class="form-block-label">Почта</label>
              <input type="email" id="email" name="email" placeholder="Введите почту" value="{{ old('email') }}">
              {!! isset($errors_data) && $errors_data['email'] ? '<span>' . $errors_data['email'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
              <label for="message" class="form-block-label">Сообщение</label>
              <textarea id="message" name="message" rows="4" cols="80" placeholder="Введите текст...">{{ old('message') }}</textarea>
              {!! isset($errors_data) && $errors_data['message'] ? '<span>' . $errors_data['message'] . '</span>' : '' !!}
            </div>

            <input type="submit" value="Отправить" id="submit">
            <input type="reset" value="Очистить">
  
            <div class="errors">
              {!! $error_list ?? '' !!}
            </div>

          </form>
      </div>
    </div>

</body>
</html>