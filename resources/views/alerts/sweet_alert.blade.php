@if(Session::has('sweet_alert'))
   <script>
       swal("Great Job!","{!! Session::get('sweet_alert') !!}","success",{
           button:"OK",
       })
   </script>
@endif
