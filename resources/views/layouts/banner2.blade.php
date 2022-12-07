@section('banner2')
<html>
    <head>
        <!-- Importing jquery cdn -->
        <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
            </script>
        
            <script src=
        "https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity=
        "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
        
            <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity=
        "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>
        
            <!-- Importing icon cdn -->
            <link rel="stylesheet" href=
        "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
            <!-- Importing core bootstrap cdn -->
            <link rel="stylesheet" href=
        "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                integrity=
        "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
        
            <script src=
        "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity=
        "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>
        
            <!-- Importing datepicker cdn -->
            <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
            </script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            
            label {
                font-family:"Calibri, Body";
                font-size:15px;
            }            
            h1 {
                font-family:"Calibri, Body";
                font-size:40px;
            }
            h2 {
                font-family:"Calibri, Body";
                font-size:20px;
            }
            .leftdiv{
                float: left;
                width: 28%;    
            }
            .middlediv
            {
                float: left;            
            }
            .rightdiv{
                float: left;   
                text-align: center;
            }
            div{
                padding : 1%;
                /* color: white; */
                /* background-color:grey; */
                /* width: 28%; */
                /* border: 1px solid black; */
            }
            .subtittle{
                text-align: center;
            }
            .toolbar{
                /* height: 40px; */
                background-color:grey;                
            }
            .boxforfloat{
                clear: both;
            }
            .container{                       
                width: 100%;                                               
            }            

            input {
                padding: 22px 15px !important;
                border: 1px solid #CFD8DC !important;
                border-radius: 4px !important;
                box-sizing: border-box;
                background-color: #fff !important;
                color: #000 !important;
                font-size: 16px !important;
                letter-spacing: 1px;
                position: relative;
                margin-left: 70%;
            }

            input:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: 1px solid #1976D2 !important;
                outline-width: 0;
            }

            .fa-calendar {
            position: absolute;
            top: 13px;
            font-size: 20px;
            color: #1976D2;
            z-index: 1000;
            }

            #fa-1 {
            left: calc(50% - 40px);
            }

            #fa-2 {
            left: calc(100% - 40px);
            }

            .form-control-placeholder {
                position: absolute;
                top: -10px !important;
                padding: 12px 2px 0 2px;
                opacity: 0.5;
            }

            #end-p {
            left: calc(50% + 4px);
            }

            .form-control:focus + .form-control-placeholder,
            .form-control:valid + .form-control-placeholder {
                font-size: 95%;
                top: 10px;
                transform: translate3d(0, -100%, 0);
                opacity: 1;
            }

            ::placeholder {
                color: #BDBDBD;
                opacity: 1;
            }

            :-ms-input-placeholder {
                color: #BDBDBD;
            }

            ::-ms-input-placeholder {
                color: #BDBDBD;
            }

            button:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                outline-width: 0;
            }

            .datepicker {
            background-color: #fff;
            border-radius: 0 !important;
            align-content: center !important;
            padding: 0 !important;
            }

            .datepicker-dropdown {
            top: 180px !important;
            left: calc(50% - 173.5px) !important;
            border-right: #1976D2;
            border-left: #1976D2;
            }

            .datepicker-dropdown.datepicker-orient-left:before {
            left: calc(50% - 6px) !important;
            }

            .datepicker-dropdown.datepicker-orient-left:after {
            left: calc(50% - 5px) !important;
            border-bottom-color: #1976D2;
            }

            .datepicker-dropdown.datepicker-orient-right:after {
            border-bottom-color: #1976D2;
            }

            .datepicker table tr td.today, span.focused {
            border-radius: 50% !important;
            background-image: linear-gradient(#FFF3E0, #FFE0B2);
            }

            thead tr:nth-child(2) {
            background-color: #1976D2 !important;
            }

            /*Weekday title*/
            thead tr:nth-child(3) th {
            font-weight: bold !important;
            padding: 20px 10px !important;
            color: #BDBDBD !important;
            }

            tbody tr td {
            padding: 10px !important;
            }

            tfoot tr:nth-child(2) th {
            padding: 10px !important;
            border-top: 1px solid #CFD8DC !important;
            }

            .cw {
            font-size: 14px !important;
            background-color: #E8EAF6 !important;
            border-radius: 0px !important;
            padding: 0px 20px !important;
            margin-right: 10px solid #fff !important;
            }

            .old, .day, .new {
            width: 40px !important;
            height: 40px !important;
            border-radius: 0px !important;
            }

            .day.old, .day.new {
            color: #E0E0E0 !important;
            }

            .day.old:hover, .day.new:hover {
            border-radius: 50% !important;
            }

            .old-day:hover, .day:hover, .new-day:hover, .month:hover, .year:hover, .decade:hover, .century:hover {
            border-radius: 50% !important;
            background-color: #eee;
            }

            .active {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important;
            color: #fff !important;
            }

            .range-start, .range-end {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important;
            }

            .range {
            background-color: #E3F2FD !important;
            }

            .prev, .next, .datepicker-switch {
            border-radius: 0 !important;
            padding: 10px 10px 10px 10px !important;
            font-size: 18px;
            opacity: 0.7;
            color: #fff;
            }

            .prev:hover, .next:hover, .datepicker-switch:hover {
            background-color: inherit !important;
            opacity: 1;
            }

            @media screen and (max-width: 726px) {
            .datepicker-dropdown.datepicker-orient-right:before {
                right: calc(50% - 6px);
            }

            .datepicker-dropdown.datepicker-orient-right:after {
                right: calc(50% - 5px);
            }
            }          
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-3">
                <div style="border-color: gray; border-width: 1px; border-style: dotted;">
                    <img src="https://drive.google.com/file/d/1f4jTTJQ7LAgkQg64LZqnDd4RcRgQTzX0/view" alt="Italian Trulli" width="250" height="250">
                </div>
            </div>
            <div class="col-sm-6">
                <h1>CADENA HOTELERA "MAISON FIORI"</h1>
            </div>
            <div class="col-sm-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </div>
        </div>
        <div class="middlediv">
            <h1>CADENA HOTELERA "MAISON FIORI"</h1>
        </div>
        <div class="rightdiv">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </div>  
        <div class="boxforfloat"></div>    
        <div class="toolbar">            
            <button class="btn btn-primary" type="submit">Hotel</button>
            <button class="btn btn-primary" type="submit">Personal</button>
            <button class="btn btn-primary" type="submit">Reportes</button>            
        </div>                
    </body>
</html>
@endsection