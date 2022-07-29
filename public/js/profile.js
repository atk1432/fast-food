function profile() {
    var profileInfo = document.querySelector('.profile__info')
    var saveChange = document.querySelector('.save-change')
    var uploadFile = document.querySelector('input#image')
    var inputImage = document.querySelector('.profile__img')
    var icon = '<i class="fa-solid fa-pen-to-square profile__icon"></i>'

    var getFont = (element, property) => {
        return parseInt(window.getComputedStyle(element).getPropertyValue(property))
    }

    var input = document.createElement('input')
    input.setAttribute('type', 'text')
    input.classList.add('w-100')
    input.classList.add('profile__input')
    input.style.fontSize = getFont(profileInfo, 'font-size') + 'px'
    input.style.fontWeight = getFont(profileInfo, 'font-weight')
    input.onclick = (e) => {
        e.stopPropagation()
    }

    var inputChange = () => {
        saveChange.style.display = 'block'
        input.removeEventListener('input', inputChange)
    }

    input.addEventListener('input', inputChange)

    uploadFile.onchange = () => {
        const [ file ] = uploadFile.files

        if (file) {
            URL.revokeObjectURL(inputImage.src)
            inputImage.src = URL.createObjectURL(file)
        }
    }


    profileInfo.onclick = (event) => {
        event.stopPropagation()

        var parent = profileInfo.parentElement

        parent.replaceChild(input, profileInfo)

        input.focus()

        // saveChange.style.display = 'block'

        var remove = () => {
            profileInfo.innerHTML = input.value + icon               

            parent.replaceChild(profileInfo, input)
            window.removeEventListener('click', remove)
        }

        window.addEventListener('click', remove)
    }
}


function cartDelete() {

    var buttons = document.querySelectorAll('.cart__delete')
    var cartItems = document.querySelectorAll('.cart__item')
    var number = document.querySelector('.product__number')

    buttons.forEach((button) => {
        button.onclick = () => {
            cartItems.forEach((item) => {
                if (item.contains(button)) {
                    item.parentElement.removeChild(item)
                    number.innerText -= 1

                    var id = item.getAttribute('id')
                    var request = new XMLHttpRequest()
                    request.open(
                        'GET', 
                        window.location.origin + `/cart/${id}/delete`,
                        true
                    )

                    request.send()

                    return
                }
            })
        }
    })

}

function incrementButton() {

    var adds = document.querySelectorAll('#product-add')
    // var numbers = document.querySelectoAll('#product-number')
    var pluses = document.querySelectorAll('#product-plus')

    adds.forEach((add) => {        
        add.onclick = () => {
            add.nextElementSibling.innerText = parseInt(add.nextElementSibling.innerText) + 1
        }
    })

    pluses.forEach((plus) => {        
        plus.onclick = () => {
            var calc = parseInt(plus.previousElementSibling.innerText) - 1
            if (calc < 1)
                plus.previousElementSibling.innerText = 1
            else 
                plus.previousElementSibling.innerText = calc
        }
    })

}

incrementButton()
cartDelete()
profile()