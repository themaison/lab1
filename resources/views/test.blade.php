<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
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
        .header a:hover, .header #active-text{
            color: #3168ff;
        }

        .test {
          padding-top: 80px;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
        }

        .form-block{
          margin-bottom: 30px;
        }
        .form-block .form-block-label{
          display:block;
          font-weight: 700;
          margin-bottom: 10px;
        }

        .form-block span {
          display:block;
          color: red;
          font-weight: 500;
        }

        .form-block .result-hint {
          display:block;
          font-weight: 500;
          margin-top: 5px;
        }
        .result-hint .good {
          color: #099967;
          padding: 15px;
          border-radius: 8px;
          background-color: #f0fff2;
        }
        .result-hint .bad {
          color: rgb(255, 0, 38);
          padding: 15px;
          border-radius: 8px;
          background-color: #faf5f6;
        }

        .form input[type='text'], 
        .form input[type='tel'], 
        .form input[type='date'],
        .form input[type='email'],
        .form select, .form textarea{
          padding: 15px;
          width: 240px;
          border: none;
          border-radius: 8px;
          background-color: #f2f5f7;
          font-weight: 500;
          color: #404952;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form textarea {
          width: 50%;
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
        color: #ff000d;
        background-color: #fff4f4;
        border-radius: 4px;
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

      .q-wrapper {
        display: inline-block;
        padding: 5px;
        border-radius: 4px;
        background-color: #f1f5ff;
        color: #404952;
        font-weight: 700;
        margin-right: 5px;
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
            color:#404952;
            border-radius: 12px;
            padding: 0px 15px;
        }
        
        .user-name {
            font-weight: 700px;
            font-size: 12px;
        }

        .notify {
          color: #404952;
          background-color: #fffde9;
          padding: 40px;
          border-radius: 24px;
          text-align: center;
        }

        .page-swapper {
          color: #3168ff;
        }

        .page-swapper:hover {
          color: #404952;
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
            <li><a href="/test" id="active-text">Тест</a></li>
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

    <div class="test">
      <h1>Тест. «Теория вероятностей и математическая статистика»</h1>
      <div class="container">
        <form class="form" method="post" action="/test/validate">
          @csrf

          <div class="form-block">
            <label for="q1" class="form-block-label"><div class="q-wrapper">Вопрос 1:</div> Локальная теорема Лапласа</label>
            <textarea name="q1" id="q1" cols="100" rows="6" placeholder="Напишите текст...">{!! isset($user_answers) ? $user_answers['q1']  : '' !!}</textarea>
            <div class="result-hint">
              @if(isset($results))
                  @if($results['q1'])
                      <div class='good'>
                        Верно
                      </div>
                  @else
                      <div class='bad'>
                        Неверно <br>
                        Правильный ответ: {{ $answers['q1'] }}
                      </div>
                  @endif
              @endif
            </div>
            {!! isset($errors_data) && $errors_data['q1'] ? '<span>' . $errors_data['q1'] . '</span>' : '' !!}
          </div>

          <div class="form-block">
            <label for="q2" class="form-block-label"><div class="q-wrapper">Вопрос 2:</div> Из колоды (36 карт) наудачу выбирают одну карту. 
              Какова вероятность, что она окажется пиковой масти?</label>
            <input name="q2" type="radio" value="" style="display:none;" checked>
            <label class="radio-style"><input name="q2" type="radio" value="0.25" {!! isset($user_answers) && $user_answers['q2'] == '0.25' ? 'checked' : '' !!}>0.25</label>
            <label class="radio-style"><input name="q2" type="radio" value="0.75" {!! isset($user_answers) && $user_answers['q2'] == '0.75' ? 'checked' : '' !!}>0.75</label>
            <label class="radio-style"><input name="q2" type="radio" value="0.5" {!! isset($user_answers) && $user_answers['q2'] == '0.5' ? 'checked' : '' !!}>0.5</label>
            <label class="radio-style"><input name="q2" type="radio" value="0.67" {!! isset($user_answers) && $user_answers['q2'] == '0.67' ? 'checked' : '' !!}>0.67</label>
            <div class="result-hint">
              @if(isset($results))
                  @if($results['q2'])
                      <div class='good'>
                        Верно
                      </div>
                  @else
                      <div class='bad'>
                        Неверно <br>
                        Правильный ответ: {{ $answers['q2'] }}
                      </div>
                  @endif
              @endif
            </div>
            {!! isset($errors_data) && $errors_data['q2'] ? '<span>' . $errors_data['q2'] . '</span>' : '' !!}
          </div>

          <div class="form-block">
            <label for="q3" class="form-block-label"><div class="q-wrapper">Вопрос 3:</div> Событие "После первого курса студенту техникума выдают диплом" является...</label>
            <select name="q3" id="q3">
              <option value="" {!! isset($user_answers) && $user_answers['q3'] == '' ? 'selected' : '' !!}>Не выбрано</option>
              <option value="Невозможным" {!! isset($user_answers) && $user_answers['q3'] == 'Невозможным' ? 'selected' : '' !!}>Невозможным</option>
              <option value="Случайным" {!! isset($user_answers) && $user_answers['q3'] == 'Случайным' ? 'selected' : '' !!}>Случайным</option>
            </select>
            <div class="result-hint">
              @if(isset($results))
                  @if($results['q3'])
                      <div class='good'>
                        Верно
                      </div>
                  @else
                      <div class='bad'>
                        Неверно <br>
                        Правильный ответ: {{ $answers['q3'] }}
                      </div>
                  @endif
              @endif
            </div>
            {!! isset($errors_data) && $errors_data['q3'] ? '<span>' . $errors_data['q3'] . '</span>' : '' !!}
          </div>

            
            <div class="form-block">
              <label for="fullname" class="form-block-label">ФИО</label>
                <input type="text" id="fullname" name="fullname" placeholder="Напишите текст...">
                {!! isset($errors_data) && $errors_data['fullname'] ? '<span>' . $errors_data['fullname'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
              <label for="group" class="form-block-label">Группа</label>
              <select name="group" id="group">
                <option value="" selected>Не выбрано</option>
                <optgroup label="Курс 1">
                  <option value="ИС/б-23-1-о">ИС/б-23-1-о</option>
                  <option value="ИС/б-23-2-о">ИС/б-23-2-о</option>
                  <option value="ИС/б-23-3-о">ИС/б-23-3-о</option>
                  <option value="ПИ/б-23-1-о">ПИ/б-23-1-о</option>
                </optgroup>
                <optgroup label="Курс 2">
                  <option value="ИС/б-22-1-о">ИС/б-22-1-о</option>
                  <option value="ИС/б-22-2-о">ИС/б-22-2-о</option>
                  <option value="ИС/б-22-3-о">ИС/б-22-3-о</option>
                  <option value="ПИ/б-22-1-о">ПИ/б-22-1-о</option>
                </optgroup>
                <optgroup label="Курс 3">
                  <option value="ИС/б-21-1-о">ИС/б-21-1-о</option>
                  <option value="ИС/б-21-2-о">ИС/б-21-2-о</option>
                  <option value="ИС/б-21-3-о">ИС/б-21-3-о</option>
                  <option value="ПИ/б-21-1-о">ПИ/б-21-1-о</option>
                </optgroup>
                <optgroup label="Курс 4">
                  <option value="ИС/б-20-1-о">ИС/б-20-1-о</option>
                  <option value="ИС/б-20-2-о">ИС/б-20-2-о</option>
                  <option value="ИС/б-20-3-о">ИС/б-20-3-о</option>
                  <option value="ПИ/б-20-1-о">ПИ/б-20-1-о</option>
                </optgroup>
              </select>
              {!! isset($errors_data) && $errors_data['group'] ? '<span>' . $errors_data['group'] . '</span>' : '' !!}
            </div>

            <div class="form-block">
              <input type="submit" value="Завершить тест">
              <input type="reset" value="Очистить">
            </div>

            @if(isset($msg))
                  <div class="form-block notify">
                      {{ $msg }}
                      <a href="/login" class="page-swapper">Войти в аккаунт</a>
                  </div>
              @endif

        </form>
      </div>
    </div>
</html>