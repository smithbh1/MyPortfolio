function loadUSATxt(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector("#text_display").innerHTML = this.responseText;
    }
    xhttp.open("GET", "usa.txt", true);
    xhttp.send();
}
function loadCanadaTxt(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector("#text_display").innerHTML = this.responseText;
    }
    xhttp.open("GET", "canada.txt", true);
    xhttp.send();
}
function loadMexicoTxt(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector("#text_display").innerHTML = this.responseText;
    }
    xhttp.open("GET", "mexico.txt", true);
    xhttp.send();
}
function loadRussiaTxt(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector("#text_display").innerHTML = this.responseText;
    }
    xhttp.open("GET", "russia.txt", true);
    xhttp.send();
}

function loadStudentInfo(){
    let file = document.getElementById("file_specified").value;

    const json_txt = 'json.txt';
    const json1_txt = 'json1.txt';

    if (file == "json.txt"){
        fetch(json_txt)
        .then(function (response) {
         return response.json();
        })
        .then(function (jsonObject) {
            const students = jsonObject['students'];
            console.table(jsonObject);  // temporary checking for valid response and data parsing
    
            for (let i = 0; i < students.length; i++ ) {
                let card = document.createElement('section');
                let h2 = document.createElement('h2');
                let p = document.createElement('p');
                let p2 = document.createElement('p');
                let p3= document.createElement('p');

                h2.textContent = students[i].first + ' ' + students[i].last;
                p.textContent = 'Address: ' + students[i].address.city + ', ' + students[i].address.state + ' ' + students[i].address.zip;
                p2.textContent = 'Major: '+ students[i].major;
                p3.textContent = 'GPA: '+ students[i].gpa;
                card.appendChild(h2);
                card.appendChild(p);
                card.appendChild(p2);
                card.appendChild(p3);

                document.querySelector('#json_display').appendChild(card);
            }

        });}
    else if(file == "json1.txt"){
        
        fetch(json1_txt)
        .then(function (response) {
         return response.json();
        })
        .then(function (jsonObject) {
            const students = jsonObject['students'];
            console.table(jsonObject);  // temporary checking for valid response and data parsing
    
            for (let i = 0; i < students.length; i++ ) {
                let card = document.createElement('section');
                let h2 = document.createElement('h2');
                let p = document.createElement('p');
                let p2 = document.createElement('p');
                let p3= document.createElement('p');

                h2.textContent = students[i].first + ' ' + students[i].last;
                p.textContent = 'Address: ' + students[i].address.city + ', ' + students[i].address.state + ' ' + students[i].address.zip;
                p2.textContent = 'Major: '+ students[i].major;
                p3.textContent = 'GPA: '+ students[i].gpa;
                card.appendChild(h2);
                card.appendChild(p);
                card.appendChild(p2);
                card.appendChild(p3);

                document.querySelector('#json_display').appendChild(card);
            }

        });}
        else{
            document.querySelector("#json_display").innerHTML = "No a file found. Please try again."

        }
    }

    //const json_object = JSON.parse(json.txt);
    //const json1_object = JSON.parse(json1.txt);
    /*if (file == "json.txt"){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        document.querySelector("#json_display").innerHTML = this.responseText;
        }
        xhttp.open("GET", "json.txt", true);
        xhttp.send();
    } else if (file == "json1.txt"){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        document.querySelector("#json_display").innerHTML = this.responseText;
        }
        xhttp.open("GET", "json1.txt", true);
        xhttp.send();
        } else{
            document.querySelector("#json_display").innerHTML = "No a file found. Please try again."

        }
}*/
