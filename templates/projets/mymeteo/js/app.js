
    const weatherIcons = 
    {
        "Rain": "wi wi-day-rain",
        "Clouds": "wi wi-day-cloudy",
        "Clear": "wi wi-day-sunny",
        "Snow": "wi wi-day-snow",
        "Mist": "wi wi-day-fog",
        "Drizzle":"wi wi-day-sleet",
        "Thunderstorm":"wi wi-day-lightning",
    }
    
    function majString(str)
    {
        return str[0].toUpperCase() + str.slice(1);
    }
    
    async function main(withIP = true)
    {
        let ville;
    
        if(withIP)
        {
            //Récupère l'IP du mec et stock la dans une constante en format json. "https://api.ipify.org?format=json"
            const ip = await fetch('https://api.ipify.org?format=json')
                .then(resultat => resultat.json())
                .then(json => json.ip)
                    
            //Récupère en fonction de l'ip du mec la ville où il se trouve ( système de géolocalisation ) 
            //et stock la dans une constante en format json. ('http://ip-api.com/json/' + ip récupéré précédemment)
                ville = await fetch('http://ip-api.com/json/' + ip)
                .then(resultat => resultat.json())
                .then(json => json.city)
        }   else
            {
                ville = document.querySelector('#ville').textContent;
            }               
            //Récupère avec l'API météo, la météo complète en fonction de la ville où le mec se trouve (q=${const}),
            //Ajouter la clé API d'openweathermap puis ajouter des paramètres comme lang=fr, units=metric pour avoir des celsius au lieu des fahrenheit par défault,  
            //et stock le tout dans une constante en format json. ('http://api.openweathermap.org/data/2.5/weather?q=IP-DU-MEC&appid=7e181b27cf94564bb5e54c5402ff9bb7&lang=fr&units=metric`)
            const meteo = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&appid=7e181b27cf94564bb5e54c5402ff9bb7&lang=fr&units=metric`)
                .then(resultat => resultat.json())
                .then(json => json)
    
       displayWeatherInfos(meteo)
    }
    
    function displayWeatherInfos(data)
    {
        const nom = data.name;
        const temperature = data.main.temp;
        const conditions = data.weather[0].main;
        const description = data.weather[0].description;
    
        document.querySelector('#ville').textContent = nom;
        document.querySelector('#temperature').textContent = Math.round(temperature);
        document.querySelector('#conditions').textContent = majString(description); 
        document.querySelector('i.wi').className = weatherIcons[conditions];
    
        document.body.className = conditions.toLowerCase();
    }
    
        const ville = document.querySelector('#ville');
    
        ville.addEventListener('click', function(e){
            ville.contentEditable = true;
        });
    
        ville.addEventListener('keydown', function(e){
            if(e.keyCode == 13)
            {
                e.preventDefault();
                ville.contentEditable = false;
                main(false);
            }
        });
    
    main();

