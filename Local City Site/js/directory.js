const business_directory = 'json/directory.json'

fetch(business_directory)
  .then(function (response) {
    return response.json();
  })
  .then(function (jsonObject) {
    const business = jsonObject['business'];

    business.forEach(x => {
        console.log(x)
        let card = document.createElement('div');
        let h3 = document.createElement('h3');
        let p = document.createElement('p');
        let p1 = document.createElement('p');
        let p2 = document.createElement('p');
        let image = document.createElement('img');

        h3.textContent = x.name;
        p.textContent = x.phone;
        p1.textContent = `Email: ${x.email}`;
        p2.textContent = `Site: ${x.site}`;
        image.setAttribute = ('src', `images/${x.logo}`);
        image.setAttribute = ('alt', x.name);

        card.appendChild(h3);
        card.appendChild(p);
        card.appendChild(p1);
        card.appendChild(p2);
        card.appendChild(image);

        document.querySelector('div.business_card').appendChild(card);
    })});

    function grid(){
        document.querySelector(".business_card").style.display = "flex";
        document.querySelector(".business_card").style.flexDirection = "row";
        document.querySelector(".business_card").style.flexWrap = "wrap";


    }
    function list(){
        document.querySelector(".business_card").style.display = "flex";
        document.querySelector(".business_card").style.flexDirection = "column";


    }