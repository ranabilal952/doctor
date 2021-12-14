<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://zkpredictics.com/external_api.js'></script>
    <script>
        var appointment = @json($appointment);
        var currentUser = @json($currentUser);
        var appointmentID = appointment.id;
        console.log(appointment);
        $(document).ready(function() {
            var domain = "zkpredictics.com";
            var options = {
                roomName: appointment.user.name + '/' + appointment.doctor.name,
                width: "100%",
                height: 1000,
                parentNode: document.querySelector("#meet"),
                userInfo: {
                    email: currentUser.email,
                    displayName: currentUser.name,
                },
                configOverwrite: {

                },
                interfaceConfigOverwrite: {
                    DEFAULT_BACKGROUND: "#474747",
                    // noSsl: true,
                    SHOW_JITSI_WATERMARK: false,
                    HIDE_DEEP_LINKING_LOGO: true,
                    SHOW_POWERED_BY: false,
                    TOOLBAR_BUTTONS: [
                        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                        'fodeviceselection', 'hangup', 'profile', 'recording',
                        'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
                        'videoquality', 'filmstrip', 'feedback', 'stats', 'shortcuts',
                        'tileview'
                    ],
                }
            }
            var api = new JitsiMeetExternalAPI(domain, options);
            api.executeCommands({
                displayName: ['nickname'],
                toggleVideo: [],
                toggleAudio: []
            });
            // setTimeout(() => {
            //     api.executeCommand('hangup');
            // }, 15000);
            api.addListener('readyToClose', function() {
                alert('We are closing');
                $('#meet').empty();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if (currentUser.role == 'doctor') {
                    $.ajax({
                        url: '/changeMeetingStatus',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            status: 'closed',
                            appointment_id: appointmentID
                        },
                        dataType: 'JSON',
                        success: function(data) {}
                    });
                }
                var url = "{{ url('rating') }}" + "/" + appointmentID;


                document.location.href = url;
            });


        });
    </script>
    <style>
        .title {
            text-align: center;
            font-family: "Segoe UI";
            font-size: 48px;
        }

    </style>
</head>

<body style="background-color: #474747">
    <div id="meet"></div>
</body>

</html>
