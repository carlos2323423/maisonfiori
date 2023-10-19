<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });            
        }

        if (!Schema::hasTable('password_resets')) {
            Schema::create('password_resets', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('failed_jobs')) {
            Schema::create('failed_jobs', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('personal_access_tokens')) {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('hotels')) {
            Schema::create('hotels', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('nivels')) {
            Schema::create('nivels', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('niveles')) {
            Schema::create('niveles', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('areas')) {
            Schema::create('areas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('empleados')) {
            Schema::create('empleados', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('empleados_areas')) {            
            Schema::create('empleados_areas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }        

        if (!Schema::hasTable('factoresdesempeno')) {
            Schema::create('factoresdesempeno', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('competenciaslaborales')) {
            Schema::create('competenciaslaborales', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('preguntas')) {
            Schema::create('preguntas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('usuarios')) {
            Schema::create('usuarios', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('campos_de_evaluacions')) {
            Schema::create('campos_de_evaluacions', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('escala_calificacions')) {
            Schema::create('escala_calificacions', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('graphics')) {
            Schema::create('graphics', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('competencias')) {
            Schema::create('competencias', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('competency_levels')) {
            Schema::create('competency_levels', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('employee_skills')) {
            Schema::create('employee_skills', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('ejes')) {
            Schema::create('ejes', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('datos_grafico')) {
            Schema::create('datos_grafico', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('descripcion_grafico')) {
            Schema::create('descripcion_grafico', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('calificaciones')) {
            Schema::create('calificaciones', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cargos')) {
            Schema::create('cargos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('contrataciones')) {
            Schema::create('contrataciones', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('contexto_contratacion')) {
            Schema::create('contexto_contratacion', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('jornadas')) {
            Schema::create('jornadas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('indicadores')) {
            Schema::create('indicadores', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('indicadores_empleado')) {
            Schema::create('indicadores_empleado', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('indicadores_hotel')) {
            Schema::create('indicadores_hotel', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('indicadores_area')) {
            Schema::create('indicadores_area', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cuestionarios')) {
            Schema::create('cuestionarios', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tareas')) {
            Schema::create('tareas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('asignaciones')) {
            Schema::create('asignaciones', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('registros_entrada')) {
            Schema::create('registros_entrada', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('registros_salida')) {
            Schema::create('registros_salida', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('evaluaciones_desempenio')) {
            Schema::create('evaluaciones_desempenio', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('evaluaciones_competencias')) {
            Schema::create('evaluaciones_competencias', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('evaluaciones_360')) {
            Schema::create('evaluaciones_360', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('objetivos')) {
            Schema::create('objetivos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('empleados_modelos')) {
            Schema::create('empleados_modelos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        // Agregar más tablas según sea necesario.

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('nivels');
        Schema::dropIfExists('niveles');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('factoresdesempeno');
        Schema::dropIfExists('competenciaslaborales');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('campos_de_evaluacions');
        Schema::dropIfExists('escala_calificacions');        
        Schema::dropIfExists('graphics');
        Schema::dropIfExists('competencias');
        Schema::dropIfExists('competency_levels');
        Schema::dropIfExists('employee_skills');
        Schema::dropIfExists('ejes');
        Schema::dropIfExists('datos_grafico');
        Schema::dropIfExists('descripcion_grafico');
        Schema::dropIfExists('calificaciones');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('contrataciones');
        Schema::dropIfExists('contexto_contratacion');
        Schema::dropIfExists('jornadas');
        Schema::dropIfExists('indicadores');
        Schema::dropIfExists('indicadores_empleado');
        Schema::dropIfExists('indicadores_hotel');
        Schema::dropIfExists('indicadores_area');
        Schema::dropIfExists('cuestionarios');        
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('asignaciones');
        Schema::dropIfExists('registros_entrada');
        Schema::dropIfExists('registros_salida');
        Schema::dropIfExists('evaluaciones_desempenio');
        Schema::dropIfExists('evaluaciones_competencias');
        Schema::dropIfExists('evaluaciones_360');
        Schema::dropIfExists('objetivos');
        Schema::dropIfExists('empleados_modelos');
        // Agregar eliminaciones de más tablas según sea necesario.
    }
}

