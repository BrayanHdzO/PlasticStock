/**
 * Codifica un texto para que
 * cambie los caracteres
 * especiales y no se pueda
 * interpretar como HTML. Esta
 * técnica evita la inyección de
 * código.
 * @param {string} texto
 * @returns {string} un texto que
 *  no puede interpretarse como
 *  HTML.
 */
export function htmlentities(
 texto) {
 return texto.toString().
  replace(/[<>"']/g, reemplaza)
}

/**
 * Devuelve una cadena de reemplazo
 * para evitar que el texto se
 * interprete como HTML. 
 * @param {string} texto
 */
function reemplaza(texto) {
 switch (texto) {
  case "<": return "&lt;"
  case ">": return "&gt;"
  case '"': return "&quot;"
  case "'": return "&#039;"
  default: return texto
 }
}