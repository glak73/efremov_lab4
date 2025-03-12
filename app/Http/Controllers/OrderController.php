<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Предположим, что у вас есть модель Order

class OrderController extends Controller
{
    // Метод для добавления заказа
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'user_id'=> 'required|numeric',
        ]);

        // Создание нового заказа
        $order = Order::create($validatedData);

        // Возвращаем ответ (например, JSON с данными о созданном заказе)
        // return response()->json([
        //     'message' => 'Order created successfully!',
        //     'order' => $order,
        // ], 201);
    return redirect()->route('dashboard');
    }

    // Метод для удаления заказа
    public function destroy($id)
    {
        // Поиск заказа по ID
        $order = Order::find($id);

        // Если заказ не найден, возвращаем ошибку
        if (!$order) {
            return response()->json([
                'message' => 'Order not found!',
            ], 404);
        }

        // Удаление заказа
        $order->delete();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Order deleted successfully!',
        ], 200);
    }
}
