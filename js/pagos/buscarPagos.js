export function buscarPagos(query, type) {
    return $.ajax({
        url: "./controllers/PagoController.php?action=buscar_pagos",
        method: "POST",
        data: { query, type },
        dataType: "json",
    });
}