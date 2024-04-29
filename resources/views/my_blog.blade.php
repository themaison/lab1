<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Блог</title>
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
          padding: 10px;
          background-color: #faf5f6; 
          border-radius: 5px;
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

      .blog {
        margin-left: auto;
        margin-right: auto;
        width: 580px;
        margin-bottom: 20px;
      }

      .post {
        background-color: #f2f5f7;
        border-radius: 24px;
        padding: 40px;
        width:480px;
        margin-bottom: 10px;
      }
      .main-data{
        display: flex;
        justify-content: space-between;
      }

      .main-data p {
        color: #79818a;
        font-size: 14px;
      }

      .author-post {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 8px;
        background-color:  #404952;
        color: #fff;
      }

      .pagination{
        display: flex;
        column-gap: 10px;
      }
      .page {
        display: flex;
        width: 48px;
        height: 48px;
        text-align: center;
        justify-content: center;
        color:#3168ff;
        border-radius: 100px;
      }
      .page:hover{
        background-color: #f2f5f7;
        color: #3168ff;
        cursor: pointer;
      }

      #active {
        background-color: #3168ff;
        color: #fff;
      }

      .post .add-comment-btn {
          padding: 15px 40px;
          border: 2px solid  #404952;
          border-radius: 16px;
          color: #404952;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          cursor: pointer;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          font-weight: 700;
          font-size: 18px;
          width: 100%;
          margin-block: 20px;
          background-color: transparent;
      }

      .post .add-comment-btn:hover{
          color: #3168ff;
      }

      .post .add-comment-btn:active{
          background-color: #e8ecef;
          color: #144ff1;
      }

      .post-img {
        margin-top: 10px;
        width: 100%;
        height: auto;
        border-radius: 16px;
      }

      .leave-btn {
            padding: 5px 15px;
            border-radius: 8px;
            border: solid 2px #404952;
        }

        .leave-btn:hover{
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

        .comment-modal {
          margin-block: 20px;
          background-color: transparent;
          border-radius: 16px;
          display: flex;
          justify-content: space-between;
          column-gap: 10px;
        }

        .comment-modal .submit-comment-btn, .edit-post-btn, .save-post-changes-btn{
            padding: 15px 40px;
            background-color: #3168ff;
            border-radius: 16px;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
        }

        .comment-modal .submit-comment-btn:hover, .edit-post-btn:hover, .save-post-changes-btn:hover {
          background-color: #404952;
        }

        .cancel-post-changes-btn {
            width: 100%;
            padding: 15px 40px;
            border-radius: 16px;
            border: 2px solid #404952;
            color: #404952;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
            background-color: transparent;
        }

        .cancel-post-changes-btn:hover {
            padding: 15px 40px;
            border-radius: 16px;
            color: #3168ff;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
        }

        .edit-btns {
          display: flex;
          flex-direction: row;
          column-gap: 10px;
          width: 100%;
        }

        input {
          padding: 15px;
          font-family: 'Segoe UI', sans-serif;
          width: 100%;
          border: none;
          border-radius: 16px;
          background-color: #e3ecf1;
          font-weight: 500;
          color: #404952;
        }

        .comments {
          background-color: #e3ecf1;
          padding: 10px 20px;
          border-radius: 16px;
        }

        .comment {
          border-bottom: 1px solid #79818a;
        }

        .comment:last-child {
          border: none;
          margin: 0;
        }

        .comment > p {
          font-size: 18px;
        }

        .edit-post-modal {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-post-modal-content {
            align-items: center;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
            background-color: #fff;
            margin: auto;
            padding: 40px;
            border-radius: 32px;
            width: 320px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(document).ready(function(){
        $('.add-comment-btn').on('click', function(){
            var post_id = $(this).data('post-id');
            $('#comment-modal-' + post_id).show();
            // $('.add-comment-btn').hide();
            $(this).hide();
        });

        $('.submit-comment-btn').on('click', function(){
            var post_id = $(this).data('post-id');
            var comment = $('#comment-input-' + post_id).val();

            if (!comment) {
                // $('.add-comment-btn').show();
                $('#post-' + post_id + ' .add-comment-btn').show();
                $('#comment-modal-' + post_id).hide();
                return;
            }

            $.ajax({
                url: '/add_comment',
                method: "POST",
                data: {post_id:post_id, comment:comment},
                success: function(data){
                    var commentHtml = '<div class="comment">' +
                        '<div class="main-data">' + 
                          '<p>' + data.author + '</p>' +
                          '<p>' + data.created_at + '</p>' +
                        '</div>' + 
                        '<p>' + data.comment + '</p>' +
                        '</div>';
                    // Проверяем, существует ли блок comments
                    if ($('#post-' + post_id + ' .comments').length === 0) {
                        $('#post-' + post_id).append('<div class="comments"></div>');
                    }
                    $('#post-' + post_id + ' .comments').prepend(commentHtml);
                    $('#comment-modal-' + post_id).hide();
                    $('#comment-input-' + post_id).val('');
                    // $('.add-comment-btn').show();
                    $('#post-' + post_id + ' .add-comment-btn').show();
                }
            });
        });

        $('.edit-post-btn').on('click', function(){
            var post_id = $(this).data('post-id');
            $('#edit-post-modal-' + post_id).show();
        });

        $('.save-post-changes-btn').on('click', function(){
          console.log();
            var post_id = $(this).data('post-id');
            var title = $('#edit-post-title-input-' + post_id).val();
            var message = $('#edit-post-message-input-' + post_id).val();

            if (!title || !message) {
              $('#edit-post-modal-' + post_id).hide();
              return;
            }

            $.ajax({
                url: '/admin/edit_post',
                method: "POST",
                data: {post_id:post_id, title:title, message:message},
                success: function(data){
                    $('#post-' + post_id + ' .title').text(title);
                    $('#post-' + post_id + ' .message').text(message);
                    $('#edit-post-modal-' + post_id).hide();
                }
            });
        });

        $('.cancel-post-changes-btn').on('click', function(){
            var post_id = $(this).data('post-id');
            $('#edit-post-modal-' + post_id).hide();
        });

      });
</script>      

</head>
<body>
    <nav class="header">

      @if(!session('isAdmin'))
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/interests">Мои интересы</a></li>
            <li><a href="/album">Фотоальбом</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/test">Тест</a></li>
            <li><a href="/gb">Гостевая книга</a></li>
            <li><a href="/my_blog" id="actual">Блог</a></li>
            <li><a href="/blog_uploader">Загрузка сообщений блога</a></li>
            @if($user)
                <li><a href="/logout" class="leave-btn">Выйти</a></li>
            @else
                <li><a href="/admin/login">Вход в админ панель</a></li>
                <li><a href="/login">Вход</a></li>
                <li><a href="/register">Регистрация</a></li>
            @endif
        </ul>
        @else
          <ul>
            <li><a href="/admin/panel">Админ панель</a></li>
            <li><a href="/admin/gb_uploader">Загрузка ГК</a></li>
            <li><a href="/admin/blog" id="actual">Блог</a></li>
            <li><a href="/admin/blog_editor">Редактор блога</a></li>
            <li><a href="/admin/teststat">Статистика тестов</a></li>
            <li><a href="/admin/visit_stat">Статистика посещений</a></li>
            <li><a class="leave-btn" href="/admin/logout">Выйти</a></li>
          </ul>
        @endif

        @if($user)
        <div class="profile-data">
          <p class="user-name">{{ $user->fullname }}</p>
        </div>
        @endif

    </nav>

    <div class="page-content">
        <h1>Блог</h1>
        <div class="container">
          <h2 class="divider">Последние статьи</h2>

          <div class="blog">
            @if(isset($blogdata))
              @foreach ($blogdata as $post)
                  <div class="post" id="post-{{ $post->post_id }}">

                      <div class="main-data">
                          <p class="title">{{ $post->title }}</p>
                          <p>{{ $post->created_at }}</p>

                          @if(session('isAdmin'))

                            <button class="edit-post-btn" data-post-id="{{ $post->post_id }}">Изменить</button>     

                            <div id="edit-post-modal-{{ $post->post_id }}" class="edit-post-modal" style="display: none;">
                              <div class="edit-post-modal-content">
                                <h2 class="divider">Редактирование поста</h2>

                                <input type="text" id="edit-post-title-input-{{ $post->post_id }}" value="{{ $post->title }}">
                                <input type="text" id="edit-post-message-input-{{ $post->post_id }}" value="{{ $post->message }}">
                                
                                <div class="edit-btns">
                                  <button class="save-post-changes-btn" data-post-id="{{ $post->post_id }}">Сохранить</button>
                                  <button class="cancel-post-changes-btn" data-post-id="{{ $post->post_id }}">Отмена</button>
                                </div>

                              </div>
                            </div>

                            @endif

                      </div>

                      <img class="post-img" src="{{ Storage::url($post->image) }}" alt="">
                      <p class="message">{{ $post->message }}</p>
                      <p class="author-post">{{ $post->author }}</p>

                      @if(session('user'))
                        <div>
                            <button class="add-comment-btn" data-post-id="{{ $post->post_id }}">Добавить комментарий</button>
                        </div>
                      
                        <div id="comment-modal-{{ $post->post_id }}" class="comment-modal" style="display: none;">
                            <input type="text" id="comment-input-{{ $post->post_id }}" placeholder="Введите комментарий">
                            <button class="submit-comment-btn" data-post-id="{{ $post->post_id }}">Отправить</button>
                        </div>
                      @endif

                        @if($post->comments->count() > 0)
                          <div class="comments">      
                            @foreach ($post->comments as $comment)
                                <div class="comment" id="comment-{{ $comment->comment_id }}">
                                    <div class="main-data">
                                      <p>{{ $comment->author }}</p>
                                      <p>{{ $comment->created_at }}</p>
                                    </div>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            @endforeach
                          </div>
                        @endif
                      
                  </div>
              @endforeach
            @else
                <p>Нет блогов для отображения.</p>
            @endif
          </div>

          <div class="pagination">
              <div>Всего записей: {{ $blogdata->total() }}</div>
              <div>{{ $blogdata->links() }}</div>
          </div>

        </div>
    </div>
</body>
</html>