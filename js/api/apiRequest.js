export function apiRequest(controller, action, method = "GET", data = null) {
  return new Promise((resolve, reject) => {
    let url = `/GestorSimple/router.php?controller=${encodeURIComponent(
      controller
    )}&action=${encodeURIComponent(action)}`;

    if (method.toUpperCase() === "GET" && data && typeof data === "object") {
      const params = new URLSearchParams(data).toString();
      url += `&${params}`;
    }

    const ajaxOptions = {
      url: url,
      type: method.toUpperCase(),
      dataType: "json",
    };

    if (method.toUpperCase() === "POST") {
      if (data instanceof FormData) {
        ajaxOptions.data = data;
        ajaxOptions.processData = false;
        ajaxOptions.contentType = false;
      } else if (data && typeof data === "object") {
        ajaxOptions.data = JSON.stringify(data);
        ajaxOptions.contentType = "application/json; charset=UTF-8";
      }
    }

    $.ajax(ajaxOptions)
      .done((responseData) => {
        resolve(responseData);
      })
      .fail((jqXHR, textStatus, errorThrown) => {
        reject(
          new Error(
            `Error en la solicitud: ${jqXHR.status} ${jqXHR.statusText}`
          )
        );
      });
  });
}
