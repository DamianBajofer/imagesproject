$(document).on("ready", () => {
	const xhr = new XMLHttpRequest()
	xhr.open("POST", "http://localapps.servegame.com/imagesproject/images.controller.php", true)
	xhr.onload = (response) => {
		response = JSON.parse(response.currentTarget.response)
		$(`#group .inicio`).css({"background-image": `url(images/${response[0]})`})
		$(`#group .mitad`).css({"background-image": `url(images/${response[1]})`})
		$(`#group .final`).css({"background-image": `url(images/${response[2]})`})
		console.log(response.currentTarget.response)
	}
	xhr.send()
})