<div class="{{ $block->mod($mods ?? []) }}@if ($class ?? false) {{ $class }} @endif">
    <form class="{{ $block->elem('form') }}" method="POST" action="{{ route('register') }}">
        @csrf

        @error('name')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="name" class="{{ $block->elem('label') }}">Имя</label>
            <input type="text" class="{{ $block->elem('input') }}" id="name" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        @error('email')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="email" class="{{ $block->elem('label') }}">Email</label>
            <input type="email" class="{{ $block->elem('input') }}" id="email" name="email"
                value="{{ old('email') }}" required autocomplete="email">
        </div>

        @error('password')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="password" class="{{ $block->elem('label') }}">Пароль</label>
            <input type="password" class="{{ $block->elem('input') }}" id="password" name="password" required
                autocomplete="new-password">
        </div>

        <div class="{{ $block->elem('group') }}">
            <label for="password-confirm" class="{{ $block->elem('label') }}">Подтвердите пароль</label>
            <input type="password" class="{{ $block->elem('input') }}" id="password-confirm"
                name="password_confirmation" required autocomplete="new-password">
        </div>

        @auth
            @if(auth()->user()->role_id == 1) 
                @error('role_id')
                    <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
                @enderror
                <div class="{{ $block->elem('group') }}">
                    <label for="role_id" class="{{ $block->elem('label') }}">Роль</label>
                    <select class="{{ $block->elem('select') }}" id="role_id" name="role_id" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endauth

        <div class="{{ $block->elem('actions') }}">
            <button type="submit" class="{{ $block->elem('button') }} {{ $block->elem('button')->mod('primary') }}">
                Зарегистрироваться
            </button>

            @if (Route::has('login'))
                <div class="{{ $block->elem('login-link') }}">
                    Уже есть аккаунт?
                    <a href="{{ route('login') }}" class="{{ $block->elem('link') }}">
                        Войти
                    </a>
                </div>
            @endif
        </div>
    </form>
</div>
