<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 48)->unique();
            $table->string('name', 140);
            $table->decimal('price_usd', 10, 2);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });

        Schema::create('debtor_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 120);
            $table->string('phone', 32);
            $table->decimal('custom_bcv_rate', 12, 4)->nullable();
            $table->boolean('is_settled')->default(false);
            $table->timestamps();
        });

        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debtor_account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['charge', 'credit']);
            $table->decimal('amount_usd', 10, 2);
            $table->string('payment_method', 40)->nullable();
            $table->string('description', 255)->nullable();
            $table->timestamp('recorded_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ledger_entries');
        Schema::dropIfExists('debtor_accounts');
        Schema::dropIfExists('products');
    }
};
