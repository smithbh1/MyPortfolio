var apr_check = document.getElementById("apr");
apr_check.onchange = function(){error_notification_apr};

var term_check = document.getElementById("term");
term_check.onchange = function(){error_notification_term};

var amount_check = document.getElementById("term");
amount_check.onchange = function(){error_notification_amount};

//if (error_notification_apr(apr_check) == false && error_notification_term(term_check) == false && error_notification_amount(amount_check) == false){
    var results = document.getElementById("calculate");
    results.addEventListener("click", mortgage);
//}

function mortgage() {


    var principal = parseFloat(document.getElementById("amount").value);

    var termOfLoan = parseFloat(document.getElementById("term").value);

    var annualInterestRate = parseFloat(document.getElementById("apr").value);

    var percentageRate = annualInterestRate / 1200;
    var lengthOfLoan = 12 * termOfLoan;
    var monthlyPayment = (principal * percentageRate) / (1 - (Math.pow((1 + percentageRate) , lengthOfLoan * -1)));
    monthlyPayment = monthlyPayment.toFixed(2);


    document.getElementById("payment").value = monthlyPayment;

}

function error_notification_apr() {
    var percentage = parseFloat(document.getElementById("apr").value);
    var error_message = document.querySelector("#apr_error_message");

    if (percentage < 0 || percentage > 25 || Number.isNaN(percentage) == true){
        error_message.style.display = "block";
        document.querySelector("#apr").style.backgroundColor = "red";
        return true;
        
    
}   else if (percentage > 0 && percentage <= 25){
        error_message.style.display = "none";
        document.querySelector("#apr").style.backgroundColor = "white";
        return false;
}
}
function error_notification_term() {
    var term = parseFloat(document.getElementById("term").value);
    var error_message = document.getElementById("term_error_message");

    if (term < 0 || term > 40 || Number.isNaN(term) == true){
        error_message.style.display = "block";
        document.querySelector("#term").style.backgroundColor = "red";
        return true;

}   else if (term > 0 && term <= 40){
        error_message.style.display = "none";
        document.querySelector("#term").style.backgroundColor = "white";
        return false;
}
}
function error_notification_amount() {
    var amount = parseFloat(document.getElementById("amount").value);
    var error_message = document.getElementById("amount_error_message");

    if (amount < 0 || Number.isNaN(amount) == true){
        error_message.style.display = "block";
        document.querySelector("#amount").style.backgroundColor = "red";
        return true;

}   else if (amount >= 0){
        error_message.style.display = "none";
        document.querySelector("#term").style.backgroundColor = "white";
        return false;
}
}



