<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE TABLE products (
                product_id CHAR(5) PRIMARY KEY,
                category_id CHAR(1) NOT NULL,
                product_name VARCHAR(100) NOT NULL,
                description TEXT NULL,
                product_price DECIMAL(8, 2) NOT NULL,
                
                CONSTRAINT fk_category 
                    FOREIGN KEY (category_id) 
                    REFERENCES categories(category_id)
                    ON DELETE CASCADE
            );

        INSERT INTO products (product_id, category_id, product_name, description, product_price) 
        VALUES
            ('A-001','A', 'Muzzarella', 'salsa de tomate, muzzarella, aceitunas', 15.50),
            ('A-002', 'A', 'Napolitana', 'Muzzarella, tomate en rodajas, ajo, perejil', 18.20),
            ('A-003', 'A', 'Fugazza', 'Cebolla en juliana, aceite de oliva, orégano', 14.80),
            ('A-004', 'A', 'Fugazzetta', 'Cebolla con base de muzzarella', 17.50),
            ('A-005', 'A', 'Jamón y Morrón', 'Muzzarella, jamón cocido, morrones asados', 19.40),
            ('A-006', 'A', 'Calabresa', 'Muzzarella, longaniza calabresa, aceitunas negras', 19.90),
            ('A-007', 'A', 'Margarita', 'Tomate, muzzarella fresca, albahaca', 16.90),
            ('A-008', 'A', 'Pepperoni', 'Muzzarella y abundante pepperoni americano', 20.50),
            ('A-009', 'A', 'Marinara', 'Salsa de tomate, ajo, aceite de oliva, orégano', 14.00),
            ('A-010', 'A', 'Prosciutto', 'Muzzarella y jamón crudo de primera calidad', 22.00),
            ('B-001', 'B', 'Cuatro Quesos', 'Muzzarella, parmesano, roquefort, provolone', 21.80),
            ('B-002', 'B', 'Hawaiana', 'Muzzarella, jamón cocido y piña', 19.50),
            ('B-003', 'B', 'Jamón y Palmitos', 'Muzzarella, jamón, palmitos y salsa golf', 22.50),
            ('B-004', 'B', 'Rúcula y Crudo', 'Muzzarella, jamón crudo, rúcula, parmesano', 23.40),
            ('B-005', 'B', 'Champignones', 'Salsa de tomate, muzzarella, hongos frescos', 21.00),
            ('B-006', 'B', 'Barbacoa', 'Pollo, cebolla morada, salsa barbacoa', 21.50),
            ('B-007', 'B', 'Carbonara', 'Crema, panceta, huevo, pimienta negra', 22.20),
            ('B-008', 'B', 'Vegetariana', 'Mix de vegetales de estación asados', 18.90),
            ('B-009', 'B', 'Pollo y Catupiry', 'Pollo desmenuzado con queso crema suave', 21.00),
            ('B-010', 'B', 'Cuatro Estaciones', 'Cuatro secciones con distintos ingredientes', 20.80),
            ('B-011', 'B', 'Fugazzetta Rellena', 'Doble masa rellena con muzzarella y cebolla', 24.50),
            ('B-012', 'B', 'Tex-Mex', 'Carne picada, jalapeños, cheddar, cebolla', 22.80),
            ('B-013', 'B', 'Caprese', 'Muzzarella, tomate cherry, albahaca fresca', 18.50),
            ('B-014', 'B', 'Panceta y Huevo', 'Muzzarella, panceta crocante, huevo frito', 21.90),
            ('B-015', 'B', 'Pesto y Nueces', 'Muzzarella, pesto genovés y nueces picadas', 20.40),
            ('C-001', 'C', 'Carne Suave', 'Carne vacuna, cebolla, condimentos clásicos', 1.80),
            ('C-002', 'C', 'Carne Picante', 'Carne vacuna con ají molido y pimentón', 1.80),
            ('C-003', 'C', 'Jamón y Queso', 'Jamón cocido y mezcla de quesos derretidos', 1.70),
            ('C-004', 'C', 'Pollo', 'Pollo desmechado con verdeo y huevo', 1.75),
            ('C-005', 'C', 'Humita', 'Choclo cremoso, salsa blanca y queso', 1.70),
            ('C-006', 'C', 'Roquefort y Apio', 'Queso azul, muzzarella y apio picado', 1.90),
            ('C-007', 'C', 'Caprese (Emp)', 'Tomate, albahaca y muzzarella', 1.75),
            ('C-008', 'C', 'Verdura', 'Espinaca, salsa blanca y parmesano', 1.70),
            ('C-009', 'C', 'Cebolla y Queso', 'Abundante cebolla caramelizada y muzzarella', 1.70),
            ('C-010', 'C', 'Salchicha y Cheddar', 'Salchicha tipo viena y queso cheddar', 1.85),
            ('D-001', 'D', 'Fainá Clásica', 'Porción de harina de garbanzos tradicional', 2.50),
            ('D-002', 'D', 'Fainá con Cebolla', 'Fainá cubierta con cebolla crocante', 2.80),
            ('D-003', 'D', 'Pan de Ajo (4u)', 'Rodajas de pan horneadas con mantequilla de ajo', 3.20),
            ('D-004', 'D', 'Bastones de Mozz.', 'Deditos de queso empanizados y fritos', 4.50),
            ('D-005', 'D', 'Papas Fritas', 'Porción grande de papas clásicas', 4.00),
            ('D-006', 'D', 'Papas con Cheddar', 'Papas fritas con salsa cheddar y panceta', 5.20),
            ('D-007', 'D', 'Ensalada César', 'Lechuga, pollo, croutons, aderezo césar', 6.50),
            ('E-001', 'E', 'Agua Mineral', 'Con o sin gas (500ml)', 1.50),
            ('E-002', 'E', 'Gaseosa 500ml', 'Línea Coca-Cola o similar', 1.80),
            ('E-003', 'E', 'Gaseosa 1.5L', 'Ideal para compartir en mesa', 3.50),
            ('E-004', 'E', 'Cerveza Lata', 'Variedad rubia o roja (473ml)', 2.80),
            ('E-005', 'E', 'Cerveza 1L', 'Botella retornable o descartable', 4.50),
            ('E-006', 'E', 'Vino de la Casa', 'Tinto o blanco joven (750ml)', 5.80),
            ('E-007', 'E', 'Limonada Casera', 'Con menta y jengibre (jarra)', 3.90),
            ('E-008', 'E', 'Jugo Natural', 'Naranja exprimida en el momento', 2.50);
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS products");
    }
};
