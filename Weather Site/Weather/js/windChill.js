let tempF = parseInt(document.querySelector("#tempF").value);
let speed = parseInt(document.querySelector("#speed").value);

function windChill(x, y){

    formula = 35.74 + (0.6215 * x) - (35.75 * Math.pow(y, 0.16)) + 0.4275 * x * (Math.pow(y, 0.16));
    formula = formula.toFixed(0);
	return formula;
        
}

if (tempF <= 50 && speed > 3){

    document.querySelector("#windChill").innerHTML = windChill(tempF, speed);
}