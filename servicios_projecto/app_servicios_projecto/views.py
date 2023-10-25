from django.shortcuts import render
from django.http import HttpResponse
from django.http import JsonResponse
from .models import MiModelo
from django.template import loader

import matplotlib.pyplot as plt

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