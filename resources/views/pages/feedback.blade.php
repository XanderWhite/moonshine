@extends('layouts.app')

@section('content')
    <section class="container">
        <?
        echo app('tao.frontend')->templates()->renderBlock(
            'common/title',
            [
                'title' => 'Форма обратной связи',

            ]
        );
        echo app('tao.frontend')->templates()->renderBlock(
            'common/feedback',[
                    'errors' => $errors,
            ]
        )
        ?>
    </section>
@endsection
