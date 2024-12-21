@extends('layouts.app')

@section('content')
    <h1>Добро пожаловать!</h1>
    <p>
        на данной странице вы можете ознакомиться со списком товаров, доступных в нашем магазине, если вы хотите узнать подробности о каком либо из товаров - перейдите по <a href="{{route('product.index')}}">ссылке</a>
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($product->primary_image) }}" alt="Основное изображение" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                    <p class="mb-2"><span class="font-medium">Категория:</span> {{ $product->category }} /
                        {{ $product->subcategory }}</p>
                    <p class="mb-2"><span class="font-medium">Описание:</span> {{ Str::limit($product->description, 150) }}
                    </p>
                    <p class="mb-2"><span class="font-medium">Цена:</span>
                        {{ number_format($product->price, 2, ',', ' ') }} ₽</p>

                    <div class="flex justify-between items-center mt-4">
                        @if ($product->secondary_image)
                            <img src="{{ asset($product->secondary_image) }}" alt="Дополнительное изображение"
                                class="w-24 h-24 object-cover rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{ $products->links() }}
    </div>
@endsection('content')
