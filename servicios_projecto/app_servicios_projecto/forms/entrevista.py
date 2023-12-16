# en tu_app/forms.py
from django import forms
from django.core import validators

class InterviewForm(forms.Form):
    interview_text = forms.CharField(widget=forms.Textarea)
    # Agrega un campo ChoiceField para el drop-down list
    select_options = [('sent_entrevista', 'Sent Entrevista'), ('opcion2', 'Opción 2'), ('opcion3', 'Opción 3')]
    dropdown = forms.ChoiceField(choices=select_options, required=False)    
    interview_name = forms.CharField(label='Nombre de la entrevista', validators=[validators.RegexValidator(r'^[a-zA-Z0-9#_]*$', message='Solo se permiten letras, números, "#" y "_".')])