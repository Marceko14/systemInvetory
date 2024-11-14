$("#frmAcceso").on('submit', function(e) {
    e.preventDefault();
    const logina = $("#logina").val();
    const password = $("#password").val();

    $.post("../ajax/usuario.php?op=verificar", { "logina": logina, "password": password }, function(data) {
        if (data !== "null") {
            $(location).attr("href", "escritorio.php");
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
