@if ($cuestionarioModal)
  <!-- USERS Modal -->
  <div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form id="cuestionario_Administrador_form" class="user" method="POST" action="{{ route($route_name.'_registersent') }}" enctype="multipart/form-data">
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
                      <p>Por favor, evalúa el rendimiento observado en cada uno de los siguientes indicadores seleccionando la opción que mejor represente tu opinión:</p>

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
                                  <label for="factor2">Responsable de tomar decisiones, establecer políticas y estrategias que afecten a la organización:</label><br>
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
                                  <label for="factor7">Controlar las actividades de las áreas operativas y administrativas:</label><br>
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
                      <p>Por favor, evalúa el rendimiento observado en cada una de las siguientes competencias seleccionando la opción que mejor represente tu opinión:</p>

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
                                  <input type="radio" id="competencia1_necesidad_desarrollo" name="competencia1" value="2">
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
                                  <input type="radio" id="competencia2_necesidad_desarrollo" name="competencia2" value="2">
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
                                  <input type="radio" id="competencia3_necesidad_desarrollo" name="competencia3" value="2">
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
                                  <input type="radio" id="competencia4_necesidad_desarrollo" name="competencia4" value="2">
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
                                  <input type="radio" id="competencia5_necesidad_desarrollo" name="competencia5" value="2">
                                  <label for="competencia5_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
                                  <input type="radio" id="competencia5_mejora_urgente" name="competencia5" value="1">
                                  <label for="competencia5_mejora_urgente">Mejora Urgente</label><br><br>
                              </li>
                          </div>
                      </ol>
                      <div class="form-group">
                          <label for="puntaje_promedio_competencias">PUNTAJE PROMEDIO:</label>
                          <input type="text" id="puntaje_promedio_competencias" name="puntaje_promedio_competencias"><br><br>
                      </div>
                      <div class="form-group">
                          <label for="total_puntos">TOTAL DE PUNTOS:</label>
                          <input type="text" id="total_puntos" name="total_puntos"><br><br>
                      </div>

                      <h2>PARÁMETROS:</h2>
                      <ul>
                          <li>
                              Si el total de puntos es &lt; 75% = Aplicar empowerment en la organización para poder cumplir con las actividades planificadas.
                          </li>
                          <li>
                              Si el total de puntos es de 75% A 90% = Se deben agilizar los procesos operativos y administrativos.
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
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre"><br><br>

      <label for="superior">Superior:</label>
      <input type="text" id="superior" name="superior"><br><br>

      <label for="cargo">Cargo:</label>
      <input type="text" id="cargo" name="cargo"><br><br>

      <label for="area">Área:</label>
      <input type="text" id="area" name="area"><br><br>

      <h2>FACTORES DE DESEMPEÑO</h2>
      <p>Por favor, evalúa el rendimiento observado en cada uno de los siguientes indicadores seleccionando la opción que mejor represente tu opinión:</p>

      <ol>
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

          <li>
              <label for="factor2">Responsable de tomar decisiones, establecer políticas y estrategias que afecten a la organización:</label><br>
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

          <li>
              <label for="factor7">Controlar las actividades de las áreas operativas y administrativas:</label><br>
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
      </ol>

      <label for="puntaje_promedio">PUNTAJE PROMEDIO:</label>
      <input type="text" id="puntaje_promedio" name="puntaje_promedio"><br><br>

      <h2>COMPETENCIAS LABORALES</h2>
      <p>Por favor, evalúa el rendimiento observado en cada una de las siguientes competencias seleccionando la opción que mejor represente tu opinión:</p>

      <ol>
          <li>
              <label for="competencia1">Liderazgo:</label><br>
              <input type="radio" id="competencia1_excelente" name="competencia1" value="5">
              <label for="competencia1_excelente">Excelente</label><br>
              <input type="radio" id="competencia1_muy_bueno" name="competencia1" value="4">
              <label for="competencia1_muy_bueno">Muy Bueno</label><br>
              <input type="radio" id="competencia1_normal" name="competencia1" value="3">
              <label for="competencia1_normal">Normal</label><br>
              <input type="radio" id="competencia1_necesidad_desarrollo" name="competencia1" value="2">
              <label for="competencia1_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
              <input type="radio" id="competencia1_mejora_urgente" name="competencia1" value="1">
              <label for="competencia1_mejora_urgente">Mejora Urgente</label><br><br>
          </li>

          <li>
              <label for="competencia2">Proactivo:</label><br>
              <input type="radio" id="competencia2_excelente" name="competencia2" value="5">
              <label for="competencia2_excelente">Excelente</label><br>
              <input type="radio" id="competencia2_muy_bueno" name="competencia2" value="4">
              <label for="competencia2_muy_bueno">Muy Bueno</label><br>
              <input type="radio" id="competencia2_normal" name="competencia2" value="3">
              <label for="competencia2_normal">Normal</label><br>
              <input type="radio" id="competencia2_necesidad_desarrollo" name="competencia2" value="2">
              <label for="competencia2_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
              <input type="radio" id="competencia2_mejora_urgente" name="competencia2" value="1">
              <label for="competencia2_mejora_urgente">Mejora Urgente</label><br><br>
          </li>

          <li>
              <label for="competencia3">Dinámico:</label><br>
              <input type="radio" id="competencia3_excelente" name="competencia3" value="5">
              <label for="competencia3_excelente">Excelente</label><br>
              <input type="radio" id="competencia3_muy_bueno" name="competencia3" value="4">
              <label for="competencia3_muy_bueno">Muy Bueno</label><br>
              <input type="radio" id="competencia3_normal" name="competencia3" value="3">
              <label for="competencia3_normal">Normal</label><br>
              <input type="radio" id="competencia3_necesidad_desarrollo" name="competencia3" value="2">
              <label for="competencia3_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
              <input type="radio" id="competencia3_mejora_urgente" name="competencia3" value="1">
              <label for="competencia3_mejora_urgente">Mejora Urgente</label><br><br>
          </li>

          <li>
              <label for="competencia4">Analítico:</label><br>
              <input type="radio" id="competencia4_excelente" name="competencia4" value="5">
              <label for="competencia4_excelente">Excelente</label><br>
              <input type="radio" id="competencia4_muy_bueno" name="competencia4" value="4">
              <label for="competencia4_muy_bueno">Muy Bueno</label><br>
              <input type="radio" id="competencia4_normal" name="competencia4" value="3">
              <label for="competencia4_normal">Normal</label><br>
              <input type="radio" id="competencia4_necesidad_desarrollo" name="competencia4" value="2">
              <label for="competencia4_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
              <input type="radio" id="competencia4_mejora_urgente" name="competencia4" value="1">
              <label for="competencia4_mejora_urgente">Mejora Urgente</label><br><br>
          </li>

          <li>
              <label for="competencia5">Orientación al logro:</label><br>
              <input type="radio" id="competencia5_excelente" name="competencia5" value="5">
              <label for="competencia5_excelente">Excelente</label><br>
              <input type="radio" id="competencia5_muy_bueno" name="competencia5" value="4">
              <label for="competencia5_muy_bueno">Muy Bueno</label><br>
              <input type="radio" id="competencia5_normal" name="competencia5" value="3">
              <label for="competencia5_normal">Normal</label><br>
              <input type="radio" id="competencia5_necesidad_desarrollo" name="competencia5" value="2">
              <label for="competencia5_necesidad_desarrollo">Necesidad de Desarrollo</label><br>
              <input type="radio" id="competencia5_mejora_urgente" name="competencia5" value="1">
              <label for="competencia5_mejora_urgente">Mejora Urgente</label><br><br>
          </li>
      </ol>

      <label for="puntaje_promedio_competencias">PUNTAJE PROMEDIO:</label>
      <input type="text" id="puntaje_promedio_competencias" name="puntaje_promedio_competencias"><br><br>

      <label for="total_puntos">TOTAL DE PUNTOS:</label>
      <input type="text" id="total_puntos" name="total_puntos"><br><br>

      <h2>PARÁMETROS:</h2>
      <ul>
          <li>
              Si el total de puntos es &lt; 75% = Aplicar empowerment en la organización para poder cumplir con las actividades planificadas.
          </li>
          <li>
              Si el total de puntos es de 75% A 90% = Se deben agilizar los procesos o potenciar las habilidades gerenciales.
          </li>
          <li>
              Si el total de puntos es de 90% A 100% = Se deben incentivar al gerente por su desempeño productivo.
          </li>
      </ul>

      <label for="evaluado_por">EVALUADO POR:</label>
      <input type="text" id="evaluado_por" name="evaluado_por"><br>

      <label for="firma">Firma:</label>
      <input type="text" id="firma" name="firma"><br><br>

      <input type="submit" value="Enviar">
  </form>
@endif
