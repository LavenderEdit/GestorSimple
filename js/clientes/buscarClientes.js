export function buscarClientes(query, type) {
    return $.ajax({
        url: "./controllers/ClientesController.php?action=buscar_clientes",
        method: "POST",
        data: { query, type },
        dataType: "json",
    });
}