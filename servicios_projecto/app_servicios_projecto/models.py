from django.db import models

# Create your models here.
class ComentarioEntrevista(models.Model):
    comentario = models.TextField()
    etiqueta = models.CharField(max_length=10)  # Puedes usar "positivo" o "negativo"

    def __str__(self):
        return self.comentario
