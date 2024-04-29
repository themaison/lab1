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
            border-radius: 12px;
            background-color: #fff;
            box-shadow: #d0d5d6 0px 5px 60px;
        }
        .header ul{
            display: flex;
            list-style: none;
            column-gap: 40px
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
            width: 280px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            padding: 20px 40px;
            background-color: #fff;
            border-radius: 32px;
            margin-bottom: 10px;
        }

        .input-data {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
        }

        .form {
            text-align: center;
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

       .form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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

      .page-swapper {
        color: #3168ff;
      }

      .page-swapper:hover {
        color: #404952;
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
            <li><a href="/">На главную</a></li>
        </ul>
    </nav>
    <div class="page-content">
        <div class="container">
          <h2 class="divider">Вход в аккаунт</h2>

          <form class="form" method="POST" action="/login/confirm" enctype="multipart/form-data">
            @csrf
        
            <div class="form-block">
                <input type="text" id="login" name="login" placeholder="Введите логин">
                {!! isset($errors_data['login']) ? '<span>' . $errors_data['login'] . '</span>' : '' !!}
            </div>
        
            <div class="form-block">
                <input type="password" id="pass" name="pass" placeholder="Введите пароль">
                {!! isset($errors_data['pass']) ? '<span>' . $errors_data['pass'] . '</span>' : '' !!}
            </div>
        
            <div class="form-block">
                <input type="submit" value="Войти" id="submit">
            </div>

            <div class="form-block">
                <p>Нет аккаунта? <a href="/register" class="page-swapper">Зарегистрироваться</a></p>
            </div>
        
            @if(isset($incorrect_msg))
            <div class="form-block">
                <span>{{ $incorrect_msg }}</span>
            </div>
            @endif
        
        </form>
        
        </div>
    </div>
</body>
</html>