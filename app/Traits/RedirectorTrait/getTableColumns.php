<?php    
use Illuminate\Support\Facades\DB;
    $columns = DB::getSchemaBuilder()->getColumnListing($tableName);    
    $spaces = [];                
    $i = 0;
    $complate_name = ['firstname', 'lastname'];
    $lastvaluesform = ['foto', 'password']; // columnas a excluir
    $excludeColumns = ['created_at', 'updated_at', 'id'];
    $token = 'remember_token';        
    foreach($complate_name as $value) {
        if (in_array($value, $columns)) {
            $i++;            
            $spaces['c' . ($i)] = $value;
        } else {
            continue;
        }
    }                                   
    foreach($columns as $index => $column) {                    
        if ((in_array($column, $lastvaluesform) || in_array($column, $complate_name) || in_array($column, $excludeColumns)) || ($column == $token)) {
            continue;
        }
        
        $i++;
        $spaces['c' . $i] = $column;
    }                               
    
    foreach($lastvaluesform as $value) {
        if (in_array($value, $columns)) {            
            $i++;
            $spaces['c' . ($i)] = $value;
        } else {
            continue;
        }
    }            
    if($total) {            
        foreach($excludeColumns as $value) {
            if (in_array($value, $columns)) {
                $i++;
                $spaces['c' . ($i)] = $value;
            } else {
                continue;                
            }
        }
        return $spaces;
    } else {                            
        return $spaces;
    }
    dd('ERROR function getTableColumns');
