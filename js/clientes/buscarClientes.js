export function buscarClientes(query, type) {
    return $.ajax({
        url: `router.php?controller=clientes&action=buscarClientes`,
        method: "GET",
        data: { query, type },
        dataType: "json",
    });
}