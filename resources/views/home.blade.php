<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60">
    <link rel="apple-touch-icon" sizes="76x76" href="img/ap1.png">
    <link rel="icon" type="image/png" href="img/ap1.png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Angkasa Pura Flight Information Display System</title>
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="{{ asset('css') }}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css') }}/agency.min.css" rel="stylesheet">
    <style type="text/css">
        
        body {
            background: url(img/bg8.jpg) no-repeat fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
        .wrapper{
            padding: 40px 90px;
            background-color: #ffffff;
            width: 95%;
            height: 100% auto;
            margin: 0px auto;
            -moz-border-radius-topleft: 15px;
            -moz-border-radius-topright: 15px;
            -webkit-border-radius-topleft: 15px;
            -webkit-border-radius-topright: 15px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            -moz-border-radius-bottomleft: 15px;
            -moz-border-radius-bottomright: 1px;
            -webkit-border-radius-bottomleft: 15px;
            -webkit-border-radius-bottomright: 15px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px; 
        }
        
    </style>
    
</head>
<body id="page-top">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="padding: 10px;">
        <div class="container">
            <a href="index.php"><img src="img/ap1.png" width="200px" height="55px"></a>    
        </div>
    </nav>
    
    <!-- Services -->
    <section id="body" style="padding: 100px;">
        
        <div class="container">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="loc" id="loc" required>
                            <option value="SUB">SUB</option>
                        </select>
                    </div>  
                    
                    <div class="col-sm-4">    
                        <select class="form-control" name="indo" id="indo" required>
                            <option value="D" selected="selected">Domestic</option>
                            <option value="I" >International</option>
                        </select>
                    </div>  
                    
                    <div class="col-sm-4">      
                        <select class="form-control" name="arrdep" id="arrdep" required>
                            <option value="D">Departure</option>
                            <option value="A">Arrival</option>
                        </select>
                    </div>
                </div>
                <div class="container">
                    <div class="wrapper">
                        <div class="table-responsive">
                            <table id="example"class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th><font size="2px">No.</font></th>
                                        <th><font size="2px">Airlines</font></th>
                                        <th><font size="2px">Flight</font></th>
                                        <th><font size="2px">Destination/From</font></th>
                                        <th><font size="2px">Schedule</font></th>
                                        <th><font size="2px">Status</font></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr align="center">
                                        <th><font size="2px">No.</font></th>
                                        <th><font size="2px">Airlines</font></th>
                                        <th><font size="2px">Flight</font></th>
                                        <th><font size="2px">Destination/From</font></th>
                                        <th><font size="2px">Schedule</font></th>
                                        <th><font size="2px">Status</font></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    var table = $('#example').DataTable({
        paging: false,
        searching: false,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ url('api/flights?loc=DPS') }}',
            error: function (xhr, error, thrown) {
                alert( 'Data Tidak Di Temukan, Silahkan Pilih Yang Lain' );
            }
            
        },
        deferLoading: 57,
        columns: [
        {data: 'arrdep'},
        {data: 'iata'},
        {data: 'flight'},
        {data: 'sname'},
        {data: 'schedule'},
        {data: 'status'}
        ]
    });
    
    
    // $table.on( 'error', function () { alert( 'error' );} );
    $("select")
    .change(function () {
        var str = $("#loc option:selected").val();
        var indo = $('#indo option:selected').val();
        var arr = $('#arrdep option:selected').val();
        var link ='{{ url('api/flights?loc=') }}' + str +'&id=' + indo + '&arr='  + arr;
        table.ajax.url(link).load();
        
    })
    .change();
    
</script>
</body>
</html>