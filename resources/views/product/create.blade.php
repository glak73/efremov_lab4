@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Добавление нового продукта</h1>

    <form method="POST" action="{{ route('product.store') }}" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold mb-1">Название продукта</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-300 @error('name') border-red-500 @enderror" required>
            @error('name')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold mb-1">Описание продукта</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-300 @error('description') border-red-500 @enderror" required></textarea>
            @error('description')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category" class="block text-sm font-semibold mb-1">категория</label>
            <textarea name="category" id="category" rows="1" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-300 @error('description') border-red-500 @enderror" required></textarea>
            @error('category')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="subcategory" class="block text-sm font-semibold mb-1">подкатегория</label>
            <textarea name="subcategory" id="subcategory" rows="1" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-300 @error('description') border-red-500 @enderror" required></textarea>
            @error('subcategory')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="price" class="block text-sm font-semibold mb-1">Цена</label>
            <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-300 @error('price') border-red-500 @enderror" required>
            @error('price')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="primary_image" class="block text-sm font-semibold mb-1">Изображение товара</label>
            <input type="file" name="primary_image" id="primary_image" class="@error('primary_image') border-red-500 @enderror">
            @error('primary_image')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="secondary_image" class="block text-sm font-semibold mb-1">Изображение товара</label>
            <input type="file" name="secondary_image" id="secondary_image" class="border-red-500 ">
            @error('secondary_image')
                <div class="mt-1 text-xs text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Добавить товар</button>
    </form>
</div>
@endsection
