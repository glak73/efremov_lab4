@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 mt-4">
        <h1 class="text-3xl font-bold mb-4">Список товаров</h1>
        <form action="{{ route('product.search') }}" method="GET" class="mt-4 flex items-center">
            <input type="text" name="q" placeholder="Поиск продуктов..." class="w-full" />
            <button type="submit" class="ml-2">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset($product->primary_image) }}" alt="Основное изображение"
                                class="w-full h-48 object-cover">

                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                                <p class="mb-2"><span class="font-medium">Категория:</span> {{ $product->category }} /
                                    {{ $product->subcategory }}</p>
                                <p class="mb-2"><span class="font-medium">Описание:</span>
                                    {{ Str::limit($product->description, 150) }}</p>
                                <p class="mb-2"><span class="font-medium">Цена:</span>
                                    {{ number_format($product->price, 2, ',', ' ') }} ₽</p>

                                <div class="flex justify-between items-center mt-4">
                                    @if ($product->secondary_image)
                                        <img src="{{ asset($product->secondary_image) }}" alt="Дополнительное изображение"
                                            class="w-24 h-24 object-cover rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out">
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Узнать подробнее
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
    </div>
@endsection
