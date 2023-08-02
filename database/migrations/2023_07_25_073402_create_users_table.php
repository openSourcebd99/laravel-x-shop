<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('firstName', 50);
      $table->string('lastName', 50);
      $table->string('email', 50)->unique();
      $table->string('mobile', 50);
      $table->string('password', 255);
      $table->string('otp', 10)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}

// INSERT INTO users (firstName, lastName, email, mobile, password, otp, created_at, updated_at)
// VALUES
//     ('John', 'Doe', 'john.doe@example.com', '1234567890', 'hashed_password1', NULL, NOW(), NOW()),
//     ('Jane', 'Smith', 'jane.smith@example.com', '9876543210', 'hashed_password2', NULL, NOW(), NOW()),
//     ('Michael', 'Johnson', 'michael.johnson@example.com', '5555555555', 'hashed_password3', NULL, NOW(), NOW()),
//     ('Emily', 'Williams', 'emily.williams@example.com', '6666666666', 'hashed_password4', NULL, NOW(), NOW()),
//     ('William', 'Brown', 'william.brown@example.com', '7777777777', 'hashed_password5', NULL, NOW(), NOW()),
//     ('Olivia', 'Jones', 'olivia.jones@example.com', '9999999999', 'hashed_password6', NULL, NOW(), NOW()),
//     ('James', 'Miller', 'james.miller@example.com', '1111111111', 'hashed_password7', NULL, NOW(), NOW()),
//     ('Sophia', 'Davis', 'sophia.davis@example.com', '2222222222', 'hashed_password8', NULL, NOW(), NOW()),
//     ('Robert', 'Garcia', 'robert.garcia@example.com', '3333333333', 'hashed_password9', NULL, NOW(), NOW()),
//     ('Ava', 'Rodriguez', 'ava.rodriguez@example.com', '4444444444', 'hashed_password10', NULL, NOW(), NOW());
