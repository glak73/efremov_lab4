<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Автоинкрементный первичный ключ
            $table->unsignedBigInteger('user_id'); // Айди пользователя, заказавшего товар
            $table->string('product_name'); // Название товара
            $table->string('status')->default('pending'); // Статус заказа, по умолчанию "pending"
            $table->timestamps(); // Поля created_at и updated_at
            $table->unsignedBigInteger('price');
            // Внешний ключ для связи с таблицей пользователей
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
