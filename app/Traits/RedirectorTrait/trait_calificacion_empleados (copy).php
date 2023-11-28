<?php

    use App\Models\Competencia;
    use App\Models\FactoresDesempeno;
    use App\Models\EscalaCalificacion;

    // Obtener las columnas de la tabla 'empleados' sin incluir las totales
    $spaces = $this->getTableColumns('empleados', false);

    // Obtener todas las columnas de la tabla 'empleados', incluyendo las totales
    $spacesTotal = $this->getTableColumns('empleados', true);

    // Puedes descomentar la siguiente línea si quieres ver el contenido de $spaces
    // dd($spaces);

    // Puedes descomentar la siguiente línea si quieres ver el contenido de $spacesTotal
    // dd($spacesTotal);
  
    $data = [
        'addresses' => [
            [
                'id' => 23,
                'street_address' => '123 Main Street',
                'sublabel' => 'Street Address',
            ],
            // Agrega más direcciones según sea necesario
        ],        
        'additional_fields' => [
            'addr_line2' => [
                'id' => 'input_23_addr_line2',
                'name' => 'q23_mailingAddress[addr_line2]',
                'class' => 'form-textbox form-address-line',
                'autocomplete' => 'section-input_23 address-line2',
                'tabindex' => '-1',
                'data-component' => 'address_line_2',
                'aria-labelledby' => 'label_23 sublabel_23_addr_line2',
                'value' => '',
                'sublabel' => 'Street Address Line 2',
            ],
            'city' => [
                'id' => 'input_23_city',
                'name' => 'q23_mailingAddress[city]',
                'class' => 'form-textbox form-address-city',
                'autocomplete' => 'section-input_23 address-level2',
                'tabindex' => '-1',
                'data-component' => 'city',
                'aria-labelledby' => 'label_23 sublabel_23_city',
                'required' => true,
                'value' => '',
                'sublabel' => 'City',
            ],
            'state' => [
                'id' => 'input_23_state',
                'name' => 'q23_mailingAddress[state]',
                'class' => 'form-textbox form-address-state',
                'autocomplete' => 'section-input_23 address-level1',
                'tabindex' => '-1',
                'data-component' => 'state',
                'aria-labelledby' => 'label_23 sublabel_23_state',
                'required' => true,
                'value' => '',
                'sublabel' => 'State / Province',
            ],
            'postal' => [
                'id' => 'input_23_postal',
                'name' => 'q23_mailingAddress[postal]',
                'class' => 'form-textbox form-address-postal',
                'autocomplete' => 'section-input_23 postal-code',
                'tabindex' => '-1',
                'data-component' => 'zip',
                'aria-labelledby' => 'label_23 sublabel_23_postal',
                'required' => true,
                'value' => '',
                'sublabel' => 'Postal / Zip Code',
            ],
        ],
        'drag_iterations' => [
            'number_iterations_dragdrop' => 4,
        ],
        'checkbox_items' => [
            ['id' => 'input_31_0', 'name' => 'q31_doYou[]', 'value' => 'MultiVitamin', 'label' => 'MultiVitamin'],
            ['id' => 'input_31_1', 'name' => 'q31_doYou[]', 'value' => 'Omega III Fish Oil', 'label' => 'Omega III Fish Oil'],
            ['id' => 'input_31_2', 'name' => 'q31_doYou[]', 'value' => 'B-vitamins', 'label' => 'B-vitamins'],
            ['id' => 'input_31_3', 'name' => 'q31_doYou[]', 'value' => 'Vitamin D', 'label' => 'Vitamin D'],
            ['id' => 'input_31_4', 'name' => 'q31_doYou[]', 'value' => 'Protein Shakes', 'label' => 'Protein Shakes'],
            ['id' => 'input_31_5', 'name' => 'q31_doYou[]', 'value' => 'Under-sink Water Filter', 'label' => 'Under-sink Water Filter'],
            ['id' => 'input_31_6', 'name' => 'q31_doYou[]', 'value' => 'Pharmaceutical drugs', 'label' => 'Pharmaceutical drugs'],
            ['id' => 'input_31_7', 'name' => 'q31_doYou[]', 'value' => 'Massage Therapy, Chinese Medicine, Acupuncture', 'label' => 'Massage Therapy, Chinese Medicine, Acupuncture'],
        ],
        'matrix_headers' => [
            'You',
            'Friend',
            'Family',
        ],
        'matrix_rows' => [
            [
                'row_id' => 'label_33_row_0',
                'row_name' => 'Ulcers',
                'row_values' => [
                    ['input_id' => 'input_33_0_0', 'input_name' => 'q33_pleaseCheck33[0][]', 'input_value' => 'You', 'label_ids' => 'label_33_col_0 label_33_row_0'],
                    ['input_id' => 'input_33_0_1', 'input_name' => 'q33_pleaseCheck33[0][]', 'input_value' => 'Friend', 'label_ids' => 'label_33_col_1 label_33_row_0'],
                    ['input_id' => 'input_33_0_2', 'input_name' => 'q33_pleaseCheck33[0][]', 'input_value' => 'Family', 'label_ids' => 'label_33_col_2 label_33_row_0'],
                ],
            ],
            // ... (Agregar más filas según sea necesario)
        ],
        'checkbox_items2' => [
            [
                'row_name' => 'Asthma / Bronchitis',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Allergies / Hay Fever',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Allergic Reactions',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Migraines',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Diabetes',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'High Blood Pressure',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Psoriasis',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Damaged Artery Lining',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Joint Flexibility',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Arthritis Inflammation / Pain',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
        ],
        'checkbox_items3' => [
            [
                'row_name' => 'Respiratory Inflammation',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Frequent Infections / Flu / Colds',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'High Histamine Levels / Sinus Problems',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Low Energy / Fatigue',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],
            [
                'row_name' => 'Chronic Fatigue',
                'checkbox_values' => ['You', 'Friend', 'Family'],
            ],            
        ],
        'checkbox_items4' => [
            [
                'row_name' => 'Fat Formation / Cellulite',
                'values'   => ['You', 'Friend', 'Family'],
            ],
            // ... Otras filas ...
        ],   
        'checkbox_items5' => [
            ['row_name' => 'Spasms', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => "Alzheimer's", 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Environmental Concerns', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Wrinkling of the Skin', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Pollution', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Drugs', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Alcohol', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'Smoke', 'values' => ['You', 'Friend', 'Family']],
            ['row_name' => 'All Free Radical Damage', 'values' => ['You', 'Friend', 'Family']],
        ],     
        'matrix_data' => [
            [
                'id' => 'id_21',
                'qid' => 21,
                'order' => 10,
                'selectioncount' => 0,
                'col' => 7,
                'question' => 'Please check all appropriate boxes',
                'headers' => ['Header 1', 'Header 2', 'Header 3'],
                'rows' => [
                    ['row_name' => 'Row 1', 'values' => [/* ... */]],
                    ['row_name' => 'Row 2', 'values' => [/* ... */]],
                    // Agrega más filas según sea necesario
                ],
                'drag_iterations' => 5,
            ],
            [
                'id' => 'id_33',
                'qid' => 33,
                'order' => 11,
                'selectioncount' => 0,
                'col' => 8,
                'question' => 'Please check all appropriate boxes',
                'headers' => ['Header 1', 'Header 2', 'Header 3'],
                'rows' => [
                    ['row_name' => 'Row 1', 'values' => [/* ... */]],
                    ['row_name' => 'Row 2', 'values' => [/* ... */]],
                    // Agrega más filas según sea necesario
                ],
                'drag_iterations' => 5,
            ],
            [
                'id' => 'id_32',
                'qid' => 32,
                'order' => 12,
                'selectioncount' => 0,
                'col' => 9,
                'question' => 'Please check all appropriate boxes',
                'headers' => ['Header 1', 'Header 2', 'Header 3'],
                'rows' => [
                    ['row_name' => 'Row 1', 'values' => [/* ... */]],
                    ['row_name' => 'Row 2', 'values' => [/* ... */]],
                    // Agrega más filas según sea necesario
                ],
                'drag_iterations' => 5,
            ],
            // Agrega más matrices según sea necesario
        ],
        'radio_items' => [
            [
                'id' => 'id_1',
                'data-type' => 'control_radio',
                'data-shrinked' => 'true',
                'data-qid' => '1',
                'data-order' => '1',
                'data-selectioncount' => '0',
                'class' => 'form-line clearfix isNotSelected allowOtherEnabled form-line-column form-line-column-clear lineAlignment-Top isRequired form-col-1',
                'tabindex' => '0',
                'aria-label' => 'Single Choice Field Required',
                'role' => 'group',
                'style' => 'z-index: 1;',
                'label-class' => 'form-label form-label-top form-required-field',
                'data-name' => 'q29_isThere', // Agregada la clave "data-name"
                'question' => 'Is there any reason you would NOT be willing to utilize a complementary and/or alternative therapy/solution that would address these concerns?',
                'options' => [
                    [
                        'span-class' => 'form-radio-item',
                        'input-type' => 'radio',
                        'input-class' => 'form-radio validate[required]',
                        'input-id' => 'input_1_0',
                        'input-name' => 'q1_isThere',
                        'input-required' => 'required',
                        'input-value' => 'No, there is no reason I would not try something...',
                        'label-id' => 'label_input_1_0',
                        'label-text' => 'No, there is no reason I would not try something...',
                    ],
                    // ... Otros elementos de opción ...
                ],
            ],
            // ... Otros elementos de radio ...
        ],
        // ... Otros elementos de formulario ...
        'form_elements' => [
            [
                'id' => 27,
                'type' => 'control_image',
                'class' => 'form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-1',
                'label' => 'Image Field',
                'draggable' => 'false',
                'layout' => 'full',
                'imageSrc' => '//www.jotform.com/uploads/CEISRAEL/form_files/humanfigure.jpg',
                'question' => 'Enter your thoughts here.',
                'labelClass' => 'some-label-class',
                'placeholder' => 'Type a question',
            ],
            [
                'id' => 38,
                'type' => 'control_textarea',
                'class' => 'form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-2',
                'label' => 'Long Text Field',
                'draggable' => 'false',
                'layout' => 'full',
                'placeholder' => 'Type a question',
                'textareaName' => 'q38_optionalNote',
                'question' => 'Enter your thoughts here.',
                'labelClass' => 'some-label-class',
            ],
            // Otros elementos del formulario aquí...
        ],
    ];    
    
    $data['matrix_items'] = [
        [
            'id' => 'id_34',
            'qid' => 34,
            'order' => 13,
            'selectioncount' => 0,
            'col' => 10,
            'question' => 'Please check all appropriate boxes',
            'headers' => $data['matrix_headers'],
            'rows' => $data['checkbox_items4'],
            'drag_iterations' => $data['drag_iterations']['number_iterations_dragdrop'],
        ],
        [
            'id' => 'id_36',
            'qid' => 36,
            'order' => 14,
            'selectioncount' => 0,
            'col' => 11,
            'question' => 'Please check all appropriate boxes',
            'headers' => $data['matrix_headers'],
            'rows' => $data['checkbox_items5'],
            'drag_iterations' => $data['drag_iterations']['number_iterations_dragdrop'],
        ],
        [
            'id' => 'id_39',
            'qid' => 39,
            'order' => 15,
            'selectioncount' => 0,
            'col' => 12,
            'question' => 'Please check all appropriate boxes',
            'headers' => ['You', 'Friend', 'Family'],
            'rows' => [
                ['row_name' => 'Carpal Tunnel Pain', 'values' => ['You', 'Friend', 'Family']],
                // Agrega más filas según sea necesario
            ],
            'drag_iterations' => $data['drag_iterations']['number_iterations_dragdrop'],
        ],
        // Agrega más matrices según sea necesario
    ];
    
    // dd($data);    
    $competencias = Competencia::all();
    $FactoresDesempeno = FactoresDesempeno::all();
    $escalacalificacion = EscalaCalificacion::all();
    // $escalaCompetencias = EscalaCalificacion::where('name', 'Escala Competencias')->get();
    $escalaCompetencias = EscalaCalificacion::where('name', 'Escala Competencias')->first();
    $escalaFactoresDesempeno = EscalaCalificacion::where('name', 'Escala Factores Desempeno')->first();
    // dd($escalaFactoresDesempeno);
    $lelementos = $this->page_elements('calificacion_empleados');
    // dd($lelementos);
    $route_name = 'evaluacionadministrador';
    $name = 'evaluacionadministrador';
    $accionformsent = 'preguntas_registersent';
    $accionformupdate = 'preguntas_registerupdate';
    $accionformdelete = 'preguntas_registerdelete';
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $cuestionarioModal = false;
    $Modal_target = '#register_userModal';
    $form_data_toggle_list = 'cuestionario_Administrador_form';
    $viewvariables = [
        'title' => 'Welcome',                        
        'route_name' => $route_name,
        'name' => $name,
        'elementos' => $lelementos,
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,
        'accionformdelete' => $accionformdelete,
        'imageuser' => $imageuser,
        'cuestionarioModal' => $cuestionarioModal,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,
        'data' => $data,
        'competencias' => $competencias,
        'FactoresDesempeno' => $FactoresDesempeno,        
        'escalacalificacion' => $escalacalificacion,
        'escalaCompetencias' => $escalaCompetencias,
        'escalaFactoresDesempeno' => $escalaFactoresDesempeno,
    ];    
    return $viewvariables;
    