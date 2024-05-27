<!doctype html>
<html lang="ja" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

  </head>
  <body>
    <!-- アイコン -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </symbol>
      <symbol id="chat-dots" viewBox="0 0 16 16">
        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
      </symbol>
      <symbol id="table" viewBox="0 0 16 16">
        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
      </symbol>
      <symbol id="people-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </symbol>
      <symbol id="file-earmark-text" viewBox="0 0 16 16">
        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
      </symbol>
    </svg>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <!-- サイドバー -->
      <nav class="sidebar d-none d-md-block d-flex flex-column flex-shrink-0 p-3 text-bg-dark-custom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <image src="../IMAGES/asologo.png" width=auto height="32">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <!-- トップ -->
          <li class="nav-item">
            <a href="top.php" class="nav-link text-white" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#search"/></svg>
              トップ
            </a>
          </li>
          <!-- トーク -->
          <li class="nav-item">
            <a href="talk.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#chat-dots"/></svg>
              トーク
            </a>
          </li>
          <!-- 選考状況 -->
          <li class="nav-item">
            <a href="senkou.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              選考状況
            </a>
          </li>
          <!-- 受験報告 -->
          <li class="nav-item">
            <a href="zyukenhoukokukanryo.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#file-earmark-text"/></svg>
              受験報告
            </a>
          </li>
          <!-- マイページ -->
          <li class="nav-item">
            <a href="mypage.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
              マイページ
            </a>
          </li>
        </ul>
        <hr>
        <!-- アイコン -->
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../IMAGES/cat.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>吾輩は猫</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">プロフィール変更</a></li>
            <li><a class="dropdown-item" href="#">パスワード変更</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">ログアウト</a></li>
          </ul>
        </div>
      </nav>
      <!-- トップナビゲーションバー -->
      <nav class="navbar navbar-dark bg-dark text-bg-dark-custom d-md-none" aria-label="First navbar example">
        <div class="container-fluid">
          <a href="/" class="navbar-brand">
            <image src="../IMAGES/asologo.png" width=auto height="32">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample01">
            <ul class="navbar-nav me-auto mb-2">
              <!-- トップ -->
              <li class="nav-item">
                <a href="top.php" class="nav-link text-white" aria-current="page">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#search"/></svg>
                  トップ
                </a>
              </li>
              <!-- トーク -->
              <li class="nav-item">
                <a href="talk.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#chat-dots"/></svg>
                  トーク
                </a>
              </li>
              <!-- 選考状況 -->
              <li class="nav-item">
                <a href="senkou.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  選考状況
                </a>
              </li>
              <!-- 受験報告 -->
              <li class="nav-item">
                <a href="zyukenhoukokukanryo.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#file-earmark-text"/></svg>
                  受験報告
                </a>
              </li>
              <!-- マイページ -->
              <li class="nav-item">
                <a href="mypage.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  マイページ
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">アカウントの設定</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">プロフィール変更</a></li>
                  <li><a class="dropdown-item" href="#">パスワード変更</a></li>
                  <li><a class="dropdown-item" href="#">ログアウト</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- メインコンテンツ -->
      <main class="content container-fluid">
        <h1>メインコンテンツ</h1>
        <p>ここにメインコンテンツが表示されます。</p>
      </main>
    </div>

    <!-- bootstrap.Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../SCRIPT/sidebars.js"></script>
  </body>
</html>
