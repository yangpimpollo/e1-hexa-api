<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TABLE stores (
                id VARCHAR(255) PRIMARY KEY,
                store_name VARCHAR(255) NOT NULL,
                address VARCHAR(255) NULL,
                city VARCHAR(255) NULL,
                state VARCHAR(255) NULL
            );

            INSERT INTO stores (id, store_name) 
            VALUES ('AA-AAA-00', 'Default Store');
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS stores");
    }
};
