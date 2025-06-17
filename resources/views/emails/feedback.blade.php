@component('mail::message')
    # Новое сообщение обратной связи

    **Имя:** {{ $data['name'] }}
    **Email:** {{ $data['email'] }}
    **Сообщение:**
    {{ $data['message'] }}

    @if (isset($attachments) && count($attachments) > 0)
        ## прикрепленные файлы ({{ count($attachments) }})
        @foreach ($attachments as $file)
            - {{ $file['original_name'] }} ({{ number_format($file['size'] / 1024, 2) }} KB)
        @endforeach
    @endif

    @component('mail::button', ['url' => 'mailto:' . $data['email']])
        Ответить отправителю
    @endcomponent

@endcomponent
