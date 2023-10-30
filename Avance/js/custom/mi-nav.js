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
	   
<header class="header">
        <div class="logo">
            <img src="../../assets/img/imagen logo.png" alt="Logo de la empresa">
        </div
        <nav>
            <ul class="nav-links">
               <li>
                   indicador-cargando
               </li>
            </ul>
        </nav>
      

        <a onclick="openNav()" class="menu"><button>Menu</button></a>

        <div class="overlay" id="mobile-menu">
            <a onclick="closeNav()" class="close">&times;</a>
            <div class="overlay-content">
                <a href="perfil.html">Perfil</a>
                <a href="index.html">Inicio</a>
                <a href="nosotros.html">Nosotros</a>
            </div>
        </div>
    </header>


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
   `
    <li>
     <a href="index.html">Inicio</a>
    </li>`)
 }

 /** @param {string} cue */
 usuario(cue) {
  const cueHtml =
   htmlentities(cue)
  return cue === "" ?
   ""
   : /* HTML */
   `<li><span style="color:white">${cueHtml}</span></li>`
 }

 hipervinculoPerfil() {
  return (/* HTML */
   `<li>
     <a href="perfil.html">Perfil</a>
    </li>`)
 }

 /** @param {Set<string>} rolIds */
 hipervinculosAdmin(rolIds) {
  return rolIds.
   has(ROL_ADMINISTRADOR) ?
   /* HTML */
   `<li>
     <a href="admin.html">
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
     Para Empleados</a>
    </li>`
   : ""
 }

    /** @param {Set<string>} rolIds */
    hipervinculosVendedor(rolIds) {
     return rolIds.has(ROL_ENCARGADO) ?
      /* HTML */
      `<li>
        <a href="vendedor.html">
        Para Encargados</a>
       </li>`
      : ""
    }
}

customElements
 .define("mi-nav", MiNav)