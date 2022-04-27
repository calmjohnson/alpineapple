import Alpine from 'alpinejs'

import collapse from '@alpinejs/collapse'
import Clipboard from "@ryangjchandler/alpine-clipboard"

Alpine.plugin(collapse)

Alpine.plugin(Clipboard)
 
window.Alpine = Alpine
 
Alpine.start()

function copyToClipboard() {
    navigator.clipboard.write($refs.code.firstElementChild.outerHTML)
}