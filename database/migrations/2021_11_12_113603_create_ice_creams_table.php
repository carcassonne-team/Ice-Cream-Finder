<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIceCreamsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("ice_creams", function (Blueprint $table): void {
            $table->id();
            $table->boolean("available");
            $table->unsignedBigInteger("ice_cream_shop_id");
            $table->foreign("ice_cream_shop_id")->references("id")->on("ice_cream_shops")
                ->onDelete("cascade");
            $table->unsignedBigInteger("flavor_id");
            $table->foreign("flavor_id")->references("id")->on("flavors")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ice_creams");
    }
}
