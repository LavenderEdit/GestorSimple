export function initModalPagos() {
    document.querySelectorAll('.ver-detalle').forEach(btn => {
        btn.addEventListener('click', async function() {
            const idPago = this.getAttribute('data-pago-id');
            const modal = new bootstrap.Modal(document.getElementById('detallePagoModal'));
            
            try {
                const response = await fetchDetallePago(idPago);
                document.getElementById('modalPagoContent').innerHTML = crearHTMLDetalle(response);
                modal.show();
            } catch (error) {
                console.error('Error al cargar detalles:', error);
                alert('No se pudieron cargar los detalles del pago');
            }
        });
    });
}

async function fetchDetallePago(idPago) {
    const formData = new FormData();
    formData.append('id_pago', idPago);
    
    const response = await fetch('./controllers/PagoController.php?action=detalle_pago', {
        method: 'POST',
        body: formData
    });
    
    if (!response.ok) throw new Error('Error en la respuesta');
    return await response.json();
}

function crearHTMLDetalle(pago) {
    // Validación exhaustiva
    const safeGet = (obj, prop) => obj && obj.hasOwnProperty(prop) ? obj[prop] : 'N/D';

    const formatCurrency = (value) => {
        const num = parseFloat(value);
        return isNaN(num) ? 'N/D' : `S/${num.toFixed(2)}`;
    };
    return `
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID Pago:</strong> ${safeGet(pago, 'id_pago')}</p>
                <p><strong>Monto:</strong> ${formatCurrency(safeGet(pago, 'monto'))}</p>
                <p><strong>Fecha Pago:</strong> ${safeGet(pago, 'fecha_pago')}</p>
                <p><strong>Método:</strong> ${safeGet(pago, 'nombre_metodo')}</p>
            </div>
            <div class="col-md-6">
                <p><strong>ID Venta:</strong> ${safeGet(pago, 'id_venta')}</p>
                <p><strong>Fecha Venta:</strong> ${safeGet(pago, 'fecha_venta')}</p>
                <p><strong>Total Venta:</strong> ${formatCurrency(safeGet(pago, 'total_venta'))}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <p><strong>Cliente:</strong> ${safeGet(pago, 'cliente')}</p>
                <p><strong>Usuario:</strong> ${safeGet(pago, 'usuario')}</p>
            </div>
        </div>
    `;
}
