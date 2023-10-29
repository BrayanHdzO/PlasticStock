/**
 * Muestra un error en la consola y
 * en un cuadro de alerta el
 * mensaje de una excepción.
 * @param {Error} e descripción
 *  del error.
 */
export function muestraError(e) {
 console.error(e)
 alert(e.message)
}