document.addEventListener("keydown", arrowAlert);

function arrowAlert (event) {
	// console.log(event.code);
	if (event.code == "ArrowRight") {
	alert("Вы нажали стрелку: arrow right");
} else if (event.code == "ArrowLeft") {
	alert("Вы нажали стрелку: arrow left");
} else if (event.code == "ArrowUp") {
	alert("Вы нажали стрелку: arrow up");
} else if (event.code == "ArrowDown") {
	alert("Вы нажали стрелку: arrow down");
}
}