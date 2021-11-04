// Events
const requestURL = 'https://byui-cit230.github.io/weather/data/towndata.json';

fetch(requestURL)
    .then(function (response) {
        return response.json();
    })
    .then(function (jsonObject) {
        const towns = jsonObject['towns'];
        const preston = towns.filter(towns => towns.name == "Preston");
        const soda_springs = towns.filter(towns => towns.name == "Soda Springs");
        const fish_haven = towns.filter(towns => towns.name == "Fish Haven")
        
        let div1 = document.createElement("div");
        let h2 = document.createElement('h2');
        let p = document.createElement('p');
        let p2 = document.createElement('p')
        let p3 = document.createElement('p')

        h2.textContent = preston[0].name + ' ' + 'Events'
        p.textContent = preston[0].events[0];
        p2.textContent = preston[0].events[1];
        p3.textContent = preston[0].events[2];

        div1.append(h2);
        div1.append(p);
        div1.append(p2);
        div1.append(p3);

        document.querySelector('div.preston_events').append(div1);

        let div2 = document.createElement("div");
        let h12 = document.createElement('h2');
        let f = document.createElement('p');
        let f2 = document.createElement('p')
        let f3 = document.createElement('p')

        h12.textContent = soda_springs[0].name + ' ' + 'Events'
        p.textContent = soda_springs[0].events[0];
        p2.textContent = soda_springs[0].events[1];
        p3.textContent = soda_springs[0].events[2];

        div2.append(h12);
        div2.append(f);
        div2.append(f2);
        div2.append(f3);

        document.querySelector('div.soda_events').append(div2); 
          
       });
 