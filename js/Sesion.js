import {
 CUE
} from "./const/CUE.js"
import {
 ROL_IDS
} from "./const/ROL_IDS.js"
import {
 txtCueIncorrecto
} from "./txt/txtCueIncorrecto.js"
import {
 txtRolIdsIncorrecto
} from "./txt/txtRolIdsIncorrecto.js"

export class Sesion {
 /** @param {any} json */
 constructor(json) {
  this.cue = json[CUE]
  if (
   typeof this.cue !== "string")
   throw new Error(
    txtCueIncorrecto())
  /** @readonly */
  const rolIds = json[ROL_IDS]
  if (!Array.isArray(rolIds))
   throw new Error(
    txtRolIdsIncorrecto())
  /** @readonly */
  this.rolIds = new Set(rolIds)
 }
}