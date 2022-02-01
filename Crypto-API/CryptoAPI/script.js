$(document).ready(function(){
	$('.header').height($(window).height());
})

var ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
    document.querySelector(".header").style.height = window.innerHeight + "px";
})
var baseURL = "https://api.coinranking.com/v2/coins?limit=6";
var apiKey = "coinranking16189cfe20a156ee91a385047e7e72c4f90986f2e13c092a";
var proxyURL = "https://cors-anywhere.herokuapp.com/";

fetch(`${proxyURL}${baseURL}`, {
  method: "GET",
  headers: {
    'Content-Type': 'application/json',
    'x-access-token': `${apiKey}`,
    'Access-Control-Allow-Origin': '*'
  }
}).then((response) => {
  if(response.ok) {
    response.json().then((json) => {
      console.log(json.data.coins)
      
      let coinInfo = json.data.coins
      
      if (coinInfo.length > 0){
        var cryptoCoins = ''
      }
      
      coinInfo.forEach((coin) => {
        
        cryptoCoins += `<div class="col-md-2">`
        cryptoCoins += `<div class="card">`
        
        cryptoCoins += `<img class='img-responsive img-card'src='${coin.iconUrl}'>`;
        cryptoCoins += "<div class='card-body align-bottom'>"
        cryptoCoins += "<p>"
        cryptoCoins += `Rank: ${coin.rank}`;
        cryptoCoins += "</p>"
        cryptoCoins += "<p>"
        cryptoCoins += `${coin.name} - ${coin.symbol}`;
        cryptoCoins += "</p>"
        cryptoCoins += "<p>"
        cryptoCoins += `$${coin.price}`;
        cryptoCoins += "</p>"
        cryptoCoins += `</div>`;
        cryptoCoins += `</div>`;
        cryptoCoins += `</div>`;
          
      })
      document.getElementById('coinData').innerHTML = cryptoCoins;
    }) 
  }
  
}).catch((error) => {
  console.log(error)
})
