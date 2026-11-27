<div class="card">
    <h2 class="card-title">{{ $text->heading }}</h2>
    <p class="card-meta">
        Категория: <a href="{{ route('category', $text->category_id) }}">{{ $text->category->name }}</a>
        | Автор: {{ $text->user->login }}
        | {{ $text->created_at->format('d.m.Y H:i') }}
    </p>
</div>
