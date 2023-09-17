<?php

switch ($type) {
    case 'line':
        // $chart = new Charts;
        $chart->labels($labels);
        $chart->dataset($title_name, $type, $data);        
        // return view('chart', [ 'usersChart' => $usersChart ] );
        break;
}
return $chart;