$("#frmAcceso").on('submit', function(e) {
    e.preventDefault();
    const logina = $("#logina").val();
    const password = $("#password").val();

    $.post("/InventarioNicolas/ajax/usuario.php?op=verificar", { "logina": logina, "password": password }, function(data) {
        if (data !== "null") {
            Swal.fire({
                title: '¡Bienvenido!',
                text: 'Has ingresado correctamente.',
                icon: 'success',
                showConfirmButton: false,  // Esto oculta el botón
                timer: 2000  // Esta línea opcional establece un temporizador de 2 segundos para que la alerta se cierre automáticamente.
            }).then(() => {
                $(location).attr("href", "../views/escritorio.php");
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Usuario y/o Password incorrectos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});
