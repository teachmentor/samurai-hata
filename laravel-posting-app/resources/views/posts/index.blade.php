<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>投稿一覧</title>
   <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
   {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
   <header>
       <nav>
           <a href="{{ route('posts.index') }}">投稿アプリ</a>

           <ul>
               <li>
                   <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST">
                       @csrf
                   </form>
               </li>
           </ul>
       </nav>
   </header>

   <main>
       <h1>投稿一覧</h1>
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif

        @if (session('error_message'))
            <p>{{ session('error_message') }}</p>
        @endif

        <a href="{{ route('posts.create') }}">新規投稿</a>

       @if($posts->isNotEmpty())
           @foreach($posts as $post)
               <article>
                   <h2>{{ $post->title }}</h2>
                   <p>{{ $post->content }}</p>
                   <a href="{{ route('posts.show', $post) }}">詳細</a>
                   <a href="{{ route('posts.edit', $post) }}">編集</a>
                   <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
               </article>
           @endforeach
       @else
           <p>投稿はありません。</p>
       @endif
   </main>

   <footer>
       <p>&copy; 投稿アプリ All rights reserved.</p>
   </footer>
   {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
