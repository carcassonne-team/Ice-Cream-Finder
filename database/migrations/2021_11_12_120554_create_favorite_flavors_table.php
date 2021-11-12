<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteFlavorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("favorite_flavors", function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->unsignedBigInteger("ice_cream_id");
            $table->foreign("ice_cream_id")->references("id")->on("ice_creams")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("favorite_flavors");
    }
}
