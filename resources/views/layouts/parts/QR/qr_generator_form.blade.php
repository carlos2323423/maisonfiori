<div class="container px-4 px-lg-5">
    <h1 class="display-4 fw-bolder" style="position: relative; z-index: 1;">Generador de Códigos QR</h1>
    <p>Ingresa la URL que deseas convertir en un código QR:</p>

    <form action="{{ 'qrgenerator_registersent' }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="NAME BY QR IMAGE" aria-label="NAME" aria-describedby="generate-button">
            <input type="text" name="url" class="form-control" placeholder="URL" aria-label="URL" aria-describedby="generate-button">
            <button type="submit" class="btn btn-outline-dark" id="generate-button">Generar Código QR</button>
        </div>
    </form>

    @if(isset($imagen))
    <h2>Código QR generado:</h2>
    <img src="{{ $imagen }}" alt="Código QR" class="img-fluid">
    @endif
</div>
