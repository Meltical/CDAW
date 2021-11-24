'use strict'

document.getElementsByTagName('tbody').onclick = function (e) {
  console.log('test')
  alert(e.target.tagName)
}
