function validarFormVacio(formulario) {
    datos = $('#' + formulario).serialize();
    d = datos.split('&');
    vacios = 0;

    if (d.length == 1) {
        controles = d[0].split("=");
        if (controles[1].trim() == "") {
            vacios++;
        }
    } else if (d.length > 1) {
        for (i = 0; i < d.length - 1; i++) {
            controles = d[i].split("=");
            if (controles[1].trim() == "") {
                vacios++;
            }
        }
    }

    return vacios;
}
