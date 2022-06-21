<?php

use App\Models\Fitur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Fitur::class);
            $table->string('nama_aksi');
            $table->string('status'); // proses | selesai | ubah | sembunyikan
            $table->string('akses')->nullable();
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aksi');
    }
}
