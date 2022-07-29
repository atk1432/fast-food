var alert = document.querySelector('.alert__container')
var button = document.querySelector('.cart__add')
var number = document.querySelector('#product-number')

button.onclick = () => {
	var text = 'Thêm vào giỏ hàng thành công!'

	if (document.querySelector('#logout')) {
		window.location.href = window.location.origin + '/login'
		return
	}

	var request = new XMLHttpRequest()
	var product_id = button.getAttribute('product_id')

	request.open(
		'GET',
		window.location.origin + `/cart/${product_id}/${number.innerText}/store`,
		true
	)

	request.send()

	alert.innerHTML += `<div class="alert alert-success">${text}</div>`

	setTimeout(() => {
		alert.children[0].style.opacity = '0'
		alert.children[0].ontransitionend = () => {
			alert.removeChild(alert.children[0])
		}
	}, 3000)
}

function incrementButton() {

    var add = document.querySelector('#product-add')
    var number = document.querySelector('#product-number')
    var plus = document.querySelector('#product-plus')

    add.onclick = () => {
        number.innerText = parseInt(number.innerText) + 1
    }

    plus.onclick = () => {
        var calc = parseInt(number.innerText) - 1
        if (calc < 1)
            number.innerText = 1
        else 
            number.innerText = calc
    }

}

incrementButton()