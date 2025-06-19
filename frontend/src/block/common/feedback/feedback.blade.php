<div class="{{ $block->mod($mods ?? []) }}@if ($class ?? false) {{ $class }} @endif">
    @if (session('success'))
        <p class="{{ $block->elem('success') }}">{{ session('success') }}</p>
    @endif

    {{-- @if (session()->has('errors'))
        <ul class="{{ $block->elem('errors') }}">
            @foreach (session('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form class="{{ $block->elem('form') }}" method='POST' action='{{ route('feedback.submit') }}'
        enctype="multipart/form-data">

        @csrf
        @error('name')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="name">Ваше имя</label>
            <input type="text" class="{{ $block->elem('input') }} " id="name" name="name"
                value="{{ old('name') }}">

        </div>
        @error('email')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="email">Email</label>
            <input type="email" class="{{ $block->elem('input') }} " id="email" name="email"
                value="{{ old('email') }}">

        </div>
        @error('message')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="message">Сообщение</label>
            <textarea class="{{ $block->elem('input') }} " id="message" name="message" rows="5">{{ old('message') }}</textarea>

        </div>
        @error('attachments')
            <div class="{{ $block->elem('errors') }}">{{ $message }}</div>
        @enderror
        <div class="{{ $block->elem('group') }}">
            <label for="attachment">Прикрепить файл </label>
            <input type="file" class="{{ $block->elem('input') }}" id="attachment" name="attachments[]" multiple>
            <small class="{{ $block->elem('file-info') }}">Можно выбрать несколько файлов (макс. 5MB каждый, разрешены:
                PDF, JPG, PNG, DOC)</small>
        </div>

        <button type="submit" class="{{ $block->elem('button') }}">Отправить</button>

    </form>

</div>
