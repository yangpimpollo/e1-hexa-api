<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE customers (
                dni VARCHAR(20) PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                birthdate DATE NULL,
                gender VARCHAR(50) NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                phone VARCHAR(50) NULL,
                address VARCHAR(255) NULL,
                city VARCHAR(100) NULL,
                state VARCHAR(100) NULL
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS customers");
    }
};
