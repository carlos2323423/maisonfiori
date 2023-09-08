<?php

switch ($page) {
    case 'empleados':        
        $lelementos = array(
            // PARAMEROS STYLES
            'styles1', 
            'styles2',
            // PARAMETROS SCRIPTS
            'script1',
            'scripts.SCRIPT_script2',
            // PARTES HTML
            'Page Heading_introducction', 
            'topbar', 
            'slidebarmain', 
            'modal',
            'table_head_foot',
            'table_row_list',
        );        
        break;
    case 'usuarios':        
        $lelementos = array(
            // PARAMEROS STYLES
            'styles1', 
            'styles2',
            // PARAMETROS SCRIPTS
            'script1',
            'scripts.SCRIPT_script2',
            // PARTES HTML
            'Page Heading_introducction', 
            'slidebarmain', 
            'modal',
            'table_head_foot',
            'table_row_list',
        );    
        break;
    case 'calificacion_empleados':
        $lelementos = array(
            // PARAMEROS STYLES
            'styles1',
            'styles2',
             // PARTES HTML
            'Page Heading_introducction',            
            'EvaluacionAdministrador',
        ); 
        break;
    case 'crud_cuestionario':
        $lelementos = array(
            // PARAMEROS STYLES
            'styles1', 
            'styles2',
            // PARAMETROS SCRIPTS
            'script1',            
            'scripts.SCRIPT_script2',
            // PARTES HTML
            'Page Heading_introducction', 
            'slidebarmain', 
            // 'modal',
            'EvaluacionAdministrador',
            'table_head_foot',
            'table_row_list',
        );        
        break;
    case 'preguntas':        
        $lelementos = array(
            // PARAMEROS STYLES
            'styles1', 
            'styles2',
            // PARAMETROS SCRIPTS
            'script1',            
            'scripts.SCRIPT_script2',
            // PARTES HTML
            'Page Heading_introducction',             
            'slidebarmain', 
            'modal',
            'table_head_foot',
            'table_row_list',
        );        
        break;
    case 'welcome':        
        $lelementos = array(
            'top_bars.store', 
            'banners.store_banner', 
            'tables.store_table',
            'tables.pictures.store_picture',            
        );        
        break;
    default:        
        dd("page_elements => Opción no válida");
        break;
}
return $lelementos;