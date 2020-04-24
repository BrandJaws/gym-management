<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>jQuery UI Draggable - Default functionality-nicesnippets.com</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        #draggable {
            width: 150px;
            height: 150px;
            padding: 0.5em;
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center pb-3 pt-1">Drag and Droppable Cards using Laravel 6 JQuery UI Example <span class="bg-success p-1">nicesnippets.com</span></h2>
            <div class="row">
                <div class="col-md-5 p-3 bg-dark offset-md-1">
                    <ul class="list-group shadow-lg connectedSortable" id="Presentation-Scheduled">
                        @if(!empty($presentationScheduled) && $presentationScheduled->count())
                            @foreach($presentationScheduled as $key=>$value)
                                <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->stage }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-5 p-3 bg-dark offset-md-1 shadow-lg complete-item">
                    <ul class="list-group  connectedSortable" id="Appointment-Scheduled">
                        @if(!empty($appointmentScheduled) && $appointmentScheduled->count())
                            @foreach($appointmentScheduled as $key=>$value)
                                <li class="list-group-item " item-id="{{ $value->id }}">{{ $value->stage }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( function() {
        $( "#Presentation-Scheduled, #Appointment-Scheduled" ).sortable({
            connectWith: ".connectedSortable",
            opacity: 0.5,
        }).disableSelection();

        $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
            var presentationArr = [];
            var appointmentArr = [];

            $("#Presentation-Scheduled li").each(function( index ) {
                presentationArr[index] = $(this).attr('item-id');
            });

            $("#Appointment-Scheduled li").each(function( index ) {
                appointmentArr[index] = $(this).attr('item-id');
            });
            console.log(presentationArr,appointmentArr);
            $.ajax({
                url: "{{ route('member.update.leads') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {presentationArr:presentationArr,appointmentArr:appointmentArr},

                success: function(data) {
                    console.log('success');
                }
            });

        });
    });
</script>
</body>
</html>
