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
        Schema::create('categoria', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('categoria', 50);
            $table->string('descripcion', 250)->nullable();
            $table->tinyInteger('estatus')->nullable();
            $table->timestamps();
        });

        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_productos');
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->integer('stock')->nullable();
            $table->string('descripcion', 512)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->string('estatus', 20)->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('persona', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('tipo_persona', 20)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('tipo_documento', 20)->nullable();
            $table->string('nro_documento', 15)->nullable();
            $table->string('direccion', 70)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('ingreso', function (Blueprint $table) {
            $table->id('id_ingreso');
            $table->string('tipo_comprobante', 20)->nullable();
            $table->string('nro_comprobante', 10)->nullable();
            $table->dateTime('fecha_hora')->nullable();
            $table->decimal('impuesto', 4, 2)->nullable();
            $table->string('estado', 20)->nullable();
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id_persona')->on('persona')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id('id_detalle_ingreso');
            $table->integer('cantidad')->nullable();
            $table->decimal('precio_compra', 11, 2)->nullable();
            $table->decimal('precio_venta', 11, 2)->nullable();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_ingreso');
            $table->foreign('id_producto')->references('id_productos')->on('producto')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingreso')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->string('tipo_comprobante', 20)->nullable();
            $table->string('nro_comprobante', 10)->nullable();
            $table->dateTime('fecha_hora')->nullable();
            $table->decimal('impuesto', 4, 2)->nullable();
            $table->decimal('total_venta', 11, 2)->nullable();
            $table->string('estado', 20)->nullable();
            $table->unsignedBigInteger('persona_id_persona');
            $table->foreign('persona_id_persona')->references('id_persona')->on('persona')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');
            $table->unsignedBigInteger('id_venta')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio_venta', 11, 2)->nullable();
            $table->decimal('descuento')->nullable();
            $table->unsignedBigInteger('producto_id_productos');
            $table->unsignedBigInteger('venta_id_venta');
            $table->foreign('producto_id_productos')->references('id_productos')->on('producto')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('venta_id_venta')->references('id_venta')->on('venta')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('venta');
        Schema::dropIfExists('detalle_ingreso');
        Schema::dropIfExists('ingreso');
        Schema::dropIfExists('persona');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('categoria');
    }
};
