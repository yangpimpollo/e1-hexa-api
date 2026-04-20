<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TABLE categories (
                category_id CHAR(1) PRIMARY KEY,
                category_name VARCHAR(100) NOT NULL
            );

            INSERT INTO categories (category_id, category_name) VALUES 
            ('A', 'Pizzas Clásicas'),
            ('B', 'Pizzas Especiales'),
            ('C', 'Empanadas'),
            ('D', 'Entradas u otros'),
            ('E', 'Bebidas');
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS categories");
    }
};
