$("#frmAcceso").on('submit', function(e) {
    e.preventDefault();
    const logina = $("#logina").val();
    const clavea = $("#password").val();

    $.post("../ajax/usuario.php?op=verificar", { "logina": logina, "password": clavea }, function(data) {
        if (data !== "null") {
            Swal.fire({
                title: '¡Bienvenido!',
                text: 'Has ingresado correctamente.',
                icon: 'success',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).attr("href", "escritorio.php");
                }
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
