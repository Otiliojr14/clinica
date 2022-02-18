<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cl_personal_id_nurse')->unsigned();
            $table->integer('cl_personal_id_medical')->unsigned();
            $table->integer('unv_personal_id');
            $table->text('sintomas_respiratorios');
            $table->decimal('peso', 3);
            $table->decimal('talla', 4);
            $table->decimal('circunferencia', 4);
            $table->tinyInteger('arterial_diastolica');
            $table->tinyInteger('arterial_sistolica');
            $table->tinyInteger('frecuencia_cardiaca');
            $table->tinyInteger('frecuencia_respiratoria');
            $table->decimal('temperatura', 2);
            $table->boolean('saturacion_oxigeno');
            $table->boolean('glucosa_ayuno');
            $table->boolean('tb_sintomas');
            $table->decimal('imc', 3);
            $table->text('discapacidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
};
