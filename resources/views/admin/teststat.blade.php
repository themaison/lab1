<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статистика тестов</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f5f7;
            color: #404952;
            font-size: 14px;
            font-weight: 500;
        }
        h1 {
          font-size: 32px;
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
            border-radius: 32px;
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
            border-radius: 32px;
            margin-bottom: 10px;
        }

        .input-data {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
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

      .test-results .row {
          display: flex;
          justify-content: space-between;
      }

      .test-results .row .col {
          flex-basis: 50%;
          padding: 0 10px;
      }

      .test-results .good {
          color: #099967;
          padding: 15px;
          border-radius: 8px;
          background-color: #f0fff2;
          border: 1px solid #88e6a6
        }
      .test-results .bad {
          color: rgb(255, 0, 38);
          padding: 15px;
          border-radius: 8px;
          background-color: #faf5f6;
          border: 1px solid #ffb4b4
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
    </style>
</head>
<body>
    <nav class="header">
        <ul>
          <li><a href="/admin/panel">Админ панель</a></li>
          <li><a href="/admin/gb_uploader">Загрузка ГК</a></li>
          <li><a href="/admin/my_blog">Блог</a></li>
          <li><a href="/admin/blog_editor">Редактор блога</a></li>
          <li><a href="/admin/teststat" id="actual">Статистика тестов</a></li>
          <li><a href="/admin/visit_stat">Статистика посещений</a></li>
          <li><a class="leave-btn" href="/logout">Выйти</a></li>
        </ul>
    </nav>
    <div class="page-content">
        <h1>Статистика тестов</h1>
        <div class="container">
          <h2 class="divider">Пользователь</h2>
          <form class="form" method="post" action="/admin/teststat/store" enctype="multipart/form-data">
            @csrf
            <h3>Выбор пользователя</h3>

            <div class="form-block">
                <label for="fullname" class="form-block-label">ФИО Пользователя</label>
                <select id="fullname" name="fullname" value="{{ old('fullname') }}">
                  <option value="">Не выбрано</option>
                  @foreach($fullnames as $fullname)
                    <option value="{{ $fullname->fullname }}" {!! isset($latestTestResult) && $latestTestResult->fullname == $fullname->fullname ? 'selected' : '' !!}>{{ $fullname->fullname }}</option>
                  @endforeach
              </select>
                {!! isset($errors_data) && $errors_data['fullname'] ? '<span>' . $errors_data['fullname'] . '</span>' : '' !!}
              </div>

            <input type="submit" value="Посмотреть результаты" id="submit">

          </form>

          @if(isset($latestTestResult))
            <div class="test-results">
              <h2 class="divider">Результаты тестирования</h2>
              <h3>{{ $latestTestResult->fullname }}</h3>
              <div class="row">
                  <div class="col">
                      <p>Верные ответы</p>
                      <div class="good">
                          @foreach($correct_answers as $question => $data)
                              <p>{{ $question }}: {{ $data['answer'] }}</p>
                          @endforeach
                      </div>
                  </div>
                  <div class="col">
                      <p>Неверные ответы</p>
                      <div class="bad">
                          @foreach($incorrect_answers as $question => $data)
                              <p>{{ $question }}: {{ $data['answer'] }}</p>
                          @endforeach
                      </div>
                  </div>
              </div>
            </div>
        
            @endif
        
        </div>
    </div>
</body>
</html>