function remove(element, value = 'd-none') {
    element.classList.remove(value)
}

function add(element, value = 'd-none') {
    element.classList.add(value)
}

function toggle(element, value = 'd-none') {
    element.classList.toggle(value)
}

function check(element, value = 'd-none') {
    return element.classList.contains(value)
}

function headerBars_i() {
    var bars = document.querySelector('.header__bars i')
    var list = document.querySelector('.header__link ul')
    var listItem = document.querySelectorAll('.header__link-item')
    var body = document.querySelector('body')

    var turnOff = () => {
        list.style.height = '0'
        add(list, 'h-0')
    }

    var callBack = function () {
        turnOff()
        body.removeEventListener('click', callBack)
    }

    bars.onclick = function (e) {
        // console.log(check(bars, 'h-0'))
        // e.stopPropagation()
        e.stopPropagation()

        if (check(list, 'h-0')) {
            list.style.height = (listItem[0].clientHeight * 5) + 'px'
            body.addEventListener('click', callBack)
            remove(list, 'h-0')        
        } else {
            callBack()
        }
    }

    listItem.forEach((e) => {
        e.onclick = (event) => {
            event.stopPropagation()
        }
    })
}

headerBars_i()