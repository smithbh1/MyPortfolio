const requestURL = 'https://byui-cit230.github.io/weather/data/towndata.json';

fetch(requestURL)
  .then(function (response) {
    return response.json();
  })
  .then(function (jsonObject) {
    const towns = jsonObject['towns'];
    
    const correct_town = towns.filter(x => x.name == 'Preston' || x.name == 'Soda Springs' || x.name == 'Fish Haven');

    correct_town.forEach(town => {
        let soda = document.createElement('section');
        let h2 = document.createElement('h2');
        let p = document.createElement('p');
        let p2 = document.createElement('p')
        let p3 = document.createElement('p')
        let image = document.createElement('img')

        h2.textContent = town.name;
        p.textContent = `Year Founded: ${town.yearFounded}`;
        p2.textContent = 'Population: '+ town.currentPopulation;
        p3.textContent = 'Average Rainfall: ' + town.averageRainfall + " in.";
        image.setAttribute('src', `images/${town.photo}`);
        image.setAttribute('alt', town.name);
        soda.appendChild(h2);
        soda.appendChild(p);
        soda.appendChild(p2);
        soda.appendChild(p3);
        soda.appendChild(image);

        document.querySelector('div.town_info').appendChild(soda);
        
      });})
