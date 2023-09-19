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
       <h3>AIで新たなアイデアを製造!</h3>
    </header>
    <!-- ここまでヘッダー -->

    <!-- ここからメイン -->
    <main>
        <div class="text"><p>すでにアイデアを持っている人は、検索欄からさらに深いアイデアを探しに行きましょう。</p></div>
        <div class="search">
            <input type="text" class="ki-input" value="キーワードを入れてみよう!!">
            <input type="submit" class="btbt">
        </div>
        <!-- <div class="button">
            <input type="submit" class="btbt">
        </div> -->
        
        <form id="keywordForm" action="/" method="POST">
    @csrf
    <input type="hidden" name="keyword" id="keywordInput">
        <div class="text"><p>あなたが作り出したいアイデアはどの分野ですか？</p></div>
        <div class="idea-list">
            <div class="idea-item-1">
                <a href="select.html">
                    <div>
                        <h2>{{$first_keywords[0]}}</h2>
                    </div>
                </a>
            </div>

        <div class="idea-item-2">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[1]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-3">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[2]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-3">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[3]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-1">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[4]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-2">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[5]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-3">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[6]}}</h2>
                </div>
            </a>
        </div>

        <div class="idea-item-1">
            <a href="select.html">
                <div>
                    <h2>{{$first_keywords[7]}}</h2>
                </div>
            </a>
        </div>
        </div>
        </form>
    </main>
    <!-- ここまでメイン -->

    <!-- ここからフッター -->
    <footer>
        <p>&copy;Copyright ideaLab. All rights reserved.</p>
    </footer>
</body>
</html>

<script>
    const links = document.querySelectorAll('.idea-item-1, .idea-item-2, .idea-item-3');

    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const keyword = this.querySelector('h2').innerText;
            document.getElementById('keywordInput').value = keyword;
            document.getElementById('keywordForm').submit();
        });
    });
</script>