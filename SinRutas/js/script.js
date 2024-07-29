// Función para mostrar el perfil del usuario
function mostrarPerfil() {
    $.ajax({
        type: "POST",
        url: "perfil.php",
        data: {},
        success: function(data) {
            $("#perfil").html(data);
        }
    });
}

// Función para actualizar el perfil del usuario
function actualizarPerfil() {
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var edad = $("#edad").val();

    $.ajax({
        type: "POST",
        url: "perfil.php",
        data: {nombre: nombre, email: email, edad: edad},
        success: function(data) {
            $("#perfil").html(data);
        }
    });
}

// Función para mostrar las estadísticas de las encuestas
function mostrarEstadisticas() {
    $.ajax({
        type: "POST",
        url: "estadisticas.php",
        data: {},
        success: function(data) {
            $("#estadisticas").html(data);
        }
    });
}

// Función para votar en una encuesta
function votar(encuesta_id, opcion_id) {
    $.ajax({
        type: "POST",
        url: "votar.php",
        data: {encuesta_id: encuesta_id, opcion_id: opcion_id},
        success: function(data) {
            mostrarEstadisticas();
        }
    });
}

// Llamadas a las funciones
mostrarPerfil();
mostrarEstadisticas();