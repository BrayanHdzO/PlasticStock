import "../../lib/js/custom/indicador-cargando.js"

export class MuestraRoles
 extends HTMLElement {

 connectedCallback() {
  this.style.display = "block"
  this.innerHTML = /* HTML */
   `<fieldset>
     <legend>Roles</legend>
     <ul id="roles">
      <li>
       <indicador-cargando>
       </indicador-cargando>
      </li>
     </ul>
    </fieldset>`

 }
}

customElements.define(
 "muestra-roles", MuestraRoles)