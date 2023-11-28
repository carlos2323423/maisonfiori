@if ($cuestionarioModal)
    <!-- USERS Modal -->
    <div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="h4 text-gray-900 mb-4">Cuestionario de Evaluación de Desempeño</h1>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        @if ($errors->any())
                        <span aria-hidden="true" onclick="clear_errors()">×</span>
                        @else
                        <span aria-hidden="true" onclick="">×</span>
                        @endif
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                    <form id="cuestionario_Administrador_form" class="user" method="POST"
                        action="{{ route($route_name.'_registersent') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control form-control-user" id="nombre" name="nombre"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="superior">Superior:</label>
                            <input type="text" class="form-control form-control-user" id="superior" name="superior"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control form-control-user" id="cargo" name="cargo"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="area">Área:</label>
                            <input type="text" class="form-control form-control-user" id="area" name="area"><br><br>
                        </div>


                        <h2>FACTORES DE DESEMPEÑO</h2>
                        <p>Por favor, evalúa el rendimiento observado en cada uno de los siguientes indicadores
                            seleccionando la opción que mejor represente tu opinión:</p>

                        <ol>
                            <div class="form-group">
                                <li>
                                    <label for="factor1">Integrar y coordinar el trabajo del personal:</label><br>
                                    <input type="radio" id="factor1_sobresaliente" name="factor1" value="5">
                                    <label for="factor1_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor1_por_encima" name="factor1" value="4">
                                    <label for="factor1_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor1_satisface" name="factor1" value="3">
                                    <label for="factor1_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor1_por_debajo" name="factor1" value="2">
                                    <label for="factor1_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor1_necesita_mejorar" name="factor1" value="1">
                                    <label for="factor1_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor2">Responsable de tomar decisiones, establecer políticas y estrategias
                                        que afecten a la organización:</label><br>
                                    <input type="radio" id="factor2_sobresaliente" name="factor2" value="5">
                                    <label for="factor2_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor2_por_encima" name="factor2" value="4">
                                    <label for="factor2_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor2_satisface" name="factor2" value="3">
                                    <label for="factor2_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor2_por_debajo" name="factor2" value="2">
                                    <label for="factor2_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor2_necesita_mejorar" name="factor2" value="1">
                                    <label for="factor2_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor3">Dirigir el mercado en el momento actual:</label><br>
                                    <input type="radio" id="factor3_sobresaliente" name="factor3" value="5">
                                    <label for="factor3_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor3_por_encima" name="factor3" value="4">
                                    <label for="factor3_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor3_satisface" name="factor3" value="3">
                                    <label for="factor3_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor3_por_debajo" name="factor3" value="2">
                                    <label for="factor3_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor3_necesita_mejorar" name="factor3" value="1">
                                    <label for="factor3_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>

                            <div class="form-group">
                                <li>
                                    <label for="factor4">Controlar el personal y el restaurante:</label><br>
                                    <input type="radio" id="factor4_sobresaliente" name="factor4" value="5">
                                    <label for="factor4_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor4_por_encima" name="factor4" value="4">
                                    <label for="factor4_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor4_satisface" name="factor4" value="3">
                                    <label for="factor4_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor4_por_debajo" name="factor4" value="2">
                                    <label for="factor4_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor4_necesita_mejorar" name="factor4" value="1">
                                    <label for="factor4_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor5">Distribuir las funciones:</label><br>
                                    <input type="radio" id="factor5_sobresaliente" name="factor5" value="5">
                                    <label for="factor5_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor5_por_encima" name="factor5" value="4">
                                    <label for="factor5_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor5_satisface" name="factor5" value="3">
                                    <label for="factor5_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor5_por_debajo" name="factor5" value="2">
                                    <label for="factor5_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor5_necesita_mejorar" name="factor5" value="1">
                                    <label for="factor5_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor6">Controlar los procesos:</label><br>
                                    <input type="radio" id="factor6_sobresaliente" name="factor6" value="5">
                                    <label for="factor6_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor6_por_encima" name="factor6" value="4">
                                    <label for="factor6_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor6_satisface" name="factor6" value="3">
                                    <label for="factor6_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor6_por_debajo" name="factor6" value="2">
                                    <label for="factor6_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor6_necesita_mejorar" name="factor6" value="1">
                                    <label for="factor6_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor7">Controlar las actividades de las áreas operativas y
                                        administrativas:</label><br>
                                    <input type="radio" id="factor7_sobresaliente" name="factor7" value="5">
                                    <label for="factor7_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor7_por_encima" name="factor7" value="4">
                                    <label for="factor7_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor7_satisface" name="factor7" value="3">
                                    <label for="factor7_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor7_por_debajo" name="factor7" value="2">
                                    <label for="factor7_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor7_necesita_mejorar" name="factor7" value="1">
                                    <label for="factor7_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="factor8">Llevar un reporte mensual:</label><br>
                                    <input type="radio" id="factor8_sobresaliente" name="factor8" value="5">
                                    <label for="factor8_sobresaliente">Sobresaliente</label><br>
                                    <input type="radio" id="factor8_por_encima" name="factor8" value="4">
                                    <label for="factor8_por_encima">Por encima de las expectativas</label><br>
                                    <input type="radio" id="factor8_satisface" name="factor8" value="3">
                                    <label for="factor8_satisface">Satisface las expectativas</label><br>
                                    <input type="radio" id="factor8_por_debajo" name="factor8" value="2">
                                    <label for="factor8_por_debajo">Por debajo de las expectativas</label><br>
                                    <input type="radio" id="factor8_necesita_mejorar" name="factor8" value="1">
                                    <label for="factor8_necesita_mejorar">Necesita mejorar</label><br><br>
                                </li>
                            </div>
                        </ol>
                        <div class="form-group">
                            <label for="puntaje_promedio">PUNTAJE PROMEDIO:</label>
                            <input type="text" id="puntaje_promedio" name="puntaje_promedio"><br><br>
                        </div>

                        <h2>COMPETENCIAS LABORALES</h2>
                        <p>Por favor, evalúa el rendimiento observado en cada una de las siguientes competencias
                            seleccionando la opción que mejor represente tu opinión:</p>

                        <ol>
                            <div class="form-group">
                                <li>
                                    <label for="competencia1">Liderazgo:</label><br>
                                    <input type="radio" id="competencia1_excelente" name="competencia1" value="5">
                                    <label for="competencia1_excelente">Excelente</label><br>
                                    <input type="radio" id="competencia1_muy_bueno" name="competencia1" value="4">
                                    <label for="competencia1_muy_bueno">Muy Bueno</label><br>
                                    <input type="radio" id="competencia1_normal" name="competencia1" value="3">
                                    <label for="competencia1_normal">Normal</label><br>
                                    <input type="radio" id="competencia1_necesidad_desarrollo" name="competencia1"
                                        value="2">
                                    <label for="competencia1_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                    <input type="radio" id="competencia1_mejora_urgente" name="competencia1" value="1">
                                    <label for="competencia1_mejora_urgente">Mejora Urgente</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="competencia2">Proactivo:</label><br>
                                    <input type="radio" id="competencia2_excelente" name="competencia2" value="5">
                                    <label for="competencia2_excelente">Excelente</label><br>
                                    <input type="radio" id="competencia2_muy_bueno" name="competencia2" value="4">
                                    <label for="competencia2_muy_bueno">Muy Bueno</label><br>
                                    <input type="radio" id="competencia2_normal" name="competencia2" value="3">
                                    <label for="competencia2_normal">Normal</label><br>
                                    <input type="radio" id="competencia2_necesidad_desarrollo" name="competencia2"
                                        value="2">
                                    <label for="competencia2_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                    <input type="radio" id="competencia2_mejora_urgente" name="competencia2" value="1">
                                    <label for="competencia2_mejora_urgente">Mejora Urgente</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="competencia3">Dinámico:</label><br>
                                    <input type="radio" id="competencia3_excelente" name="competencia3" value="5">
                                    <label for="competencia3_excelente">Excelente</label><br>
                                    <input type="radio" id="competencia3_muy_bueno" name="competencia3" value="4">
                                    <label for="competencia3_muy_bueno">Muy Bueno</label><br>
                                    <input type="radio" id="competencia3_normal" name="competencia3" value="3">
                                    <label for="competencia3_normal">Normal</label><br>
                                    <input type="radio" id="competencia3_necesidad_desarrollo" name="competencia3"
                                        value="2">
                                    <label for="competencia3_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                    <input type="radio" id="competencia3_mejora_urgente" name="competencia3" value="1">
                                    <label for="competencia3_mejora_urgente">Mejora Urgente</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="competencia4">Analítico:</label><br>
                                    <input type="radio" id="competencia4_excelente" name="competencia4" value="5">
                                    <label for="competencia4_excelente">Excelente</label><br>
                                    <input type="radio" id="competencia4_muy_bueno" name="competencia4" value="4">
                                    <label for="competencia4_muy_bueno">Muy Bueno</label><br>
                                    <input type="radio" id="competencia4_normal" name="competencia4" value="3">
                                    <label for="competencia4_normal">Normal</label><br>
                                    <input type="radio" id="competencia4_necesidad_desarrollo" name="competencia4"
                                        value="2">
                                    <label for="competencia4_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                    <input type="radio" id="competencia4_mejora_urgente" name="competencia4" value="1">
                                    <label for="competencia4_mejora_urgente">Mejora Urgente</label><br><br>
                                </li>
                            </div>
                            <div class="form-group">
                                <li>
                                    <label for="competencia5">Orientación al logro:</label><br>
                                    <input type="radio" id="competencia5_excelente" name="competencia5" value="5">
                                    <label for="competencia5_excelente">Excelente</label><br>
                                    <input type="radio" id="competencia5_muy_bueno" name="competencia5" value="4">
                                    <label for="competencia5_muy_bueno">Muy Bueno</label><br>
                                    <input type="radio" id="competencia5_normal" name="competencia5" value="3">
                                    <label for="competencia5_normal">Normal</label><br>
                                    <input type="radio" id="competencia5_necesidad_desarrollo" name="competencia5"
                                        value="2">
                                    <label for="competencia5_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                    <input type="radio" id="competencia5_mejora_urgente" name="competencia5" value="1">
                                    <label for="competencia5_mejora_urgente">Mejora Urgente</label><br><br>
                                </li>
                            </div>
                        </ol>
                        <div class="form-group">
                            <label for="puntaje_promedio_competencias">PUNTAJE PROMEDIO:</label>
                            <input type="text" id="puntaje_promedio_competencias"
                                name="puntaje_promedio_competencias"><br><br>
                        </div>
                        <div class="form-group">
                            <label for="total_puntos">TOTAL DE PUNTOS:</label>
                            <input type="text" id="total_puntos" name="total_puntos"><br><br>
                        </div>

                        <h2>PARÁMETROS:</h2>
                        <ul>
                            <li>
                                Si el total de puntos es &lt; 75% = Aplicar empowerment en la organización para poder
                                cumplir con las actividades planificadas.
                            </li>
                            <li>
                                Si el total de puntos es de 75% A 90% = Se deben agilizar los procesos operativos y
                                administrativos.
                            </li>
                            <li>
                                Si el total de puntos es de 91% a 100% = ¡Felicidades! Mantén y mejora tus fortalezas.
                            </li>
                        </ul>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <h1>Cuestionario de Evaluación de Desempeño</h1>

    <form id="cuestionario_Administrador_form" class="user" method="POST" action="{{ route($route_name.'_registersent') }}" enctype="multipart/form-data">
        @csrf
        <div id="content-wrapper" class="d-flex flex-column" style="">
            <div id="content">
                <div class="formPage-stage form-all  " data-page-id="1" data-page-qid="28" style="max-width: 1220px;">
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif; width: 100%;">                        
                        <li id="id_27" data-type="control_image"
                            class="form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-1" tabindex="0"
                            aria-label="Image Field" role="group" style="z-index: 1;">
                            <div class="question-wrapper questionWrapper">
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <div id="resize-27" data-component="image">
                                        <img alt="Image-27" class="form-image"
                                            src="//www.jotform.com/uploads/CEISRAEL/form_files/humanfigure.jpg" tabindex="0"
                                            style="height: 262px; width: 250px; float: right; pointer-events: none; border: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="dragHandle">
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li>                        
                        <li id="id_38" data-type="control_textarea"
                            class="form-line clearfix isNotSelected form-line-column lineAlignment-Top form-col-2" tabindex="0"
                            aria-label="Long Text Field" role="group" style="z-index: 1; flex-grow: 1;" draggable="false">                            
                            <div class="question-wrapper questionWrapper">
                                <label id="label_38" class="form-label form-label-top" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true"
                                            data-gramm="false" style="width: 100%;">Optional Note to Charlotte (i.e. medications,
                                            supplements, etc)</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <span class="form-sub-label-container" style="vertical-align: top;">
                                        <textarea id="input_38" class="form-textarea" name="q38_optionalNote" cols="40" rows="6"
                                            data-component="textarea" aria-labelledby="label_38" placeholder=""></textarea>
                                        <span class="form-sub-label" data-testid="undefined">
                                            <div class="editor-container editorNoText" style="display: inline-block;">
                                                <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true"
                                                    data-gramm="false"></div>
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="dragHandle">
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li>
                    </ul>
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                        <li id="id_22" data-type="control_fullname" class="form-line clearfix isNotSelected form-line-column lineAlignment-Top isRequired form-col-2" tabindex="0" aria-label="Full Name Field Required" role="group" style="z-index: 1;">
                            <div class="question-wrapper questionWrapper">
                                <label id="label_22" class="form-label form-label-top form-required-field" for="none" style="width: 100%;">
                                    <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                        <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Full Name</div>
                                    </div>
                                </label>
                                <div class="form-input-wide" data-layout="full" style="position: relative;">
                                    <div data-wrapper-react="true">                                    
                                        <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                                            <span class="form-sub-label" data-testid="undefined">
                                                <div class="editor-container editorHasText" style="display: inline-block;">
                                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">
                                                        Nombre:
                                                    </div>
                                                </div>
                                            </span>
                                            <input type="text" id="nombre" name="nombre" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_22 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_22 sublabel_22_last" required="" value="">                                        
                                        </span>                                                                        
                                        <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                                            <span class="form-sub-label" data-testid="undefined">
                                                <div class="editor-container editorHasText" style="display: inline-block;">
                                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">
                                                        Superior:
                                                    </div>
                                                </div>
                                            </span>
                                            <input type="text" id="superior" name="superior" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_22 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_22 sublabel_22_last" required="" value=""><br><br>
                                        </span>                          
                                        <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                                            <span class="form-sub-label" data-testid="undefined">
                                                <div class="editor-container editorHasText" style="display: inline-block;">
                                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">
                                                        Cargo:
                                                    </div>
                                                </div>
                                            </span>
                                            <input type="text" id="cargo" name="cargo" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_22 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_22 sublabel_22_last" required="" value="">                                                                                
                                        </span>
                                        <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                                            <span class="form-sub-label" data-testid="undefined">
                                                <div class="editor-container editorHasText" style="display: inline-block;">
                                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">
                                                        Área:
                                                    </div>
                                                </div>
                                            </span>
                                            <input type="text" id="area" name="area" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_22 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_22 sublabel_22_last" required="" value=""><br><br>
                                        </span>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="dragHandle">
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                                <div class="dragHandle-point"></div>
                            </div>
                            <div id="app_wizards" class="moodular collabUsers-userList"></div>
                        </li> 
                    </ul>
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                        <h2>FACTORES DE DESEMPEÑO</h2>
                        <p>Por favor, evalúa el rendimiento observado en cada uno de los siguientes indicadores seleccionando la opción que
                            mejor represente tu opinión:</p>

                        <ol>
                            <li id="id_21" data-type="control_matrix" data-inputtype="Check Box" data-shrinked="true" data-qid="21" data-order="10" data-selectioncount="0" class="form-line clearfix isNotSelected form-line-column form-line-column-clear lineAlignment-Top form-col-7" tabindex="0" aria-label="Input Table Field " role="group" style="z-index: 1;">
                                <div class="question-wrapper questionWrapper ">
                                    <label id="label_21" class="form-label form-label-top" for="none" style="width: 100%;">
                                        <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                            <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">
                                                Please check all appropriate boxes
                                            </div>
                                        </div>
                                    </label>
                                    <div class="form-input-wide" data-layout="full" style="position: relative;">
                                        <table summary="" aria-labelledby="label_21" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">                                
                                        <!-- estoy equi -->                                                                                                
                                            <tr class="form-matrix-tr form-matrix-header-tr">
                                                <th class="form-matrix-th" style="border: none;">&nbsp;</th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_0"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Sobresaliente</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_1"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Por encima de las expectativas</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Satisface las expectativas</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Por debajo de las expectativas</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Necesita mejorar</div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr class="form-matrix-tr form-matrix-value-tr"
                                                aria-labelledby="label_21 label_21_row_0">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Integrar y coordinar el trabajo del personal:</div>                                                
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="input_21_0_0"
                                                        class="form-checkbox" type="checkbox" name="q21_pleaseCheck[0][]"
                                                        tabindex="-1" aria-labelledby="label_21_col_0 label_21_row_0"
                                                        aria-label="Cells Check Box" value="You">
                                                    <label for="input_21_0_0" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="input_21_0_1"
                                                        class="form-checkbox" type="checkbox" name="q21_pleaseCheck[0][]"
                                                        tabindex="-1" aria-labelledby="label_21_col_1 label_21_row_0"
                                                        aria-label="Cells Check Box" value="Friend">
                                                    <label for="input_21_0_1" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="input_21_0_2"
                                                        class="form-checkbox" type="checkbox" name="q21_pleaseCheck[0][]"
                                                        tabindex="-1" aria-labelledby="label_21_col_2 label_21_row_0"
                                                        aria-label="Cells Check Box" value="Family">
                                                    <label for="input_21_0_2" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <!-- Nuevos campos -->
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="input_21_0_3"
                                                        class="form-checkbox" type="checkbox" name="q21_pleaseCheck[0][]"
                                                        tabindex="-1" aria-labelledby="label_21_col_3 label_21_row_0"
                                                        aria-label="Cells Check Box" value="NewOption1">
                                                    <label for="input_21_0_3" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="input_21_0_4"
                                                        class="form-checkbox" type="checkbox" name="q21_pleaseCheck[0][]"
                                                        tabindex="-1" aria-labelledby="label_21_col_4 label_21_row_0"
                                                        aria-label="Cells Check Box" value="NewOption2">
                                                    <label for="input_21_0_4" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>

                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_1">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Responsable de tomar decisiones, establecer políticas y estrategias que afecten a la organización:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor2_sobresaliente" class="form-checkbox" type="checkbox" name="factor2[]" tabindex="-1" aria-labelledby="label_factor2_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor2_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor2_por_encima" class="form-checkbox" type="checkbox" name="factor2[]" tabindex="-1" aria-labelledby="label_factor2_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor2_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor2_satisface" class="form-checkbox" type="checkbox" name="factor2[]" tabindex="-1" aria-labelledby="label_factor2_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor2_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor2_por_debajo" class="form-checkbox" type="checkbox" name="factor2[]" tabindex="-1" aria-labelledby="label_factor2_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor2_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor2_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor2[]" tabindex="-1" aria-labelledby="label_factor2_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor2_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_2">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Dirigir el mercado en el momento actual:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor3_sobresaliente" class="form-checkbox" type="checkbox" name="factor3[]" tabindex="-1" aria-labelledby="label_factor3_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor3_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor3_por_encima" class="form-checkbox" type="checkbox" name="factor3[]" tabindex="-1" aria-labelledby="label_factor3_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor3_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor3_satisface" class="form-checkbox" type="checkbox" name="factor3[]" tabindex="-1" aria-labelledby="label_factor3_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor3_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor3_por_debajo" class="form-checkbox" type="checkbox" name="factor3[]" tabindex="-1" aria-labelledby="label_factor3_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor3_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor3_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor3[]" tabindex="-1" aria-labelledby="label_factor3_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor3_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_3">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Controlar el personal y el restaurante:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor4_sobresaliente" class="form-checkbox" type="checkbox" name="factor4[]" tabindex="-1" aria-labelledby="label_factor4_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor4_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor4_por_encima" class="form-checkbox" type="checkbox" name="factor4[]" tabindex="-1" aria-labelledby="label_factor4_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor4_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor4_satisface" class="form-checkbox" type="checkbox" name="factor4[]" tabindex="-1" aria-labelledby="label_factor4_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor4_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor4_por_debajo" class="form-checkbox" type="checkbox" name="factor4[]" tabindex="-1" aria-labelledby="label_factor4_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor4_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor4_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor4[]" tabindex="-1" aria-labelledby="label_factor4_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor4_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_4">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Distribuir las funciones:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor5_sobresaliente" class="form-checkbox" type="checkbox" name="factor5[]" tabindex="-1" aria-labelledby="label_factor5_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor5_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor5_por_encima" class="form-checkbox" type="checkbox" name="factor5[]" tabindex="-1" aria-labelledby="label_factor5_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor5_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor5_satisface" class="form-checkbox" type="checkbox" name="factor5[]" tabindex="-1" aria-labelledby="label_factor5_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor5_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor5_por_debajo" class="form-checkbox" type="checkbox" name="factor5[]" tabindex="-1" aria-labelledby="label_factor5_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor5_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor5_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor5[]" tabindex="-1" aria-labelledby="label_factor5_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor5_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_5">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Controlar los procesos:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor6_sobresaliente" class="form-checkbox" type="checkbox" name="factor6[]" tabindex="-1" aria-labelledby="label_factor6_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor6_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor6_por_encima" class="form-checkbox" type="checkbox" name="factor6[]" tabindex="-1" aria-labelledby="label_factor6_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor6_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor6_satisface" class="form-checkbox" type="checkbox" name="factor6[]" tabindex="-1" aria-labelledby="label_factor6_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor6_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor6_por_debajo" class="form-checkbox" type="checkbox" name="factor6[]" tabindex="-1" aria-labelledby="label_factor6_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor6_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor6_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor6[]" tabindex="-1" aria-labelledby="label_factor6_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor6_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_6">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Controlar las actividades de las áreas operativas y administrativas:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor7_sobresaliente" class="form-checkbox" type="checkbox" name="factor7[]" tabindex="-1" aria-labelledby="label_factor7_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor7_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor7_por_encima" class="form-checkbox" type="checkbox" name="factor7[]" tabindex="-1" aria-labelledby="label_factor7_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor7_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor7_satisface" class="form-checkbox" type="checkbox" name="factor7[]" tabindex="-1" aria-labelledby="label_factor7_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor7_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor7_por_debajo" class="form-checkbox" type="checkbox" name="factor7[]" tabindex="-1" aria-labelledby="label_factor7_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor7_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor7_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor7[]" tabindex="-1" aria-labelledby="label_factor7_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor7_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_7">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Llevar un reporte mensual:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor8_sobresaliente" class="form-checkbox" type="checkbox" name="factor8[]" tabindex="-1" aria-labelledby="label_factor8_sobresaliente" aria-label="Cells Check Box" value="5">
                                                    <label for="factor8_sobresaliente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor8_por_encima" class="form-checkbox" type="checkbox" name="factor8[]" tabindex="-1" aria-labelledby="label_factor8_por_encima" aria-label="Cells Check Box" value="4">
                                                    <label for="factor8_por_encima" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor8_satisface" class="form-checkbox" type="checkbox" name="factor8[]" tabindex="-1" aria-labelledby="label_factor8_satisface" aria-label="Cells Check Box" value="3">
                                                    <label for="factor8_satisface" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor8_por_debajo" class="form-checkbox" type="checkbox" name="factor8[]" tabindex="-1" aria-labelledby="label_factor8_por_debajo" aria-label="Cells Check Box" value="2">
                                                    <label for="factor8_por_debajo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="factor8_necesita_mejorar" class="form-checkbox" type="checkbox" name="factor8[]" tabindex="-1" aria-labelledby="label_factor8_necesita_mejorar" aria-label="Cells Check Box" value="1">
                                                    <label for="factor8_necesita_mejorar" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                        </table>
                                        <label for="puntaje_promedio">PUNTAJE PROMEDIO:</label>
                                        <input type="text" id="puntaje_promedio" name="puntaje_promedio"><br><br>
                                    </div>
                                </div>
                                <div class="dragHandle">
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                </div>
                                <div id="app_wizards" class="moodular collabUsers-userList"></div>
                            </li>
                        </ol>  
                    </ul>                  
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                        <h2>COMPETENCIAS LABORALES</h2>
                        <p>Por favor, evalúa el rendimiento observado en cada una de las siguientes competencias seleccionando la opción que
                            mejor represente tu opinión:</p>
                        <ol>
                            <li id="id_21" data-type="control_matrix" data-inputtype="Check Box" data-shrinked="true" data-qid="21" data-order="10" data-selectioncount="0" class="form-line clearfix isNotSelected form-line-column form-line-column-clear lineAlignment-Top form-col-7" tabindex="0" aria-label="Input Table Field " role="group" style="z-index: 1;">
                                <div class="question-wrapper questionWrapper ">
                                    <label id="label_21" class="form-label form-label-top" for="none" style="width: 100%;">
                                        <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                            <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Please check all
                                                        appropriate boxes
                                            </div>
                                        </div>
                                    </label>
                                    <div class="form-input-wide" data-layout="full" style="position: relative;">
                                        <table summary="" aria-labelledby="label_21" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                                            <tr class="form-matrix-tr form-matrix-header-tr">
                                                <th class="form-matrix-th" style="border: none;">&nbsp;</th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_0"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Excelente</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_1"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Muy Bueno</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Normal</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Necesidad de Desarrollo</div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="form-matrix-headers form-matrix-column-headers form-matrix-column_2"
                                                    style="position: relative;">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Col Name" format="text"
                                                            contenteditable="true" data-gramm="false">Mejora Urgente</div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_x">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Liderazgo:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia1_excelente" class="form-checkbox" type="checkbox" name="competencia1[]" tabindex="-1" aria-labelledby="label_competencia1_excelente" aria-label="Cells Check Box" value="5">
                                                    <label for="competencia1_excelente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia1_muy_bueno" class="form-checkbox" type="checkbox" name="competencia1[]" tabindex="-1" aria-labelledby="label_competencia1_muy_bueno" aria-label="Cells Check Box" value="4">
                                                    <label for="competencia1_muy_bueno" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia1_normal" class="form-checkbox" type="checkbox" name="competencia1[]" tabindex="-1" aria-labelledby="label_competencia1_normal" aria-label="Cells Check Box" value="3">
                                                    <label for="competencia1_normal" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia1_necesidad_desarrollo" class="form-checkbox" type="checkbox" name="competencia1[]" tabindex="-1" aria-labelledby="label_competencia1_necesidad_desarrollo" aria-label="Cells Check Box" value="2">
                                                    <label for="competencia1_necesidad_desarrollo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia1_mejora_urgente" class="form-checkbox" type="checkbox" name="competencia1[]" tabindex="-1" aria-labelledby="label_competencia1_mejora_urgente" aria-label="Cells Check Box" value="1">
                                                    <label for="competencia1_mejora_urgente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_8">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Proactivo:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia2_excelente" class="form-checkbox" type="checkbox" name="competencia2[]" tabindex="-1" aria-labelledby="label_competencia2_excelente" aria-label="Cells Check Box" value="5">
                                                    <label for="competencia2_excelente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia2_muy_bueno" class="form-checkbox" type="checkbox" name="competencia2[]" tabindex="-1" aria-labelledby="label_competencia2_muy_bueno" aria-label="Cells Check Box" value="4">
                                                    <label for="competencia2_muy_bueno" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia2_normal" class="form-checkbox" type="checkbox" name="competencia2[]" tabindex="-1" aria-labelledby="label_competencia2_normal" aria-label="Cells Check Box" value="3">
                                                    <label for="competencia2_normal" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia2_necesidad_desarrollo" class="form-checkbox" type="checkbox" name="competencia2[]" tabindex="-1" aria-labelledby="label_competencia2_necesidad_desarrollo" aria-label="Cells Check Box" value="2">
                                                    <label for="competencia2_necesidad_desarrollo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia2_mejora_urgente" class="form-checkbox" type="checkbox" name="competencia2[]" tabindex="-1" aria-labelledby="label_competencia2_mejora_urgente" aria-label="Cells Check Box" value="1">
                                                    <label for="competencia2_mejora_urgente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_9">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Dinámico:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia3_excelente" class="form-checkbox" type="checkbox" name="competencia3[]" tabindex="-1" aria-labelledby="label_competencia3_excelente" aria-label="Cells Check Box" value="5">
                                                    <label for="competencia3_excelente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia3_muy_bueno" class="form-checkbox" type="checkbox" name="competencia3[]" tabindex="-1" aria-labelledby="label_competencia3_muy_bueno" aria-label="Cells Check Box" value="4">
                                                    <label for="competencia3_muy_bueno" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia3_normal" class="form-checkbox" type="checkbox" name="competencia3[]" tabindex="-1" aria-labelledby="label_competencia3_normal" aria-label="Cells Check Box" value="3">
                                                    <label for="competencia3_normal" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia3_necesidad_desarrollo" class="form-checkbox" type="checkbox" name="competencia3[]" tabindex="-1" aria-labelledby="label_competencia3_necesidad_desarrollo" aria-label="Cells Check Box" value="2">
                                                    <label for="competencia3_necesidad_desarrollo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia3_mejora_urgente" class="form-checkbox" type="checkbox" name="competencia3[]" tabindex="-1" aria-labelledby="label_competencia3_mejora_urgente" aria-label="Cells Check Box" value="1">
                                                    <label for="competencia3_mejora_urgente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_10">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Analítico:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia4_excelente" class="form-checkbox" type="checkbox" name="competencia4[]" tabindex="-1" aria-labelledby="label_competencia4_excelente" aria-label="Cells Check Box" value="5">
                                                    <label for="competencia4_excelente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia4_muy_bueno" class="form-checkbox" type="checkbox" name="competencia4[]" tabindex="-1" aria-labelledby="label_competencia4_muy_bueno" aria-label="Cells Check Box" value="4">
                                                    <label for="competencia4_muy_bueno" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia4_normal" class="form-checkbox" type="checkbox" name="competencia4[]" tabindex="-1" aria-labelledby="label_competencia4_normal" aria-label="Cells Check Box" value="3">
                                                    <label for="competencia4_normal" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia4_necesidad_desarrollo" class="form-checkbox" type="checkbox" name="competencia4[]" tabindex="-1" aria-labelledby="label_competencia4_necesidad_desarrollo" aria-label="Cells Check Box" value="2">
                                                    <label for="competencia4_necesidad_desarrollo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia4_mejora_urgente" class="form-checkbox" type="checkbox" name="competencia4[]" tabindex="-1" aria-labelledby="label_competencia4_mejora_urgente" aria-label="Cells Check Box" value="1">
                                                    <label for="competencia4_mejora_urgente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                            <tr class="form-matrix-values-tr" aria-labelledby="label_21 label_21_row_11">
                                                <th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                                        <div class="inlineEditor" placeholder="Type Row Name" format="text" contenteditable="true" data-gramm="false">Orientación al logro:</div>
                                                    </div>
                                                </th>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia5_excelente" class="form-checkbox" type="checkbox" name="competencia5[]" tabindex="-1" aria-labelledby="label_competencia5_excelente" aria-label="Cells Check Box" value="5">
                                                    <label for="competencia5_excelente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia5_muy_bueno" class="form-checkbox" type="checkbox" name="competencia5[]" tabindex="-1" aria-labelledby="label_competencia5_muy_bueno" aria-label="Cells Check Box" value="4">
                                                    <label for="competencia5_muy_bueno" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia5_normal" class="form-checkbox" type="checkbox" name="competencia5[]" tabindex="-1" aria-labelledby="label_competencia5_normal" aria-label="Cells Check Box" value="3">
                                                    <label for="competencia5_normal" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia5_necesidad_desarrollo" class="form-checkbox" type="checkbox" name="competencia5[]" tabindex="-1" aria-labelledby="label_competencia5_necesidad_desarrollo" aria-label="Cells Check Box" value="2">
                                                    <label for="competencia5_necesidad_desarrollo" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                                <td class="form-matrix-values">
                                                    <input readonly="" id="competencia5_mejora_urgente" class="form-checkbox" type="checkbox" name="competencia5[]" tabindex="-1" aria-labelledby="label_competencia5_mejora_urgente" aria-label="Cells Check Box" value="1">
                                                    <label for="competencia5_mejora_urgente" class="matrix-choice-label matrix-checkbox-label"></label>
                                                </td>
                                            </tr>
                                        </table>
                                        <label for="puntaje_promedio_competencias">PUNTAJE PROMEDIO:</label>
                                        <input type="text" id="puntaje_promedio_competencias" name="puntaje_promedio_competencias"><br><br>
                                    </div>
                                </div>
                                <div class="dragHandle">
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                    <div class="dragHandle-point"></div>
                                </div>
                                <div id="app_wizards" class="moodular collabUsers-userList"></div>
                            </li>
                        </ol>
                    </ul>
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                        <ol>
                            <li id="id_21" data-type="control_matrix" data-inputtype="Check Box" data-shrinked="true" data-qid="21" data-order="10" data-selectioncount="0" class="form-line clearfix isNotSelected form-line-column form-line-column-clear lineAlignment-Top form-col-7" tabindex="0" aria-label="Input Table Field " role="group" style="z-index: 1;">
                                <div class="question-wrapper questionWrapper ">                                
                                    <div class="form-input-wide" data-layout="full" style="position: relative;">
                                        <table summary="" aria-labelledby="label_21" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                                            <label for="total_puntos">TOTAL DE PUNTOS:</label>
                                            <input type="text" id="total_puntos" name="total_puntos"><br><br>
                                        </table>
                                    </div>
                                    <label id="label_21" class="form-label form-label-top" for="none" style="width: 100%;">
                                        <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                                            <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">                                            
                                                <h2>PARÁMETROS:</h2>
                                                <ul>
                                                    <li>
                                                        Si el total de puntos es &lt; 75% = Aplicar empowerment en la organización para poder cumplir con las
                                                        actividades planificadas.
                                                    </li>
                                                    <li>
                                                        Si el total de puntos es de 75% A 90% = Se deben agilizar los procesos o potenciar las habilidades
                                                        gerenciales.
                                                    </li>
                                                    <li>
                                                        Si el total de puntos es de 90% A 100% = Se deben incentivar al gerente por su desempeño productivo.
                                                    </li>
                                                </ul>                
                                            </div>
                                        </div>
                                    </label>
                                    <div class="form-input-wide" data-layout="full" style="position: relative;">
                                        <table summary="" aria-labelledby="label_21" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">                                                                                
                                            <label for="evaluado_por">EVALUADO POR:</label>
                                            <input type="text" id="evaluado_por" name="evaluado_por"><br>
                                            <label for="firma">Firma:</label>
                                            <input type="text" id="firma" name="firma"><br><br>
                                            <input type="submit" value="Enviar">
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </ul>                                        
                    <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 15px; color: rgb(85, 85, 85); font-family: 'Arial Black', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, sans-serif;">
                    </ul>                                        
                </div>
            </div>
        </div>    
    </form>
@endif