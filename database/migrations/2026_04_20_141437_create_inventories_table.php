<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TABLE inventories (
                store_id VARCHAR(255) NOT NULL,
                product_id CHAR(5) NOT NULL,
                quantity INTEGER DEFAULT 0,

                PRIMARY KEY (store_id, product_id),

                CONSTRAINT fk_store 
                    FOREIGN KEY (store_id) REFERENCES stores(id) 
                    ON DELETE CASCADE,
                
                CONSTRAINT fk_product 
                    FOREIGN KEY (product_id) REFERENCES products(product_id) 
                    ON DELETE CASCADE
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS inventories");
    }
};
