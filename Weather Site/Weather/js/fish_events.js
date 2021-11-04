const requestURL = 'https://byui-cit230.github.io/weather/data/towndata.json';

fetch(requestURL)
    .then(function (response) {
        return response.json();
    })
    .then(function (jsonObject) {
        const towns = jsonObject['towns'];
        const fish = towns.filter(towns => towns.name == "Fish Haven")
        
        let div1 = document.createElement("div");
        let h2 = document.createElement('h2');
        let p = document.createElement('p');
        let p2 = document.createElement('p')
        let p3 = document.createElement('p')

        h2.textContent = fish[0].name + ' ' + 'Events'
        p.textContent = fish[0].events[0];
        p2.textContent = fish[0].events[1];
        p3.textContent = fish[0].events[2];

        div1.append(h2);
        div1.append(p);
        div1.append(p2);
        div1.append(p3);

        document.querySelector('div.fish_events').append(div1);
    });