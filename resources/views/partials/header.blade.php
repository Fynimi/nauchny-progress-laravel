<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo">Научный прогресс</a>

        <nav class="nav">
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('category', \App\Models\Category::first()->id ?? 1) }}">Категория</a>

            @auth
                @if (auth()->user()->hasRole('journalist') || auth()->user()->hasRole('admin'))
                    <a href="{{ route('journalist.create') }}">Журналист</a>
                @endif

                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.index') }}">Админ</a>
                @endif
            @endauth
        </nav>

        <div class="auth">
            @guest
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @else
                <span>{{ auth()->user()->login }} ({{ auth()->user()->role->name }})</span>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="link-btn">Выход</button>
                </form>
            @endguest
        </div>
    </div>
</header>
