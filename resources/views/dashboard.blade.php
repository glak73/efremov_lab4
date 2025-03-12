@extends('layouts.app')

@section('content')
    @if(auth()->check() && auth()->user()->is_admin)
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h3 class="text-xl font-semibold mb-6">Список товаров</h3>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Название</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Категория</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Подкатегория</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Цена</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $product->name }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $product->category }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $product->subcategory }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">${{ $product->price }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h3 class="text-xl font-semibold mb-6">Список заказов</h3>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">ID пользователя</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Статус заказа</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider">Заказ создан</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider">Заказ обновлен</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider">Стоимость заказа</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $order->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $order->user_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $order->status }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">{{ $order->created_at }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">{{ $order->updated_at }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">${{ $order->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
