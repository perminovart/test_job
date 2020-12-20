@extends('layouts.app')

@section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <main class="py-4">
                        @include('addplate')
                    </main> 
                    @else
                    <h1 class="blockquote text-center">Для редактирования необходимо авторизоваться</h1>
                    @endauth
                </div>
                <main class="py-4">
                    @include('showplate')
                </main> 
            @endif
            
        </div>
        
@endsection