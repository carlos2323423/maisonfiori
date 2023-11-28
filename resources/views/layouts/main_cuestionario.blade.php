<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Tables</title>

    <!-- Estilos del primer ejemplo -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    @yield('styles1')                  
    @yield('styles2') 
    <style>
        body {
            margin: 0;
            font-family: 'Circular', -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
            -webkit-tap-highlight-color: transparent;
            min-width: 320px;
            background-color: #f8f9fc;
        }

        #dropzone {
            margin: 20px;
            padding: 20px;
            border: 2px dashed #4e73df;
            color: #4e73df;
        }

        #dropzone.dragover {
            border: 2px dashed #c6c6c6;
            background-color: #f1f1f1;
            color: #f1f1f1;
        }

        #content-wrapper {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1220px;
            font-size: 15px;
            color: rgb(85, 85, 85);
            font-family: "Arial Black", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
            background-color: #FFFFFF;
            min-height: 100vh;
        }

        #id_27 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul.form-section.page_1 {
            display: flex;
            flex-wrap: wrap;
        }

        ul.form-section.page_1>li {
            width: 50%;
            box-sizing: border-box;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        ul.form-section.page_1>li#id_30 {
            width: 100%;
            flex: none;
        }

        ul.form-section.page_1>li#id_27 {
            width: auto;
            flex: none;
        }

        ul.form-section.page_1>li#id_38 {
            align-items: center;
        }

        ul.form-section.page_1>li#id_38 .question-wrapper {
            width: 100%;
            text-align: center;
        }

        #wrapper {
            overflow-x: hidden;
        }

        .container-fluid {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #e3e6f0;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #ffffff;
            border-bottom: 1px solid #e3e6f0;
        }

        .sticky-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ffffff;
            border-top: 1px solid #e3e6f0;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: none;
            text-decoration: none;
            color: #ffffff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 50%;
            padding: 10px;
            z-index: 99;
        }

        .scroll-to-top:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

    </style>     
</head>

<body id="page-top">
    <div id="wrapper">
        @yield('slidebarmain')

        <div id="content-wrapper" class="d-flex flex-column">
            @yield('topbar')

            <div id="content">
                <div class="container-fluid">
                    @yield('Page Heading_introducction')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @yield('table_head_foot')
                                    <tbody>
                                        @yield('modal')
                                        @yield('EvaluacionAdministrador')
                                        @yield('table_row_list')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    {{-- @yield('edit_modal') --}}
    @yield('script1')
    @yield('scripts.SCRIPT_script2')    
</body>

</html>