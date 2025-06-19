<div class="{{ $block->mod($mods ?? []) }}@if ($class ?? false) {{ $class }} @endif">

    <form class="{{ $block->elem('form') }}" method="POST" action="{{ route('login') }}">
    @csrf

    @error('email')
        <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
    @enderror

    <div class="{{ $block->elem('group') }}">
        <label for="email">Email</label>
        <input type="email"
               class="{{ $block->elem('input') }}"
               id="email"
               name="email"
               value="{{ old('email') }}"
               autocomplete="email"
               autofocus>
    </div>

    @error('password')
        <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
    @enderror

    <div class="{{ $block->elem('group') }}">
        <label for="password">Пароль</label>
        <input type="password"
               class="{{ $block->elem('input') }}"
               id="password"
               name="password"
               required
               autocomplete="current-password">
    </div>

    <div class="{{ $block->elem('group') }}">
        <label class="{{ $block->elem('checkbox-label') }}">
            <input type="checkbox"
                   class="{{ $block->elem('checkbox') }}"
                   name="remember"
                   id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            Запомнить меня
        </label>
    </div>

    <div class="{{ $block->elem('actions') }}">
        <button type="submit" class="{{ $block->elem('button') }} {{ $block->elem('button')->mod('primary') }}">
            Войти
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="{{ $block->elem('link') }}">
                Забыли пароль?
            </a>
        @endif
    </div>
</form>


</div>