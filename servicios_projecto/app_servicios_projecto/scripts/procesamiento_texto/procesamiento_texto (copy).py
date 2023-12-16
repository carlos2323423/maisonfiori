# En el archivo scripts/procesamiento_texto.py
import nltk
import joblib
import shap
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.preprocessing import MinMaxScaler
from sklearn.model_selection import train_test_split
from sklearn.naive_bayes import MultinomialNB
from sklearn.pipeline import make_pipeline
from sklearn import metrics
from django.http import HttpResponse
from django.shortcuts import render


def preprocess_text(text):
    # Tokenización
    tokens = nltk.word_tokenize(text)

    # Eliminación de stopwords y lematización
    stop_words = set(stopwords.words('english'))
    lemmatizer = WordNetLemmatizer()
    tokens = [lemmatizer.lemmatize(word) for word in tokens if word.lower() not in stop_words]

    # Reconstruir el texto
    preprocessed_text = ' '.join(tokens)

    return preprocessed_text

def calcular_tfidf(df, columna_texto, max_features=5000):
    """
    Calcula la matriz TF-IDF para una colección de documentos de texto en un DataFrame.

    Parámetros:
    - df: DataFrame de pandas que contiene la colección de documentos.
    - columna_texto: Nombre de la columna que contiene los documentos de texto.
    - max_features: Número máximo de características (palabras) a tener en cuenta.

    Retorna:
    - X: Matriz TF-IDF resultante.
    - tfidf_vectorizer: Objeto TfidfVectorizer ajustado.
    """

    # Inicializar el vectorizador TF-IDF
    tfidf_vectorizer = TfidfVectorizer(max_features=max_features)

    # Calcular la matriz TF-IDF
    X = tfidf_vectorizer.fit_transform(df[columna_texto])

    return X, tfidf_vectorizer

def normalizar_matriz(matriz):
    """
    Normaliza una matriz utilizando Min-Max Scaling.

    Parámetros:
    - matriz: Matriz que se va a normalizar.

    Retorna:
    - matriz_normalizada: Matriz normalizada.
    - scaler: Objeto MinMaxScaler ajustado.
    """

    # Inicializar el escalador Min-Max
    scaler = MinMaxScaler()

    # Normalizar la matriz
    matriz_normalizada = scaler.fit_transform(matriz)

    return matriz_normalizada, scaler

def entrenar_y_evaluar_modelo(df, columna_texto='comentario_preprocesado', columna_etiqueta='etiqueta', random_state=1):
    """
    Entrena y evalúa un modelo de clasificación de texto.

    Parámetros:
    - df: DataFrame de pandas que contiene los datos.
    - columna_texto: Nombre de la columna que contiene los textos.
    - columna_etiqueta: Nombre de la columna que contiene las etiquetas.
    - random_state: Semilla para la reproducibilidad en la división del conjunto de datos.

    Retorna:
    - accuracy: Exactitud del modelo.
    """

    # Dividir el conjunto de datos
    X_train, X_test, y_train, y_test = train_test_split(df[columna_texto], df[columna_etiqueta], random_state=random_state)

    # Crear y entrenar el modelo
    modelo = make_pipeline(TfidfVectorizer(), MultinomialNB())
    modelo.fit(X_train, y_train)

    # Evaluar el modelo
    accuracy = modelo.score(X_test, y_test)

    print(f"Exactitud del modelo: {accuracy}")

    return accuracy

def guardar_modelo(modelo, nombre_archivo='modelo_entrenado.joblib'):
    """
    Guarda un modelo entrenado en un archivo utilizando joblib.

    Parámetros:
    - modelo: El modelo entrenado que se va a guardar.
    - nombre_archivo: Nombre del archivo donde se guardará el modelo.

    Retorna:
    - None
    """

    # Guardar el modelo
    joblib.dump(modelo, nombre_archivo)

    print(f"Modelo guardado en {nombre_archivo}")

# Uso de la función
# Supongamos que 'modelo' es tu modelo entrenado
# guardar_modelo(modelo)

def predecir_etiqueta_nuevo_comentario(modelo, nuevo_comentario):
    """
    Utiliza un modelo entrenado para predecir la etiqueta de un nuevo comentario.

    Parámetros:
    - modelo: El modelo de clasificación de texto entrenado.
    - nuevo_comentario: Lista que contiene el nuevo comentario a clasificar.

    Retorna:
    - clasificacion: La etiqueta predicha para el nuevo comentario.
    """

    # Realizar la predicción
    clasificacion = modelo.predict(nuevo_comentario)

    return clasificacion

# Uso de la función
# Supongamos que 'modelo' es tu modelo entrenado y 'nuevo_comentario' es el comentario a clasificar
# clasificacion_predicha = predecir_etiqueta_nuevo_comentario(modelo, nuevo_comentario)
# print(clasificacion_predicha)

def procesar_comentario(request, modelo, preprocess_text, template_name='formulario_comentario.html'):
    """
    Procesa un comentario enviado a través de un formulario.

    Parámetros:
    - request: Objeto de solicitud de Django.
    - modelo: El modelo de clasificación de texto entrenado.
    - preprocess_text: La función de preprocesamiento de texto.
    - template_name: Nombre de la plantilla HTML para renderizar el formulario.

    Retorna:
    - HttpResponse: Una respuesta HTTP que puede incluir la clasificación del comentario.
    """

    if request.method == 'POST':
        comentario = request.POST.get('comentario')  # Obtener el comentario del formulario

        # Preprocesar el comentario
        comentario_preprocesado = preprocess_text(comentario)

        # Clasificar el comentario utilizando el modelo cargado
        clasificacion = modelo.predict([comentario_preprocesado])

        # Puedes utilizar la clasificación para realizar acciones adicionales en tu sistema
        # Por ejemplo, almacenar la clasificación en la base de datos o mostrar un mensaje en la interfaz de usuario

        return HttpResponse(f'Clasificación del comentario: {clasificacion[0]}')

    return render(request, template_name)  # Renderizar el formulario


def obtener_probabilidad_positiva(modelo, comentario_preprocesado):
    """
    Obtiene la probabilidad estimada de que un comentario pertenezca a la clase positiva.

    Parámetros:
    - modelo: El modelo de clasificación de texto entrenado.
    - comentario_preprocesado: El comentario preprocesado para el cual se desea obtener la probabilidad.

    Retorna:
    - probabilidad_positiva: La probabilidad estimada de pertenencia a la clase positiva.
    """

    # Obtener las probabilidades de clasificación continua
    probabilidades = modelo.predict_proba([comentario_preprocesado])

    # Las probabilidades[0][0] corresponde a la probabilidad de la clase negativa
    # Las probabilidades[0][1] corresponde a la probabilidad de la clase positiva
    probabilidad_positiva = probabilidades[0][1]

    return probabilidad_positiva

def clasificar_binario(probabilidad_positiva, umbral=0.5):
    """
    Clasifica binariamente basado en una probabilidad y un umbral.

    Parámetros:
    - probabilidad_positiva: La probabilidad estimada de pertenencia a la clase positiva.
    - umbral: El umbral para la clasificación binaria (por defecto, 0.5).

    Retorna:
    - clasificacion_final: La clasificación final ("positivo" o "negativo").
    """

    if probabilidad_positiva > umbral:
        clasificacion_final = "positivo"
    else:
        clasificacion_final = "negativo"

    return clasificacion_final

def obtener_importancias_caracteristicas_shap(modelo, tfidf_vectorizer, comentario_preprocesado):
    """
    Obtiene e interpreta las importancias de características utilizando SHAP para un comentario específico.

    Parámetros:
    - modelo: El modelo de clasificación de texto entrenado.
    - tfidf_vectorizer: El vectorizador TF-IDF utilizado para preprocesar el texto.
    - comentario_preprocesado: El comentario preprocesado para el cual se desea obtener las importancias.

    Retorna:
    - shap_plot: El gráfico de resumen de SHAP que muestra las importancias de características.
    """

    # Crear un objeto Explainer de SHAP
    explainer = shap.Explainer(modelo.named_steps['multinomialnb'])

    # Calcular los valores SHAP para el comentario preprocesado
    shap_values = explainer.shap_values(tfidf_vectorizer.transform([comentario_preprocesado]).toarray())

    # Visualizar las importancias de características
    shap_plot = shap.summary_plot(shap_values, feature_names=tfidf_vectorizer.get_feature_names_out(), plot_type="bar")

    return shap_plot
