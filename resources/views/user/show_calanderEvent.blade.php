
<!DOCTYPE html>
<html>
<head>
    <title>CMS</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> 
</head>
<body>
<div class="container">
    <br />
    <br />
    <div id="full_calendar_events"></div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function () {

        var booking = @json($events);
      
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#full_calendar_events').fullCalendar({

        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },

        events : booking,
        

               eventClick: function (event) {

                var title = event.title;
               
              
                $.ajax({
                    url : 'show-details',
                    type : 'get',
                    data : {
                        'title' : title,
                       
                    },
                    success : function(response){

                    // alert(response);
                    // document.write(response) ;
                    displayMessage(response);

                    }
                });
            }


        });
    });
    function displayMessage(message) {
        toastr.success(message, 'Event Details');
    }
</script>



</body>
</html>