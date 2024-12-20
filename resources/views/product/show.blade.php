@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 mt-4">
    <h1 class="text-3xl font-bold mb-4">Информация о товаре</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset($product->primary_image) }}" alt="Основное изображение" class="w-full h-64 object-cover">

            <div class="p-4">
                <h2 class="text-2xl font-semibold mb-2">{{ $product->name }}</h2>
                <p class="mb-2"><span class="font-medium">Категория:</span> {{ $product->category }} / {{ $product->subcategory }}</p>
                <p class="mb-2"><span class="font-medium">Описание:</span> {{ $product->description }}</p>
                <p class="mb-2"><span class="font-medium">Цена:</span> {{ number_format($product->price, 2, ',', ' ') }} ₽</p>

                @if($product->secondary_image)
                    <img src="{{ asset($product->secondary_image) }}" alt="Дополнительное изображение" class="w-full h-48 object-cover mt-4 border rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out">
                @endif
            </div>
        </div>
    </div>

    <!-- Форма для добавления комментария -->
    <form action="{{ route('comments.store', $product->id) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="comment_body" placeholder="Введите ваш комментарий..." rows="5" class="w-full p-2 border rounded"></textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Добавить комментарий</button>
    </form>

    <!-- Отображение существующих комментариев -->
    <div class="mt-4">
        <h3 class="text-xl font-semibold mb-2">Комментарии:</h3>
        @foreach($product->comments as $comment)
            <div class="border p-2 mb-2 rounded">
                <p>{{ $comment->comment_body }}</p>
                <small class="text-gray-500">Добавлено: {{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
