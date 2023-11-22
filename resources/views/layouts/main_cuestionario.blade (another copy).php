<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Tables</title>

    <!-- Estilos -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Estilos personalizados -->
    <style>
        body {
            margin: 0;
            font-family: 'Circular', -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
            -webkit-tap-highlight-color: transparent;
            min-width: 320px;
            background-color: #f5f5f5;
        }

        #dropzone {
            margin: 20px;
            padding: 20px;
            border: 2px dashed #4e73df;
            color: #4e73df;
        }

        #dropzone.dragover {
            border: 2px dashed #c6c6c6;
            background-color: #f1f1f1;
            color: #f1f1f1;
        }

        #content-wrapper {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1220px;
            font-size: 15px;
            color: rgb(85, 85, 85);
            font-family: "Arial Black", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
            background-color: #FFFFFF;
        }

        #id_27,
        ul.form-section.page_1>li#id_27 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul.form-section.page_1 {
            display: flex;
            flex-wrap: wrap;
        }

        ul.form-section.page_1>li {
            width: 50%;
            box-sizing: border-box;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        ul.form-section.page_1>li#id_30 {
            width: 100%;
            flex: none;
        }

        ul.form-section.page_1>li#id_27 {
            width: auto;
            flex: none;
        }

        ul.form-section.page_1>li#id_38 {
            width: 100%;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body id="page-top">
    <div id="content-wrapper" class="d-flex flex-column" style="">
        <div id="content">
            <div class="formPage-stage form-all  " data-page-id="1" data-page-qid="28" style="max-width: 1220px;">
                <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                    <!-- Primer elemento  IMAGEN-->                    
                    @for ($i = 0; $i < $data['drag_iterations']['number_iterations_dragdrop']; $i++) 
                        <div class="dragHandle-point">
                        </div>
                    @endfor

                    @foreach ($data['form_elements'] as $element)
                        <li id="id_{{ $element['id'] }}" data-type="{{ $element['type'] }}" class="form-line clearfix isNotSelected form-line-column lineAlignment-Top {{ $element['class'] }}" tabindex="0" aria-label="{{ $element['label'] }}" role="group" style="z-index: 1;" draggable="{{ $element['draggable'] }}">
                            <div class="question-wrapper questionWrapper">
                                <label id="label_{{ $element['id'] }}" class="form-label form-label-top {{ $element['labelClass'] }}" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="{{ $element['placeholder'] }}" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">{{ $element['question'] }}</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="{{ $element['layout'] }}" style="position: relative;">
                                    @if ($element['type'] == 'control_image')
                                        <div id="resize-{{ $element['id'] }}" data-component="image">
                                            <img alt="{{ $element['label'] }}" class="form-image" src="{{ $element['imageSrc'] }}" tabindex="0" style="height: 262px; width: 250px; float: right; pointer-events: none; border: 0px;">
                                        </div>
                                    @elseif ($element['type'] == 'control_textarea')
                                        <span class="form-sub-label-container" style="vertical-align: top;">
                                            <textarea id="input_{{ $element['id'] }}" class="form-textarea" name="{{ $element['textareaName'] }}" cols="40" rows="6" data-component="textarea" aria-labelledby="label_{{ $element['id'] }}" placeholder=""></textarea>
                                        </span>
                                    @elseif ($element['type'] == 'control_head')
                                        <div class="form-header-group header-small">
                                            <div class="header-text httal htvam">
                                                <h3 id="header_{{ $element['id'] }}" class="form-header" data-component="header">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">{{ $element['headerText'] }}</div>
                                                    </div>
                                                </h3>
                                                <div id="subHeader_{{ $element['id'] }}" class="form-subHeader">
                                                    <div class="editor-container editorNoText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($element['type'] == 'control_textbox' || $element['type'] == 'control_fullname' || $element['type'] == 'control_email' || $element['type'] == 'control_phone')
                                        <span class="form-sub-label-container" style="vertical-align: top;">
                                            <input type="{{ $element['inputType'] }}" id="input_{{ $element['id'] }}" name="{{ $element['inputName'] }}" class="{{ $element['inputClass'] }}" data-defaultvalue="" size="{{ $element['inputSize'] }}" tabindex="-1" placeholder=" " data-component="{{ $element['inputComponent'] }}" aria-labelledby="label_{{ $element['id'] }}" required="" value="">
                                            <span class="form-sub-label" data-testid="undefined">
                                                <div class="editor-container editorNoText" style="display: inline-block;">
                                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">{{ $element['subLabel'] }}</div>
                                                </div>
                                            </span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @if ($element['type'] == 'control_phone')
                                <div class="dragHandle">
                                    @foreach ($data['drag_iterations']['number_iterations_dragdrop'] as $iteration)
                                        <div class="dragHandle-point"></div>
                                    @endforeach
                                </div>
                                <div id="app_wizards" class="moodular collabUsers-userList"></div>
                            @endif
                        </li>
                    @endforeach


                    <li id="id_23" data-type="control_address" class="form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-5" tabindex="0" aria-label="Address Field" role="group" style="z-index: 1;">
                        <div class="question-wrapper questionWrapper">
                            <label id="label_23" class="form-label form-label-top" for="none" style="width: 100%;">
                                <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                    <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Mailing Address</div>
                                </div>
                            </label>
                            <div class="form-input-wide" data-layout="full" style="position: relative;">
                                <div summary="" class="form-address-table jsTest-addressField">
                                    @forelse($data['addresses'] as $address)
                                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                                            <span class="form-address-line form-address-street-line jsTest-address-lineField">
                                                <span class="form-sub-label-container" style="vertical-align: top;">
                                                    <input type="text" id="input_{{ $address['id'] }}_addr_line1" name="q{{ $address['id'] }}_mailingAddress[addr_line1]" class="form-textbox form-address-line" data-defaultvalue="" autocomplete="section-input_{{ $address['id'] }} address-line1" tabindex="-1" data-component="address_line_1" aria-labelledby="label_{{ $address['id'] }} sublabel_{{ $address['id'] }}_addr_line1" required="" value="">
                                                    <span class="form-sub-label" data-testid="undefined">
                                                        <div class="editor-container editorHasText" style="display: inline-block;">
                                                            <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">
                                                                {{ $address['sublabel'] }}
                                                            </div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    @empty
                                        <!-- Manejar el caso en que no hay direcciones -->
                                    @endforelse

                                    @foreach($data['additional_fields'] as $key => $field)
                                        <div class="form-address-line-wrapper">
                                            <span class="form-address-line form-address-{{ $key }}-line">
                                                <input type="text" id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                                    class="{{ $field['class'] }}" data-defaultvalue=""
                                                    autocomplete="{{ $field['autocomplete'] }}" tabindex="{{ $field['tabindex'] }}"
                                                    data-component="{{ $field['data-component'] }}"
                                                    aria-labelledby="{{ $field['aria-labelledby'] }}" @if(isset($field['required']) && $field['required']) required="" @endif value="{{ $field['value'] }}">
                                                <span class="form-sub-label" data-testid="undefined">{{ $field['sublabel'] }}</span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="dragHandle">
                            @for ($i = 0; $i < $data['drag_iterations']['number_iterations_dragdrop']; $i++)
                                <div class="dragHandle-point">
                                </div>
                            @endfor
                        </div>

                        <div id="app_wizards" class="moodular collabUsers-userList"></div>
                    </li>

                    <li id="id_31" data-type="control_checkbox" class="form-line form-col-6">
                        <div class="question-wrapper questionWrapper ">
                            <label id="label_31" class="form-label form-required-field">
                                Do you currently utilize any of these?
                            </label>
                            <div class="form-input-wide" data-layout="full">
                                <div class="form-single-column" data-component="checkbox">
                                    @foreach($data['checkbox_items'] as $item)
                                        <span class="form-checkbox-item">
                                            <input type="checkbox" class="form-checkbox validate[required]" id="{{ $item['id'] }}"
                                                name="{{ $item['name'] }}" required="" value="{{ $item['value'] }}">
                                            <label class="inlineEditor" id="label_{{ $item['id'] }}">{{ $item['label'] }}</label>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="dragHandle">
                            @for ($i = 0; $i < $data['drag_iterations']['number_iterations_dragdrop']; $i++) 
                                <div class="dragHandle-point">
                                </div>
                            @endfor
                        </div>
                        <div id="app_wizards" class="moodular collabUsers-userList"></div>
                    </li>

                    @foreach($data['matrix_data'] as $matrix)
                        <li id="{{ $matrix['id'] }}" data-type="control_matrix" data-inputtype="Check Box" data-shrinked="true" data-qid="{{ $matrix['qid'] }}" data-order="{{ $matrix['order'] }}" data-selectioncount="{{ $matrix['selectioncount'] }}" class="form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-{{ $matrix['col'] }}" tabindex="0" aria-label="Input Table Field" role="group" style="z-index: 1;">
                            <div class="question-wrapper questionWrapper">
                                <label id="label_{{ $matrix['qid'] }}" class="form-label form-label-top" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">{{ $matrix['question'] }}</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <table summary="" aria-labelledby="label_{{ $matrix['qid'] }}" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                                        <tr class="form-matrix-tr form-matrix-header-tr">
                                            <th class="form-matrix-th" style="border: none;">&nbsp;</th>
                                            @foreach ($matrix['headers'] as $header)
                                                <th scope="col" class="form-matrix-headers form-matrix-column-headers" style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text" contenteditable="true" data-gramm="false">{{ $header }}</div>
                                                    </div>
                                                </th>
                                            @endforeach
                                        </tr>
                                        @foreach ($matrix['rows'] as $row)
                                            <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_{{ $matrix['qid'] }} label_{{ $matrix['qid'] }}_row_{{ $loop->index }}">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">{{ $row['row_name'] }}</div>
                                                    </div>
                                                </th>
                                                @foreach ($row['values'] as $value)
                                                    <td class="form-matrix-values">
                                                        <input readonly="" id="{{ $value['input_id'] }}" class="form-checkbox" type="checkbox" name="{{ $value['input_name'] }}" tabindex="-1" aria-labelledby="{{ $value['label_ids'] }}" aria-label="Cells Check Box" value="{{ $value['input_value'] }}">
                                                        <label for="{{ $value['input_id'] }}" class="matrix-choice-label matrix-checkbox-label"></label>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="dragHandle">
                                @for ($i = 0; $i < $matrix['drag_iterations']; $i++)
                                    <div class="dragHandle-point"></div>
                                @endfor
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li>
                    @endforeach

                    @foreach ($data['matrix_items'] as $matrix)
                        <li id="{{ $matrix['id'] }}" data-type="control_matrix" data-inputtype="Check Box" data-shrinked="true" data-qid="{{ $matrix['qid'] }}"
                            data-order="{{ $matrix['order'] }}" data-selectioncount="{{ $matrix['selectioncount'] }}"
                            class="form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-{{ $matrix['col'] }}" tabindex="0"
                            aria-label="Input Table Field " role="group" style="z-index: 1;">
                            <div class="question-wrapper questionWrapper ">
                                <label id="label_{{ $matrix['qid'] }}" class="form-label form-label-top" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true"
                                            data-gramm="false" style="width: 100%;">{{ $matrix['question'] }}</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <table summary="" aria-labelledby="label_{{ $matrix['qid'] }}" cellpadding="4" cellspacing="0" class="form-matrix-table"
                                        data-component="matrix">
                                        <tr class="form-matrix-tr form-matrix-header-tr">
                                            <th class="form-matrix-th" style="border: none;">&nbsp;</th>
                                            @foreach ($matrix['headers'] as $col)
                                                <th scope="col" class="form-matrix-headers form-matrix-column-headers"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">{{ $col }}</div>
                                                    </div>
                                                </th>
                                            @endforeach
                                        </tr>
                                        @foreach ($matrix['rows'] as $row)
                                            <tr class="form-matrix-tr form-matrix-value-tr"
                                                aria-labelledby="label_{{ $matrix['qid'] }} label_{{ $matrix['qid'] }}_row_{{ $loop->index }}">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text"
                                                            contenteditable="true" data-gramm="false">{{ $row['row_name'] }}</div>
                                                    </div>
                                                </th>
                                                @foreach ($row['values'] as $value)
                                                    <td class="form-matrix-values"><input readonly=""
                                                            id="input_{{ $matrix['qid'] }}_{{ $loop->parent->index }}_{{ $loop->index }}"
                                                            class="form-checkbox" type="checkbox"
                                                            name="q{{ $matrix['qid'] }}_pleaseCheck{{ $matrix['qid'] }}[{{ $loop->parent->index }}][]"
                                                            tabindex="-1"
                                                            aria-labelledby="label_{{ $matrix['qid'] }}_col_{{ $loop->index }} label_{{ $matrix['qid'] }}_row_{{ $loop->parent->index }}"
                                                            aria-label="Cells Check Box" value="{{ $value }}"><label
                                                            for="input_{{ $matrix['qid'] }}_{{ $loop->parent->index }}_{{ $loop->index }}"
                                                            class="matrix-choice-label matrix-checkbox-label"></label></td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="dragHandle">
                                @for ($i = 0; $i < $matrix['drag_iterations']; $i++) <div class="dragHandle-point">
                                </div>
                                @endfor
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li>
                    @endforeach

                    @foreach ($data['radio_items'] as $radio)
                        <li id="{{ $radio['id'] }}" data-type="{{ $radio['data-type'] }}" data-shrinked="{{ $radio['data-shrinked'] }}" 
                            data-qid="{{ $radio['data-qid'] }}" data-order="{{ $radio['data-order'] }}" data-selectioncount="{{ $radio['data-selectioncount'] }}"
                            class="{{ $radio['class'] }}" tabindex="0" aria-label="{{ $radio['aria-label'] }}" role="group" style="{{ $radio['style'] }}">
                            <div class="question-wrapper questionWrapper ">
                                <label id="label_{{ $radio['data-qid'] }}" class="{{ $radio['label-class'] }}" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true"
                                            data-gramm="false" style="width: 100%;">{{ $radio['question'] }}</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <div class="form-single-column" role="group" aria-labelledby="label_{{ $radio['data-qid'] }}" data-component="radio">
                                        @foreach ($radio['options'] as $option)
                                            <span class="{{ $option['span-class'] }}">
                                                <input aria-describedby="label_{{ $radio['data-qid'] }}" type="{{ $option['input-type'] }}" tabindex="-1" 
                                                    class="{{ $option['input-class'] }}" id="{{ $option['input-id'] }}" name="{{ $radio['data-name'] }}" 
                                                    required="{{ $option['input-required'] }}" value="{{ $option['input-value'] }}">
                                                <span>
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" 
                                                            data-gramm="false" id="{{ $option['label-id'] }}" style="display: inline-block;">
                                                            {{ $option['label-text'] }}
                                                        </label>
                                                    </div>
                                                </span>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="dragHandle">
                                @for ($i = 0; $i < $data['drag_iterations']['number_iterations_dragdrop']; $i++)
                                    <div class="dragHandle-point"></div>
                                @endfor
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <!-- Contenido del formulario HTML proporcionado -->
            <!-- ... (El contenido del formulario HTML va aquí) ... -->
        </div>
        <footer class="sticky-footer bg-white">
            <!-- Footer -->
            <!-- ... (Si hay un footer específico) ... -->
        </footer>
    </div>
    <!-- Cualquier otro script o elemento que se requiera -->
    <!-- ... (código HTML anterior) ... -->

    <script>
        var columns = ["You", "Friend", "Family"];
        var rows = [
            "Carpal Tunnel Pain",
            "ALS",
            "ADD / ADHD",
            "Fibromyalgia",
            "MS",
            "Hemorrhoids / Prostate Problems",
            "Menopause / PMS / Cramps",
            "Aging Concerns",
            "Cancer Risk"
        ];

        function generateColumnHeaders() {
            for (var i = 0; i < columns.length; i++) {
                document.write(`
                    <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_${i}" style="position: relative;">
                        <div class="editor-container editorHasText" style="display: inline-block;">
                            <div class="inlineEditor" placeholder="Type Col Name" format="text" contenteditable="true" data-gramm="false">${columns[i]}</div>
                        </div>
                    </th>
                `);
            }
        }

        function generateRowsAndCheckboxes() {
            for (var i = 0; i < rows.length; i++) {
                document.write(`
                    <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_39 label_39_row_${i}">
                        <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                            <div class="editor-container editorHasText" style="display: inline-block;">
                                <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">${rows[i]}</div>
                            </div>
                        </th>
                        <!-- Loop for generating checkboxes in each row -->
                `);
                for (var j = 0; j < columns.length; j++) {
                    document.write(`
                        <td class="form-matrix-values"><input readonly="" id="input_39_${i}_${j}" class="form-checkbox" type="checkbox" name="q39_pleaseCheck39[${i}][]" tabindex="-1" aria-labelledby="label_39_col_${j} label_39_row_${i}" aria-label="Cells Check Box" value="${columns[j]}">
                        <label for="input_39_${i}_${j}" class="matrix-choice-label matrix-checkbox-label"></label></td>
                    `);
                }
                document.write(`</tr>`);
            }
        }

        // Invocar las funciones para generar las columnas y las filas con checkboxes
        generateColumnHeaders();
        generateRowsAndCheckboxes();
    </script>
    <script>
        var referrals = ["Referral 01", "Referral 02", "Referral 03"];
        for (var i = 0; i < referrals.length; i++) {
            document.write(`
        <tr class="form-matrix-tr form-matrix-value-tr"
            aria-labelledby="label_37 label_37_row_${i}">
            <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                <div class="editor-container editorHasText" style="display: inline-block;">
                    <div class="inlineEditor" placeholder="Type Row Name" format="text"
                        contenteditable="true" data-gramm="false">${referrals[i]}</div>
                </div>
            </th>
            <!-- Loop for generating textboxes in each row -->
            `);
            for (var j = 0; j < columns.length; j++) {
                document.write(`
                    <td class="form-matrix-values"><input readonly="" id="input_37_${i}_${j}"
                        class="form-textbox" type="text" size="5" name="q37_givenThe[${i}][]"
                        tabindex="-1" aria-labelledby="label_37_col_${j} label_37_row_${i}"
                        aria-label="Cells Text Box" autocomplete="nope" value=""
                        style="width: 100%; box-sizing: border-box;"></td>
                `);
            }
            document.write(`</tr>`);
        }
    </script>
    <!-- ... (resto del código HTML) ... -->
    <!-- JavaScript for generating dragHandle points -->
    <script>
        for (var i = 0; i < 4; i++) {
            document.write(`<div class="dragHandle-point"></div>`);
        }
    </script>

</body>

</html>