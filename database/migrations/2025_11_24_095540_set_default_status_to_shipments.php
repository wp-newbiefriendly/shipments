<?php

use App\Models\Shipment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shipment', function (Blueprint $table) {
            $table->string('status', 20)
                ->default(Shipment::STATUS_UNASSIGNED)
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('shipment', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
