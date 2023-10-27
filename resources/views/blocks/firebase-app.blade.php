<script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-messaging.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyD_Y5as4jXOMY0HQmzNcoen5qe8XSERI7M",
        authDomain: "moda-deyabu.firebaseapp.com",
        projectId: "moda-deyabu",
        storageBucket: "moda-deyabu.appspot.com",
        messagingSenderId: "213218279882",
        appId: "1:213218279882:web:8891c0de5fb15496be8f33",
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();
    messaging
        .requestPermission()
        .then(function() {
            // console.log("Permiso para notificaciones exitoso.");
            return messaging.getToken();
        })
        .then(function(token) {
            if (document.getElementsByName("device_token")) {
                $('#device_token').val(token);
            }
            console.log(token);
        })
        .catch(function(err) {
            console.log("No se pudo obtener permiso para notificaciones.", err);
        });

    messaging.onMessage((payload) => {

        window.createNotification({
            closeOnClick: true,
            displayCloseButton: true,
            positionClass: "nfc-bottom-right",
            showDuration: "1000",
            theme: "warning",
        })({
            title: 'Nueva Venta Pendiente',
            message: 'Obten mas detalles en la pantalla de Ventas',
        });
        if (ventas_vista) {
            refreshTable();
            console.log('nueva venta');
        }
        //     console.log('EJEMPLO');
        // console.log(payload);
    });
</script>
