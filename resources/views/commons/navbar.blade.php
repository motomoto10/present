<header class="mb-4">
    <nav class="navbar navbar-expand-sm top_navbar">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand navbar-font" href="/">Present</a>

        <button type="button" class="navbar-toggler navbar-font" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'User一覧', [], ['class' => 'nav-link navbar-font']) !!}</li>
                    {{-- ユーザ詳細ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.show', 'Mypage', ['user' => Auth::id()],['class' => 'nav-link navbar-font']) !!}</li>
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト',[],['class' => 'nav-link navbar-font']) !!}</li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link navbar-font']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link navbar-font']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>