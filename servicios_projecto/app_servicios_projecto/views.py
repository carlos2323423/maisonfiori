import nltk
import sys
import pdb
import logging
import matplotlib.pyplot as plt
from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.http import JsonResponse
# from .models import MiModelo
from .models import ComentarioEntrevista
from django.template import loader
from .forms.entrevista import InterviewForm
from django.http import HttpResponseServerError, HttpRequest
from .scripts.procesamiento_texto.training_model_def import model_options

# Descargar recursos de NLTK
nltk.download('punkt')
nltk.download('stopwords')
nltk.download('wordnet')

def start_training(request):
    # pdb.set_trace()
    # dd(request)    
    if request.method == 'POST':
        form = InterviewForm(request.POST)
        if form.is_valid():
            interview_text = form.cleaned_data['interview_text']
            # Llama a la función acces_model con el texto de la entrevista
            acces_model(interview_text)
            return redirect(request.META.get('HTTP_REFERER', '/'))
    else:
        form = InterviewForm()

    return render(request, 'start_training.html', {'form': form})

def mi_vista(request):
    # Resto de la lógica de tu vista
    return render(request, 'mi_template.html')

# Create your views here.
def homepage(request) :
    return HttpResponse('homepage')
def about(request) :
    return HttpResponse('about')

def mi_vista(request):
    # Lógica de la vista
    return HttpResponse("¡Hola desde la vista!")

def otra_vista(request):
    # Lógica de la vista
    return HttpResponse("Otra vista")

def vista_con_grafico(request):
    # Lógica para crear un gráfico
    plt.plot([1, 2, 3, 4])
    plt.xlabel('Eje X')
    plt.ylabel('Eje Y')
    plt.title('Gráfico de ejemplo')

    # Resto de la lógica de la vista
    return HttpResponse("Vista con gráfico")

def obtener_grafico(request):
    # Generar el gráfico utilizando matplotlib
    plt.plot([1, 2, 3, 4, 5])
    plt.xlabel('Eje X')
    plt.ylabel('Eje Y')
    plt.title('Gráfico de ejemplo')

    # Guardar el gráfico en un archivo o en memoria

    # Devolver el gráfico como una respuesta HTTP
    response = HttpResponse(content_type='image/png')
    plt.savefig(response, format='png')
    return response

nuevo_comentario = ComentarioEntrevista(
    comentario='Este es un comentario de ejemplo.',
    etiqueta='positivo'
)

def example_view_error(parameter):
    # Imprimir información de la solicitud en la consola
    if isinstance(parameter, HttpRequest):
        request = parameter
        print("Método de solicitud:", request.method)
        print("Parámetros GET:", request.GET)
        print("Parámetros POST:", request.POST)
        print("Cabeceras de solicitud:", request.headers)

        # También puedes utilizar logging para registrar la información
        logging.info("Método de solicitud: %s", request.method)
        logging.info("Parámetros GET: %s", request.GET)
        logging.info("Parámetros POST: %s", request.POST)
        logging.info("Cabeceras de solicitud: %s", request.headers)

        # Resto de tu lógica de vista
        data = 'Hello World'
        context = {
            'data': data,
            'request_method': request.method,
            'get_parameters': request.GET,
            'post_parameters': request.POST,
            'request_headers': request.headers,
        }
        return render(request, 'view_error/response.html', context)    
    elif isinstance(parameter, str):
        # Si parameter es una cadena, realiza alguna lógica específica para cadenas
        # Puedes personalizar esto según tus necesidades
        data = 'Hello World'
        context = {
            'data': data,
            'parameter_value': parameter,
        }
        return render(parameter, 'view_error/parameter.html', context)
    else:
        context = {
            'type': type(parameter),
            'value': parameter,
        }
        return render(parameter, 'view_error/parameter.html', context)
        # Manejar otros casos según sea necesario
    return HttpResponse("Invalid parameter type")

def crear_comentarios_entrenamiento(request):
    # Crear comentarios de entrenamiento
    ComentarioEntrevista.objects.create(comentario="El candidato fue muy proactivo y demostró habilidades excepcionales.", etiqueta="positivo")
    ComentarioEntrevista.objects.create(comentario="Hubo falta de comunicación y el candidato parecía desinteresado.", etiqueta="negativo")
    # Agregar más comentarios según sea necesario

    # Puedes añadir un mensaje o cualquier otra lógica aquí si es necesario

    return render(request, 'consuta completada')

def acces_model(request):
    # return example_view_error(request)
    # dropdown = request.POST.dropdown    
    dropdown_value = request.POST.get('dropdown')
    interview_name = request.POST.get('interview_name')
    interview_text = request.POST.get('interview_text')
    # request.POST.interview_text
    model_options(dropdown_value, interview_name, interview_text)
    try:
        # Redirigir a la última página cargada
        return redirect(request.META.get('HTTP_REFERER', '/'))
    except Exception as e:
        # Manejar la excepción y devolver una respuesta adecuada
        return HttpResponseServerError(f"Error al procesar la solicitud: {str(e)}")


def dd(data):
    print(data)
    # sys.exit()

def some_view(request):
    # ... tu lógica ...
    
    # Agrega este punto de interrupción
    pdb.set_trace()
    
    # ... el resto de tu lógica ...
