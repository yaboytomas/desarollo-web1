<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Proyectos - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            padding-top: 20px;
        }
        .uf-widget {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="mb-4">
            <div class="row">
                <div class="col-md-8">
                    <h1>Tech Solutions - Gestión de Proyectos</h1>
                </div>
                <div class="col-md-4">
                    <div class="uf-widget" id="uf-container">
                        <h5>Valor UF Hoy</h5>
                        <div id="uf-value">Cargando...</div>
                        <small id="uf-date"></small>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('projects.index') }}">Lista de Proyectos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('projects.create') }}">Nuevo Proyecto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

        <footer class="mt-5 py-3 text-center text-muted">
            <p>&copy; {{ date('Y') }} Tech Solutions</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // UF Value Component
        $(document).ready(function() {
            let retryCount = 0;
            const maxRetries = 3;
            const apiUrl = '{{ url("/api/uf") }}';
            
            function fetchUFValue() {
                $('#uf-value').html('<span class="text-secondary">Cargando...</span>');
                console.log('Fetching UF value from:', apiUrl);
                
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    timeout: 10000, // 10 seconds timeout
                    success: function(response) {
                        if(response.success) {
                            $('#uf-value').text('$' + response.value).removeClass('text-danger');
                            $('#uf-date').text('Fecha: ' + response.date);
                        } else {
                            handleError(response.message || 'Error al procesar los datos');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Log error details to console for debugging
                        console.error('UF API Error:', status, error, xhr);
                        
                        // Check for specific error types
                        if (status === 'timeout') {
                            handleError('Tiempo de espera agotado');
                        } else if (xhr.status === 404) {
                            handleError('Ruta de API no encontrada (404). Verifique la configuración de XAMPP.');
                        } else if (xhr.status === 500) {
                            handleError('Error del servidor (500)');
                        } else {
                            handleError('Error al cargar valor: ' + status);
                        }
                    }
                });
            }
            
            function handleError(errorMsg) {
                if (retryCount < maxRetries) {
                    retryCount++;
                    $('#uf-value').html('<span class="text-warning">Reintentando (' + retryCount + '/' + maxRetries + ')...</span>');
                    // Wait 2 seconds before retrying
                    setTimeout(fetchUFValue, 2000);
                } else {
                    // After max retries, display error message
                    $('#uf-value').html('<span class="text-danger">Error al cargar valor</span>');
                    $('#uf-date').html('<small>Intente <a href="javascript:void(0)" id="retry-uf">recargar</a></small>');
                    
                    // Add click handler for manual retry
                    $('#retry-uf').on('click', function() {
                        retryCount = 0;
                        fetchUFValue();
                    });
                }
            }
            
            // Initial fetch
            fetchUFValue();
        });
    </script>
</body>
</html> 