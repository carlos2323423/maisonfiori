# En el archivo scripts/procesamiento_texto.py
import nltk
import joblib
import shap
import random
import re
import os
import pandas as pd
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
from sklearn.metrics import accuracy_score

def asignar_etiqueta(cualidades_simuladas, cualidades_positivas, cualidades_negativas):
    """
    Asigna etiquetas en base a las cualidades simuladas.

    Parámetros:
    - cualidades_simuladas: Lista de cualidades simuladas.

    Retorna:
    - Etiqueta: 0 si hay más cualidades negativas, 1 si hay más cualidades positivas.
    """
    # Contar la cantidad de cualidades positivas y negativas
    cantidad_positivas = sum(cualidad in cualidades_positivas for cualidad in cualidades_simuladas)
    cantidad_negativas = sum(cualidad in cualidades_negativas for cualidad in cualidades_simuladas)

    # Asignar la etiqueta en base a las cantidades
    if cantidad_positivas > cantidad_negativas:
        return 1
    elif cantidad_negativas > cantidad_positivas:
        return 0
    else:
        # En caso de empate, se elige aleatoriamente entre 0 y 1
        return random.choice([0, 1])

def extraer_cualidades_entrevista(entrevista, num_muestras=100):
    """
    Extrae cualidades positivas y negativas de una entrevista y genera datos simulados de entrenamiento.

    Parámetros:
    - entrevista: Texto de la entrevista.
    - num_muestras: Número de muestras a generar (por defecto, 100).

    Retorna:
    - DataFrame con datos simulados de entrenamiento.
    """
    # Listas de cualidades positivas y negativas
    cualidades_positivas = [
        'Experiencia Relevante', 'Manejo de Situaciones Desafiantes', 'Habilidades de Comunicación',
        'Conocimiento de Sistemas', 'Adaptabilidad', 'Compromiso con el Servicio al Cliente',
        'Interés en Desarrollo Profesional', 'Buenas', 'Profesional', 'Excelente', 'Importantes',
        'Técnicas', 'Comunes', 'Satisfecho', 'Agradecido', 'Sincera', 'Inmediata', 'Positiva',
        'Desarrollo', 'Crecimiento', 'Oportunidades', 'Nuevos',
    ]

    cualidades_negativas = [
        'No Se Mencionan Habilidades Específicas', 'Falta de Ejemplos Diversos',
        'No se Mencionan Logros Cuantificables', 'Poca Mención de Habilidades Adicionales',
        'Desafiante',
    ]

    # Inicializar el diccionario data
    data = {
        'columna_texto': [],
        'columna_etiqueta': []
    }

    # Extraer cualidades de la entrevista
    cualidades_extraidas = re.findall(r'\b(?:' + '|'.join(cualidades_positivas + cualidades_negativas) + r')\b', entrevista, flags=re.IGNORECASE)

    # Crear datos simulados con cualidades extraídas
    for _ in range(num_muestras):
        texto_simulado = " ".join(random.sample(cualidades_extraidas, k=random.randint(3, 7)))
        etiqueta_simulada = asignar_etiqueta(texto_simulado, cualidades_positivas, cualidades_negativas)
        data['columna_texto'].append(texto_simulado)
        data['columna_etiqueta'].append(etiqueta_simulada)

    return pd.DataFrame(data)


def crear_archivo_csv(data, ruta_archivo):
    """
    Crea un archivo CSV a partir de un diccionario o un DataFrame de pandas.

    Parámetros:
    - data: Diccionario o DataFrame que representa los datos.
    - ruta_archivo: Ruta del archivo CSV que se creará.

    Retorna:
    - None
    """
    try:
        df = pd.DataFrame(data)
    except Exception as e:
        raise ValueError(f"Error al convertir 'data' a DataFrame: {e}")        

    # Crear el directorio si no existe
    os.makedirs(os.path.dirname(ruta_archivo), exist_ok=True)
    # Guardar el DataFrame como CSV
    df.to_csv(ruta_archivo, index=False)
    print(f"Archivo CSV creado en: {ruta_archivo}")


def cargar_conjunto_datos(ruta_archivo):
    """
    Carga un conjunto de datos desde un archivo CSV.

    Parámetros:
    - ruta_archivo: La ruta del archivo CSV que contiene el conjunto de datos.

    Retorna:
    - df: El DataFrame que contiene el conjunto de datos.
    """
    try:
        df = pd.read_csv(ruta_archivo)
        if 'columna_texto' not in df.columns or 'columna_etiqueta' not in df.columns:
            raise ValueError("El DataFrame debe tener columnas 'columna_texto' y 'columna_etiqueta'.")
        return df
    except Exception as e:
        print(f"Error al cargar el conjunto de datos: {e}")
        return None

def preprocess_text(text, language='english'):
    """
    Realiza la tokenización, eliminación de stopwords y lematización de un texto.

    Parámetros:
    - text: El texto a procesar.
    - language: El idioma del texto (por defecto, 'english').

    Retorna:
    - preprocessed_text: El texto preprocesado.
    """
    tokens = nltk.word_tokenize(text)
    stop_words = set(stopwords.words(language))
    lemmatizer = WordNetLemmatizer()
    tokens = [lemmatizer.lemmatize(word) for word in tokens if word.lower() not in stop_words]
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
    tfidf_vectorizer = TfidfVectorizer(max_features=max_features)
    X = tfidf_vectorizer.fit_transform(df[columna_texto])
    return X, tfidf_vectorizer

# ... (las funciones anteriores continúan)

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
        comentario = request.POST.get('comentario')
        comentario_preprocesado = preprocess_text(comentario)
        clasificacion = modelo.predict([comentario_preprocesado])
        return HttpResponse(f'Clasificación del comentario: {clasificacion[0]}')
    return render(request, template_name)

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

def entrenar_y_evaluar_modelo(X_train, X_test, y_train, y_test):
    """
    Entrena y evalúa un modelo de clasificación de texto.

    Parámetros:
    - X_train: Conjunto de entrenamiento de características del conjunto de datos.
    - X_test: Conjunto de prueba de características del conjunto de datos.
    - y_train: Conjunto de entrenamiento de etiquetas del conjunto de datos.
    - y_test: Conjunto de prueba de etiquetas del conjunto de datos.

    Retorna:
    - accuracy: Exactitud del modelo.
    """

    # Crear y entrenar el modelo
    modelo = make_pipeline(TfidfVectorizer(), MultinomialNB())
    modelo.fit(X_train, y_train)

    # Evaluar el modelo
    y_pred = modelo.predict(X_test)
    accuracy = accuracy_score(y_test, y_pred)

    print(f"Exactitud del modelo: {accuracy}")

    return accuracy

def dividir_conjunto_datos(df, columna_texto='comentario_preprocesado', columna_etiqueta='etiqueta', random_state=1):
    """
    Divide un conjunto de datos en conjuntos de entrenamiento y prueba.

    Parámetros:
    - df: DataFrame de pandas que contiene los datos.
    - columna_texto: Nombre de la columna que contiene los textos.
    - columna_etiqueta: Nombre de la columna que contiene las etiquetas.
    - random_state: Semilla para la reproducibilidad en la división del conjunto de datos.

    Retorna:
    - X_train, X_test, y_train, y_test: Conjuntos de entrenamiento y prueba para características y etiquetas, respectivamente.
    """

    X = df[columna_texto]
    y = df[columna_etiqueta]

    X_train, X_test, y_train, y_test = train_test_split(X, y, random_state=random_state)

    return X_train, X_test, y_train, y_test

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
    if modelo:
        joblib.dump(modelo, nombre_archivo)
        print(f"Modelo guardado en {nombre_archivo}")
    else:
        print("No se puede guardar el modelo porque no existe.")    

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
    probabilidad_positiva = modelo.predict_proba([comentario_preprocesado])[0][1]

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

    clasificacion_final = "positivo" if probabilidad_positiva > umbral else "negativo"

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
    shap_plot = shap.summary_plot(explainer.shap_values(tfidf_vectorizer.transform([comentario_preprocesado]).toarray()),
                                  feature_names=tfidf_vectorizer.get_feature_names_out(), plot_type="bar")

    return shap_plot

