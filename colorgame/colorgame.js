var numSquares = 6;
var colors = randomRgb(numSquares);
var squares = document.querySelectorAll(".square");
var pickedColor = pickColor();
var rgbDisplay = document.querySelector(".rgbDisplay");
var message = document.querySelector(".message");
var h1 = document.querySelector("h1");
var reset = document.querySelector("#reset");
var hard = document.querySelector("#hard");
var easy = document.querySelector("#easy");

rgbDisplay.textContent = pickedColor;


for (var i = 0; i < squares.length; i++) {
    squares[i].style.backgroundColor = colors[i];
    squares[i].addEventListener("click", function() {
        var chosen = this.style.backgroundColor
        if (chosen === pickedColor) {
            message.textContent = "Correct"
            changeToPicked(chosen)
            h1.style.backgroundColor = chosen
            reset.textContent = "PLAY AGAIN?"
        }
        else{
            this.style.backgroundColor = "#232323"
            message.textContent = "Try again"
        }
    })
}

function changeToPicked(color) {
    for (var i = 0; i < squares.length; i++) {
    squares[i].style.backgroundColor = color;
    }
}

function pickColor(){
    var random = Math.floor(Math.random() * colors.length);
    return colors[random];
}

function randomRgb(num){
    var arr = []
    for (var i = 0; i < num; i++) {
        arr.push(rgbColor())
    }
    return arr;
}

function rgbColor(){
    var red = Math.floor(Math.random() * 256);
    var green = Math.floor(Math.random() * 256);
    var blue = Math.floor(Math.random() * 256);
    return "rgb(" + red + ", " + green + ", " + blue + ")";
}

function resetIt() {
	colors = randomRgb(numSquares);
	pickedColor = pickColor();
	rgbDisplay.textContent = pickedColor;
	reset.textContent = "New Colors";
    message.textContent = "";
    h1.style.backgroundColor = "#707070";
	for(var i = 0; i < squares.length; i++) {
			squares[i].style.background = colors[i];
		}
	}

reset.addEventListener("click", function(){
    resetIt();
});

hard.addEventListener("click", function(){
    numSquares = 6;
    colors = randomRgb(numSquares);
    pickedColor = pickColor();
    rgbDisplay.textContent = pickedColor;
    h1.style.backgroundColor = "#707070"
    hard.classList.add("selected");
    easy.classList.remove("selected");
    reset.classList.remove("selected");
    reset.textContent = "NEW COLORS"
    for (var i = 0; i < squares.length; i++) {
        squares[i].style.backgroundColor = colors[i];
        squares[i].style.display = "block";
    }
    
})

easy.addEventListener("click", function(){
    numSquares = 3;
    colors = randomRgb(numSquares);
    pickedColor = pickColor();
    rgbDisplay.textContent = pickedColor;
    h1.style.backgroundColor = "#707070";
    easy.classList.add("selected");
    hard.classList.remove("selected");
    reset.classList.remove("selected");
    reset.textContent = "NEW COLORS"
    for (var i = 0; i < squares.length; i++) {
        if(colors[i]){
        squares[i].style.backgroundColor = colors[i];}
        else{
        squares[i].style.display = "none";
        }
    }
});