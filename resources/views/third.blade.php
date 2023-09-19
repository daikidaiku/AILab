<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <title>idea lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <!-- ここからヘッダー -->
    <header>
       <img src="images/logo.png">
       <h1>Idea Lab</h1>
       <h3>~AIで新たなアイデアを製造!~</h3>
    </header>
    <!-- ここまでヘッダー -->

    <!-- ここからメイン -->
    <main>
        <div class="select">
            <div class="select-true"></div>
            <p>×</p>
            <div class="select-true"></div>
            <p>×</p>
            <div class="select-false"></div>
        </div>

        <p>あなたの考えをさらに深めよう</p>
        <div class="idea-list">
            @foreach ($third_keywords as $keyword)
                <div class="idea-item-2">
                    <form id="form-{{ $keyword }}" action="/{{$selected_first_keyword}}/{{$selected_second_keyword}}" method="post">
                        @csrf
                        <input type="hidden" name="first_keyword" value="{{$selected_first_keyword}}">
                        <input type="hidden" name="second_keyword" value="{{$selected_second_keyword}}">
                        <input type="hidden" name="third_keyword" value="{{ $keyword }}">
                    </form>
                    <div onclick="document.getElementById('form-{{ $keyword }}').submit();">
                        <h2>{{ $keyword }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
        
    </main>
    <!-- ここまでメイン -->

    <!-- ここからフッター -->
    <footer>
        <p>&copy;Copyright ideaLab. All rights reserved.</p>
    </footer>
</body>
</html>