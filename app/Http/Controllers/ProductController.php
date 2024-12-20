<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
{
    if (!Auth::user() || !Auth::user()->is_admin) {
        abort(403);
    }

    // Валидация входных данных
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'primary_image' => 'required|image',
        'category' => 'required|max:30',
        'subcategory' => 'required|max:30',
    ]);

    // Обработка изображений
    if ($request->hasFile('secondary_image')) {
        $imageName = uniqid() . '.' . $request->secondary_image->extension();
        $watermarkText ='текст вотермарки';

        $img = imagecreatefromstring(file_get_contents($request->secondary_image));
        $watermarkColor = imagecolorallocate($img, 255, 0, 0);

        imagestring($img, 5, 0, 0, $watermarkText, $watermarkColor);

        imagepng($img, public_path('secondary_images/' . $imageName));

        imagedestroy($img);

        $validatedData['secondary_image'] = '/secondary_images/' . $imageName;
    }

    // Обработка основного изображения
    $imageName = uniqid() . '.' . $request->primary_image->extension();

    $watermarkText = date("Y-m-d H:i:s");

    $img = imagecreatefromstring(file_get_contents($request->primary_image));
    $watermarkColor = imagecolorallocate($img, 255, 255, 0); // Желтый цвет

    imagestring($img, 5, 0, 0, $watermarkText, $watermarkColor);

    // Сохраняем изображение с водяным знаком
    imagepng($img, public_path('images/' . $imageName));

    imagedestroy($img);

    $validatedData['primary_image'] = '/images/' . $imageName;

    // Создание продукта с обработанными изображениями
    Product::create($validatedData);

    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
