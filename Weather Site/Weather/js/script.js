const daynames = [
	"Sunday",
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday",
	"Saturday"
];
const months = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December"
];
const d = new Date();
const dayName = daynames[d.getDay()];
const monthName = months[d.getMonth()];
const year = d.getFullYear();
const fulldate = `${dayName}, ${d.getDate()} ${monthName} ${year}`;
const numerical_date = `${d.getMonth()}/${d.getDate()}/${year}`; 
document.getElementById("currentdate").textContent = fulldate;

const hambutton = document.querySelector(".ham_menu");
const mainnav = document.querySelector(".navigation")

hambutton.addEventListener("click", () => 
{mainnav.classList.toggle("responsive")}, false);

if (d.getDay() == 5){
    document.querySelector(".banner_message").style.display="block";
}

var header = document.querySelector(".navigation");
var links = header.getElementsByClassName("link");
    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active", "");
      }
      this.className += " active";
      });
    }
// Number of days since last visit

if(!localStorage.getItem('date')) {
	date_storage();
  } else {
		let last_visit = localStorage.getItem("date");
		localStorage.setItem("today", numerical_date);
		let today = numerical_date;
		number_of_days(last_visit, today);
  };

function date_storage(){
	
	localStorage.setItem("date", numerical_date);
  };

function number_of_days(start, end){
	var date1 = new Date(start);
	var date2 = new Date(end);

	var oneDay = 1000 * 60 * 60 * 24;

	var time_difference = date2.getTime() - date1.getTime();

	var day_difference = Math.round(time_difference / oneDay);

	document.querySelector("#last_visit").innerHTML = `Your last visit was ${day_difference} days ago.`;
};
window.addEventListener('beforeunload', function (event) {
    delete event['returnValue'];
    localStorage.setItem("date", numerical_date)
  });