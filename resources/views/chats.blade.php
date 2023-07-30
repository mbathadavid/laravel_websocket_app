<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <h5 class="text-center">Messaging Form</h5>
            <form action="#" method="POST" id="messagingform">
                <div class="form-group mb-3">
                    @csrf
                    <label for="">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control">

                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="SEND MESSAGE" class="btn btn-success float-end">
                </div>
            </form>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            
        </div>
    </div>
</div>


</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#messagingform').submit(function(e){
         e.preventDefault();
         var formdata = new FormData($(this)[0]);
         $.ajax({
             method: 'POST',
             url: '/send',
             contentType: false,
            processData: false,
            dataType: 'json',
            data: formdata,
            success: function(res) {
                //console.log(res)
            }
         })
     })
})
</script>

<!-- <script>
  window.Echo.channel('home').listen('NewEvent', (e) => {
    console.log(e);
  })
</script> -->

<script>
  // Initialize Pusher with your credentials
  const pusher = new Pusher('09d04f051e4cc1dce76e', {
    cluster: 'ap2',
  });

  // Subscribe to a channel (e.g., "chat")
  const channel = pusher.subscribe('chat');

  // Handle incoming messages
  channel.bind('message.created', function(data) {
    console.log(data);
    // Update the UI with the new message
    // For example, display the message in a chat box
  });

  // Function to send a new message
  function sendMessage(message) {
    // Implement the logic to send a new message to the backend
    // For example, use Ajax to send the message to your Laravel backend
  }
</script>



</html>