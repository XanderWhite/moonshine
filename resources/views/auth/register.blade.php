@extends('layouts.app')

@section('content')

 <section class="container">
        <?
            echo app('tao.frontend')->templates()->renderBlock(
                'common/title',
                [
                    'title' => 'Посадка',

                ]
            );
            echo app('tao.frontend')->templates()->renderBlock(
                'auth/auth-register',[
                        'errors' => $errors,
                        'roles'=> $roles
                ]
            )
            ?>
    </section>

@endsection
