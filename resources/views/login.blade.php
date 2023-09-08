<!DOCTYPE html>
<html>
<head>
  <style>
    /* Estilos para la barra superior */
    .top-bar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 63px;
      background-color: #f3f3f3;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }
    .top-bar button {
      padding: 5px 10px;
      background-color: #e6e6e6;
      color: #333;
      border: none;
      border-radius: 5px;
      cursor: pointer;      
    }
    .button-container {
      margin-right: 20px;      
    }

    /* Estilos para el pop-up modal */
    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 20px;
      color: #999;
      cursor: pointer;
    }
    .modal {
      display: none; /* Ocultar el modal por defecto */
      position: fixed; /* Posición fija para mantenerlo en el centro de la pantalla */
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      padding: 20px;
      background-color: #f3f3f3;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      border: 2px solid #e6e6e6; /* Margen de color gris claro (#e6e6e6) con 2px de ancho */
      background-image: url('image/images.png'); /* Ruta de la imagen de fondo */
      background-size: cover; /* Ajustar la imagen de fondo al tamaño del div */
      font-family: Arial, sans-serif;
      margin-top: 100px; /* Añadir margen superior para evitar que se solape con la barra superior */
    }

    /* Estilos para los campos de formulario */
    .modal input[type="text"],
    .modal input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    /* Estilos para el botón de inicio de sesión */
    .modal button {
      width: 100%;
      padding: 10px;
      background-color: #003366;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Estilos para el mensaje de inicio de sesión exitoso */
    .success-message {
      position: relative;
      margin-top: 10px;
      padding: 10px;
      background-color: #009933;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      display: none;
      animation: fadeOut 5s forwards;
      font-family: Arial, sans-serif;
      z-index: 3; /* Asegura que el mensaje de éxito esté por encima del contenedor de la imagen de fondo */
    }

    /* Estilos para el botón de cerrar */
    .close-button {
      position: absolute;
      top: 5px;
      right: 5px;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
    }

    /* Estilos para el contenedor de mensajes */
    #successContainer {
      position: fixed;
      top: 10px;
      left: 10px;
      bottom: 10px;      
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      min-height: 50px; /* Altura mínima para el contenedor */
      z-index: 3; /* Asegura que el contenedor de mensajes esté por encima del contenedor de la imagen de fondo */
    }    

    /* Animación para desvanecer el mensaje */
    @keyframes fadeOut {
      0% { opacity: 1; }
      90% { opacity: 1; }
      100% { opacity: 0; }
    }    

    .background-container {
      position: absolute;
      top: 63px;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: url('storage/image/72217578_2209672089144508_4056374337924497408_n.png');
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat; 
      z-index: 0; /* Asegura que la imagen de fondo esté detrás de los demás elementos */
    }
    .error-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }

    .error-message {
        font-size: 24px;
        font-weight: bold;
        background-color: red;
        color: white;
        padding: 10px;
    }
  </style>
</head>
<body>
<div class="error-container">
    @if(session()->has('error'))
        <div class="error-message">
            {{ session()->get('error') }}
        </div>
    @endif
</div>
  <!-- Barra superior -->
  <div class="top-bar">
    <!-- Botón para abrir el pop-up modal -->
    <div class="button-container">
        <button onclick="openModal()">Iniciar sesión</button>
    </div>
    <div class="button-container">
        <button onclick="openModal()">Registrar sesión</button>
    </div>
  </div>  
  <div class="background-container"></div> <!-- Movido fuera del contenedor principal -->
  <!-- Pop-up modal -->
  <div id="modal" class="modal">
    <form method="POST" action="{{ route('user_loginsent') }}">
    @csrf
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Bienvenido a Maison Fiori Web</h2>
        <input name="email" type="text" placeholder="Email"><br>
        <input name="password" type="password" placeholder="Contraseña">
        <button type="submit" onclick="login()">Iniciar sesión</button>        
    </form>
  </div>

  <!-- Contenedor para los mensajes de inicio de sesión exitosos -->
  <div id="successContainer"></div>

  <script>
    // Función para abrir el pop-up modal
    function openModal() {
      document.getElementById("modal").style.display = "block";
    }
    function closeModal() {
      document.getElementById("modal").style.display = "none";
    }

    // Función para procesar el inicio de sesión
    function login() {
      var successContainer = document.getElementById("successContainer");
      var successMessage = document.createElement("div");
      successMessage.className = "success-message";
      successMessage.innerHTML = "Inicio de sesión exitoso <span class='close-button' onclick='closeMessage(this.parentNode)'>X</span>";
      successContainer.appendChild(successMessage);
      // Mostrar el mensaje de inicio de sesión exitoso
      successMessage.style.display = "block";
      // Cerrar el mensaje después de 10 segundos
      setTimeout(function() {
        closeMessage(successMessage);
      }, 10000);
    }

    // Función para cerrar el mensaje
    function closeMessage(message) {
      message.style.animation = "fadeOut 1s forwards";

      setTimeout(function() {
        message.parentNode.removeChild(message);
      }, 1000);
    }
  </script>
</body>
</html>