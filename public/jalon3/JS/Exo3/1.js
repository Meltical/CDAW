'use strict'
let editedUserId
function modify(e) {
  //   alert(e.type + ' on modify for ' + e.currentTarget.parentNode.id + ' !')
  editedUserId = e.currentTarget.parentNode.id
  myForm.children[0].value = e.currentTarget.parentNode.children[1].innerHTML
  myForm.children[1].disabled = false
}

function deleter(e) {
  //   alert(e.type + ' on remove for ' + e.currentTarget.parentNode.id + ' !')
  e.currentTarget.parentNode.remove()
}

document.getElementById('addNew').addEventListener('click', function (e) {
  let users = document.getElementById('users')
  //   user
  let user = document.createElement('div')
  user.setAttribute(
    'id',
    'user' + (parseInt(users.lastElementChild.id.slice(-1)) + 1),
  )
  // h4
  let h4 = document.createElement('h4')
  h4.innerHTML = 'Nom Prénom'
  user.appendChild(h4)
  // p
  let p = document.createElement('p')
  p.innerHTML =
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
  user.appendChild(p)
  //   buttons
  let mod = document.createElement('button')
  let rem = document.createElement('button')
  mod.setAttribute('class', 'modify')
  rem.setAttribute('class', 'remove')
  mod.innerHTML = 'Modify Comment'
  rem.innerHTML = 'Remove Comment'
  user.appendChild(mod)
  user.appendChild(rem)

  users.appendChild(user)
  mod.addEventListener('click', modify)
  rem.addEventListener('click', deleter)
})

function submit(e) {
  e.preventDefault()
  console.log()
  if (myForm.children[0].value !== '' && editedUserId) {
    document.getElementById(editedUserId).children[1].innerHTML =
      myForm.children[0].value
    editedUserId = null
    myForm.children[0].value = ''
    myForm.children[1].disabled = true
  } else {
    alert('Invalid Message!')
  }
}

let modifiers = document.getElementsByClassName('modify')
Array.from(modifiers).forEach((m) => m.addEventListener('click', modify))

let remover = document.getElementsByClassName('remove')
Array.from(remover).forEach((m) => m.addEventListener('click', deleter))

let myForm = document.getElementById('myForm')
myForm.addEventListener('submit', submit)
