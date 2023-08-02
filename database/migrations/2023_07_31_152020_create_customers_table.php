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
    Schema::create('customers', function (Blueprint $table) {

      $table->id();
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 50);

      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users')
        ->cascadeOnUpdate()->restrictOnDelete();

      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customers');
  }
};

// INSERT INTO customers (name, email, mobile, user_id, created_at, updated_at)
// SELECT
//     CONCAT(firstName, ' ', lastName) AS name,
//     email,
//     mobile,
//     id AS user_id,
//     NOW() AS created_at,
//     NOW() AS updated_at
// FROM users
// ORDER BY RAND()
// LIMIT 10;
