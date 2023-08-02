<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('category_id');

      $table->foreign('user_id')->references('id')->on('users')
        ->cascadeOnUpdate()->restrictOnDelete();

      $table->foreign('category_id')->references('id')->on('categories')
        ->cascadeOnUpdate()->restrictOnDelete();

      $table->string('name', 100);
      $table->string('price', 50);
      $table->string('unit', 50);
      $table->string('img_url', 100);

      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};



// INSERT INTO products (user_id, category_id, name, price, unit, img_url, created_at, updated_at)
// VALUES
//     (1, 1, 'Apple', '1.50', 'per piece', 'https://example.com/apple.jpg', NOW(), NOW()),
//     (2, 1, 'Banana', '0.75', 'per piece', 'https://example.com/banana.jpg', NOW(), NOW()),
//     (3, 2, 'T-Shirt', '19.99', 'each', 'https://example.com/tshirt.jpg', NOW(), NOW()),
//     (1, 3, 'Headphones', '49.99', 'per pair', 'https://example.com/headphones.jpg', NOW(), NOW()),
//     (2, 4, 'Book: The Great Gatsby', '12.95', 'each', 'https://example.com/book.jpg', NOW(), NOW()),
//     (3, 5, 'Toy Car', '7.50', 'per piece', 'https://example.com/toy_car.jpg', NOW(), NOW()),
//     (4, 6, 'Lipstick', '9.99', 'each', 'https://example.com/lipstick.jpg', NOW(), NOW()),
//     (5, 7, 'Soccer Ball', '19.95', 'each', 'https://example.com/soccer_ball.jpg', NOW(), NOW()),
//     (4, 8, 'Decorative Pillow', '29.50', 'each', 'https://example.com/pillow.jpg', NOW(), NOW()),
//     (3, 9, 'Gardening Gloves', '12.00', 'per pair', 'https://example.com/gloves.jpg', NOW(), NOW());