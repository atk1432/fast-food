function sliderBody() {

    var sliderBody = document.querySelectorAll('.slider__body')
    var sliderContainer = document.querySelector('.slider__body-container')
    var sliderButton = document.querySelector('.slider__button')
    var angle = document.querySelectorAll('.slider__body-angle')
    var click = true
    var coor = 0
    var pos = -1

    // Render
    for (var i = 0; i < sliderBody.length; i++) {
        if (i == 0) 
            sliderButton.innerHTML += '<i class="slider__button-item cursor-p slider__button-item--active"></i>'
        else
            sliderButton.innerHTML += '<i class="slider__button-item cursor-p"></i>'
        sliderBody[i].style.left = '-100%'
    }

    sliderContainer.innerHTML = sliderBody[sliderBody.length - 1].outerHTML + sliderContainer.innerHTML
    sliderContainer.innerHTML += sliderBody[0].outerHTML

    sliderBody = document.querySelectorAll('.slider__body')

    var sliderButtonItems = document.querySelectorAll('.slider__button-item')

    function moveFollowPos(pos) {

        sliderBody.forEach((e) => {
            e.style.left = pos * 100 + '%'
        })

    }

    function moveFollowPx(p) {
        sliderBody.forEach((e) => {
            e.style.left = `calc(${Math.abs(pos)}% +  ${p}px `
            e.style.transition = 'none'
        })
    }

    function getActualPos(pos) {
        var p = Math.abs(pos) - 1

        if (p < 0) {
            p = sliderBody.length - 3
        } else if (p == sliderBody.length - 2) {
            p = 0
        }

        return p
    }

    function move(direction) {

        var actualPos = getActualPos(pos)
        remove(sliderButtonItems[actualPos], 'slider__button-item--active')

        if (direction == 'left') {
            pos++
        } else if (direction == 'right') {
            pos--
        }

        actualPos = getActualPos(pos)
        add(sliderButtonItems[actualPos], 'slider__button-item--active')

        moveFollowPos(pos)
    }

    angle[0].onclick = () => {
        if (click) {
            move('left')
            click = false
            setTimeout(() => {
                click = true
            }, 600)
        }
    }

    angle[1].onclick = () => {
        if (click) {
            move('right')
            click = false
            setTimeout(() => {
                click = true                
            }, 600)
        }
    }

    sliderBody.forEach((e) => {
        e.ontransitionend = () => {


            if (pos == 0 || pos == -1 * (sliderBody.length - 2 + 1))
            {                    
                // click = false
                sliderBody.forEach((e) => {
                    add(e, 'no-transition')
                })
                

                if (pos == 0) {        
                    pos = -1 * (sliderBody.length - 2)            
                } else if (pos == -1 * (sliderBody.length - 2 + 1)) {
                    pos = -1                                    
                }

                moveFollowPos(pos)   

                sliderBody.forEach((e) => {
                    e.offsetHeight
                    remove(e, 'no-transition')
                })
                
                // click = true
            }
        }
    })

}


function addToCart() {

    var buttons = document.querySelectorAll('.products__add-to-cart')

    buttons.forEach((e) => {
        e.onclick = (event) => {
            event.preventDefault();

            var request = new XMLHttpRequest()
            var alert = document.querySelector('.alert.alert-success')
            var id = e.getAttribute('data')
            var user = e.getAttribute('user')

            if (!user) {
                window.location.href = window.location.origin + '/login'
                return
            }

            alert.style.display = 'block'
            alert.innerText = 'Thêm vào giỏ hàng thành công!'

            setTimeout(() => {
                alert.style.display = 'none'
            }, 3000)

            request.open("GET", `cart/${id}/store`, true)
            request.send()

        }
    })

}


addToCart()
sliderBody()
// headerBars_i()




