$(document).on("ready", () => {
	const xhr = new XMLHttpRequest()
	xhr.open("POST", "http://localapps.servegame.com/imagesproject/images.controller.php", true)
	xhr.onload = (response) => {
		response = JSON.parse(response.currentTarget.response)
		response.forEach((value, key) => {
			const arr = response[key]
			arr.forEach((v, k) => {
				const i = (k+1)
				console.log(v)
				$(`#gp_${(key+1)} .image${i}`).css({"background-image": `url(images/${v.image})`})
			})
		})
		//console.log(response.currentTarget.response)
	}
	xhr.send()
})