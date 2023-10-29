import "../../lib/js/custom/indicador-cargando.js"
import { htmlentities } from "../../lib/js/htmlentities.js"
import {
 Sesion
} from "../Sesion.js"
import {
 ROL_ADMINISTRADOR
} from "../const/ROL_ADMINISTRADOR.js"
import {
 ROL_EMPLEADO
} from "../const/ROL_EMPLEADO.js"
import {
    ROL_ENCARGADO
   } from "../const/ROL_ENCARGADO.js"

export class MiNav
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<div class="header-options full-box">
	      <nav class="header-navbar full-box poppins-regular font-weight-bold" >
	            <ul class="list-unstyled full-box">
                  <li>
                   <indicador-cargando>
                   </indicador-cargando>
                  </li>
	            </ul>
	        </nav>
		</div>`

 }

 /** @param {Sesion} sesion */
 set sesion(sesion) {
  const cue = sesion.cue
  const rolIds = sesion.rolIds
  let innerHTML =
   this.hipervinculoInicio()
  innerHTML +=
   this.hipervinculosAdmin(rolIds)
  innerHTML += this
   .hipervinculosCliente(rolIds)
   innerHTML += this
   .hipervinculosVendedor(rolIds)
  innerHTML += this.usuario(cue)
  innerHTML +=
   this.hipervinculoPerfil()
  const ul =
   this.querySelector("ul")
  if (ul !== null) {
   ul.innerHTML = innerHTML
  }
 }

 hipervinculoInicio() {
  return (/* HTML */
   `<li>
     <div class=" full-box m-2">
         <a href="index.html">
             <img src="./assets/img/imagen logo.png" width="70px" alt="logo" class="img-fluid">
         </a>
     </div>
    </li>
    <li>
     <a href="index.html">
      Inicio<span class="full-box" ></span></a>
    </li>`)
 }

 /** @param {string} cue */
 usuario(cue) {
  const cueHtml =
   htmlentities(cue)
  return cue === "" ?
   ""
   : /* HTML */
   `<li class="full-box">${cueHtml}</li>`
 }

 hipervinculoPerfil() {
  return (/* HTML */
   `<li>
     <a href="perfil.html">Perfil
     <span class="full-box" ></span></a>
    </li>`)
 }

 /** @param {Set<string>} rolIds */
 hipervinculosAdmin(rolIds) {
  return rolIds.
   has(ROL_ADMINISTRADOR) ?
   /* HTML */
   `<li>
     <a class="btn btn-outline-success" href="admin.html">
     Para administradores</a>
    </li>`
   : ""
 }

 /** @param {Set<string>} rolIds */
 hipervinculosCliente(rolIds) {
  return rolIds.has(ROL_EMPLEADO) ?
   /* HTML */
   `<li>
     <a href="cliente.html">
     Para Empleados<span class="full-box" ></span></a>
    </li>`
   : ""
 }

    /** @param {Set<string>} rolIds */
    hipervinculosVendedor(rolIds) {
     return rolIds.has(ROL_ENCARGADO) ?
      /* HTML */
      `<li>
        <a href="vendedor.html">
        Para Encargados<span class="full-box" ></span></a>
       </li>`
      : ""
    }
}

customElements
 .define("mi-nav", MiNav)