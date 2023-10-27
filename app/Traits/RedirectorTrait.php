<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

trait RedirectorTrait
{
    public function page_elements(string $page) {
        return require 'RedirectorTrait/page_elements.blade.php';
    }

    public function login() {
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }
        
    public function getTableColumns($tableName, bool $total) {
        return require 'RedirectorTrait/getTableColumns.php';
    }    

    public function traitwelcome() {
        return require 'RedirectorTrait/traitwelcome.php';  
        // return view('welcome2', ['title' => 'Welcome']);
    }    

    public function traitqrgenerator() {        
        return require 'RedirectorTrait/traitqrgenerator.php';          
    }

    public function getChartFunctions($chart, $type, $labels, $title_name, $data) {        
        $parametros_graficacion = array(
            "Gráfico de desempeño individual" => array(
                "Descripción" => "Este tipo de gráfico puede mostrar el desempeño individual de cada empleado en diferentes áreas o habilidades relevantes para su trabajo en el hotel. Puede representar el nivel de competencia en cada área mediante barras o puntos, lo que permite identificar fortalezas y áreas de mejora para cada empleado.",
                "Tipo" => "Gráfico de barras",
                "Ejes" => array(
                    "Vertical" => "Nivel de competencia",
                    "Horizontal" => "Áreas o habilidades"
                ),
                "Datos" => array(
                    "Empleado1" => array(
                        "Atención al cliente" => 8,
                        "Conocimientos técnicos" => 7,
                        "Trabajo en equipo" => 9
                    ),
                    "Empleado2" => array(
                        "Atención al cliente" => 9,
                        "Conocimientos técnicos" => 6,
                        "Trabajo en equipo" => 8
                    ),
                    // Agrega más empleados y sus datos de desempeño aquí
                )
            ),
            "Gráfico de satisfacción del cliente" => array(
                "Descripción" => "Este gráfico muestra la satisfacción del cliente en diferentes aspectos del servicio del hotel, como atención al cliente, limpieza, calidad de las instalaciones, entre otros. Puede ayudar a identificar tendencias y áreas de mejora, así como a evaluar el impacto del desempeño de los empleados en la satisfacción del cliente.",
                "Tipo" => "Gráfico de barras",
                "Ejes" => array(
                    "Vertical" => "Nivel de satisfacción",
                    "Horizontal" => "Aspectos del servicio"
                ),
                "Datos" => array(
                    "Aspecto1" => 7,
                    "Aspecto2" => 8,
                    "Aspecto3" => 6,
                    // Agrega más aspectos y sus niveles de satisfacción aquí
                )
            ),
            "Gráfico de retroalimentación del cliente" => array(
                "Descripción" => "Este tipo de gráfico muestra la retroalimentación específica de los clientes sobre el desempeño de los empleados. Puede incluir comentarios, calificaciones o categorías de satisfacción. Ayuda a identificar patrones y áreas de mejora para cada empleado y permite una evaluación más detallada del servicio al cliente.",
                "Tipo" => "Gráfico de barras",
                "Ejes" => array(
                    "Vertical" => "Nivel de retroalimentación",
                    "Horizontal" => "Empleados"
                ),
                "Datos" => array(
                    "Empleado1" => 8,
                    "Empleado2" => 7,
                    // Agrega más empleados y sus niveles de retroalimentación aquí
                )
            ),
            "Gráfico de desarrollo profesional" => array(
                "Descripción" => "Este gráfico puede mostrar el progreso y desarrollo profesional de los empleados a lo largo del tiempo. Puede representar el nivel de capacitación, certificaciones o logros alcanzados por cada empleado, lo que ayuda a identificar oportunidades de crecimiento y promoción dentro del hotel.",
                "Tipo" => "Gráfico de líneas",
                "Ejes" => array(
                    "Vertical" => "Nivel de desarrollo",
                    "Horizontal" => "Tiempo"
                ),
                "Datos" => array(
                    "Empleado1" => array(
                        "2020" => 5,
                        "2021" => 7,
                        "2022" => 9
                    ),
                    "Empleado2" => array(
                        "2020" => 6,
                        "2021" => 8,
                        "2022" => 9
                    ),
                    // Agrega más empleados y sus datos de desarrollo profesional aquí
                )
            )
        );
        return require 'RedirectorTrait/getChartFunctions.php';        
    }    

    // public function traitusers() {                
    //     return require 'RedirectorTrait/traitusers.php';  
    // }    

    public function traitusuarios() {                
        return require 'RedirectorTrait/traitusuarios.php';  
    }    

    public function traitempleados() {              
        return require 'RedirectorTrait/traitempleados.php';          
    } 

    public function about() {      
        return view('about', ['title' => 'About Page']);
    }

    public function tareas() {              
        return view('tareas', ['title' => 'Tareas Page']);
    }

    public function evaluaciong() {                      
        return view('evaluaciong', ['title' => 'Home Page']);
    }

    public function evaluacion()
    {
        return view('evaluacion', ['title' => 'Home Page']);
    }

    public function trait_calificacion_empleados()
    {   
        return require 'RedirectorTrait/trait_calificacion_empleados.php';        
    }

    public function trait_crud_cuestionario()
    {             
        return require 'RedirectorTrait/trait_crud_cuestionario.php';        
    }

    public function traitpreguntas()
    {             
        return require 'RedirectorTrait/traitpreguntas.php';                
    }
}
