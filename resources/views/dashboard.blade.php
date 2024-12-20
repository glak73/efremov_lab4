@extends('layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->is_admin)
            <h3 class="text-lg font-semibold mt-4">Список товаров</h3>
            <table class="min-w-full bg-white border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">Название</th>
                        <th class="px-4 py-2 text-left">Категория</th>
                        <th class="px-4 py-2 text-left">Подкатегория</th>
                        <th class="px-4 py-2 text-left">Цена</th>
                        <th class="px-4 py-2 text-center">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->category }}</td>
                            <td class="border px-4 py-2">{{ $product->subcategory }}</td>
                            <td class="border px-4 py-2">${{ $product->price }}</td>
                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-500">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @endif
@endsection
