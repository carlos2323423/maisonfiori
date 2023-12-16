# En tu script init_nltk.py
import os
import nltk

# Obtener la ruta del directorio actual del script
script_directory = os.path.dirname(os.path.abspath(__file__))

# Establecer la ruta para la carpeta nltk_data dentro del directorio del script
nltk_data_path = os.path.join(script_directory, 'nltk_data')
os.environ['NLTK_DATA'] = nltk_data_path

# Descargar recursos de NLTK
nltk.download('punkt', download_dir=nltk_data_path)
nltk.download('stopwords', download_dir=nltk_data_path)
nltk.download('wordnet', download_dir=nltk_data_path)
