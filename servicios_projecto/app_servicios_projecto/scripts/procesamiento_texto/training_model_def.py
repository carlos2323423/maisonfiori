# En el archivo main.py
from .procesamiento_texto import extraer_cualidades_entrevista
from .procesamiento_texto import crear_archivo_csv
from .procesamiento_texto import cargar_conjunto_datos, dividir_conjunto_datos
from .procesamiento_texto import entrenar_y_evaluar_modelo
from app_servicios_projecto import views
# Texto de la entrevista (reemplaza esto con tu entrevista real)
def model_options(option, name, text):
    # return views.example_view_error(case_value)    
    switch_dict = {
        'sent_entrevista': filter_interview,
        'load_dataset': load_dataset,        
    }

    # Obtén la función del diccionario o la función predeterminada si no se encuentra la clave
    selected_case = switch_dict.get(option, default)

    # Llama a la función seleccionada
    result = selected_case(text, name)

    return result
def filter_interview(entrevista_texto, file_name):
    # Generar datos de entrenamiento simulados
    datos_entrenamiento_simulados = extraer_cualidades_entrevista(entrevista_texto)
    # Guardar datos en un archivo CSV
    ruta_archivo_csv = '../../database/csv/' + file_name
    crear_archivo_csv(datos_entrenamiento_simulados, ruta_archivo_csv)
    return ruta_archivo_csv

def load_dataset(ruta_del_archivo) :        
    # Cargar el conjunto de datos
    df = cargar_conjunto_datos(ruta_del_archivo)
    # Llamar a la función dividir_conjunto_datos
    X_train, X_test, y_train, y_test = dividir_conjunto_datos(df)
    # Ahora puedes utilizar X_train, X_test, y_train, y y_test para entrenar y evaluar tu modelo
    # Llamar a la función para entrenar y evaluar el modeloerror 
    accuracy = entrenar_y_evaluar_modelo(X_train, X_test, y_train, y_test)

def default():
    return 'opcion invalida'







entrevista_texto = """
    Entrevistador: Buenas tardes, [Nombre del candidato]. Gracias por venir hoy. ¿Cómo te encuentras?

    Candidato: Buenas tardes. Estoy muy bien, gracias. Encantado de estar aquí.

    Entrevistador: Nos alegra tenerte. Para empezar, ¿puedes contarnos un poco sobre ti y tu experiencia previa en roles similares?

    Candidato: Claro. Soy [Nombre], y he trabajado como recepcionista en [Nombre de la empresa anterior] durante los últimos dos años. Mis responsabilidades incluían gestionar las reservas, atender llamadas, y recibir a los huéspedes con un servicio amable y profesional.

    Entrevistador: Excelente. ¿Puedes hablarnos sobre una situación desafiante que hayas enfrentado en tu trabajo anterior y cómo la manejaste?

    Candidato: En una ocasión, tuvimos un problema con las reservas y el hotel estaba completamente lleno. Mantuve la calma, contacté a los huéspedes afectados y encontré soluciones alternativas para satisfacer sus necesidades. Además, implementé medidas para evitar que esto ocurriera nuevamente.

    Entrevistador: Eso demuestra habilidades importantes. En cuanto a las habilidades técnicas, ¿qué sistemas de gestión hotelera has utilizado y cuál es tu nivel de familiaridad con ellos?

    Candidato: En mi trabajo anterior, utilicé [Nombre del sistema de gestión hotelera], y tengo un nivel avanzado en su manejo. Además, estoy familiarizado con otros sistemas comunes, como [Nombre de otro sistema]. Estoy seguro de que puedo adaptarme rápidamente a cualquier plataforma que utilice su hotel.

    Entrevistador: Muy bien. La comunicación es esencial en este rol. ¿Puedes darme un ejemplo de cómo has manejado una situación en la que tenías que tratar con un cliente molesto o insatisfecho?

    Candidato: Claro. En una ocasión, un cliente estaba molesto por un error en su reserva. Escuché sus preocupaciones, me disculpé sinceramente y le proporcioné una solución inmediata, como una mejora de habitación. Al final, el cliente se fue satisfecho y agradecido.

    Entrevistador: Eso suena como una buena resolución. Por último, ¿por qué crees que eres la persona adecuada para este puesto y qué aportarías a nuestro equipo?

    Candidato: Creo que mi experiencia previa, habilidades de comunicación y capacidad para mantener la calma en situaciones desafiantes son aspectos que beneficiarían al equipo de recepción de su hotel. Estoy comprometido con proporcionar un servicio excepcional y crear una experiencia positiva para los huéspedes.

    Entrevistador: Apreciamos tus respuestas, [Nombre]. Tenemos más candidatos para entrevistar, pero te informaremos sobre el resultado en los próximos días. ¿Tienes alguna pregunta para nosotros?

    Candidato: Sí, ¿podría proporcionarme más detalles sobre las oportunidades de crecimiento profesional dentro del hotel?

    Entrevistador: Por supuesto. Después de la entrevista, podemos discutir más a fondo sobre las oportunidades de desarrollo y crecimiento en nuestro equipo. Gracias nuevamente por venir hoy.

    Candidato: Gracias a usted. Espero tener noticias suyas pronto.
"""