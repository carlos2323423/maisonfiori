<head>
    <title>Gráfico</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
</head>
<body>
    <div style="width: 50%">
        {!! $usersChart->container() !!} <!-- Contenedor del gráfico se coloca primero -->
    </div>
    {!! $usersChart->script() !!} <!-- Script se carga después -->
</body>