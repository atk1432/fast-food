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
