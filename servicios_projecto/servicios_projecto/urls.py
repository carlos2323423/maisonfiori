"""
URL configuration for servicios_projecto project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include
from app_servicios_projecto import views
from django.conf import settings

urlpatterns = [
    path('admin/', admin.site.urls),        
    # path(r'^$/', views.homepage, name='homepage'),    
    path('', views.homepage, name='homepage'),
    path('obtener_grafico/', views.obtener_grafico, name='obtener_grafico'),
    path('crear_comentarios_entrenamiento/', views.crear_comentarios_entrenamiento, name='crear_comentarios_entrenamiento'),
    path('start_training/', views.start_training, name='start_training'),
    path('example-view-error/', views.example_view_error, name='example_view_error'),    
    path('acces_model/', views.acces_model, name='acces_model'),
]

# Configuración de debug_toolbar solo si DEBUG está habilitado
if settings.DEBUG:
    import debug_toolbar
    urlpatterns = [
        path('__debug__/', include(debug_toolbar.urls)),
    ] + urlpatterns