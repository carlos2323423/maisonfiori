<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class Charts extends Chart
{
    protected $chart; // Agrega esta propiedad
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }    
    public function html()
    {
        // Aquí debes implementar la lógica para generar el HTML del gráfico
        // Puedes utilizar alguna biblioteca o paquete para generar el HTML del gráfico
        
        // Por ejemplo, si estás utilizando el paquete "Charts", puedes retornar el HTML del gráfico de la siguiente manera:
        return $this->chart->html();
    }
}
