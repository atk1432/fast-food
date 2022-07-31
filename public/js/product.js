var alert = document.querySelector('.alert__container')
var button = document.querySelector('.cart__add')
var number = document.querySelector('#product-number')

button.onclick = () => {
	var text = 'Thêm vào giỏ hàng thành công!'
	var origin = window.location.origin
	var cartNumber = document.querySelector('.cart__header-number')

	if (document.querySelector('#logout')) {
		window.location.href = window.location.origin + '/login'
		return
	}

	var request = new XMLHttpRequest()
	var product_id = button.getAttribute('product_id')

	request.open(
		'GET',
		origin + `/cart/${product_id}/${number.innerText}/store`,
		true
	)

	request.send()

	alert.innerHTML += `<div class="alert alert-success">${text}</div>`

	// Send to receive number cart
	request = new XMLHttpRequest();
	request.onreadystatechange = function () {
		if (this.status == 200) {
			var response = this.responseText
			if (response.length < 10) {
				cartNumber.innerText = response
			}
		}
	}
	request.open('GET', origin + '/cart/number-carts', true)
	request.send()

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