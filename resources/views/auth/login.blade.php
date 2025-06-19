@extends('layouts.app')

@section('content')
    <section class="container">
        <?
            echo app('tao.frontend')->templates()->renderBlock(
                'common/title',
                [
                    'title' => 'На взлет',

                ]
            );
            echo app('tao.frontend')->templates()->renderBlock(
                'auth/auth-login',[
                        'errors' => $errors,
                ]
            )
            ?>
    </section>
@endsection