// -- JS FOR RAIN

var makeItRain = function () {
    //clear out everything
    var increment = 0;
    var drops = "";
    var backDrops = "";

    while (increment < 100) {
        //couple random numbers to use for various randomizations
        //random number between 98 and 1
        var randoHundo = Math.floor(Math.random() * (98 - 1 + 1) + 1);
        //random number between 5 and 2
        var randoFiver = Math.floor(Math.random() * (5 - 2 + 1) + 2);
        //increment
        increment += randoFiver;
        //add in a new raindrop with various randomizations to certain CSS properties
        drops +=
            '<div class="drop" style="left: ' +
            increment +
            "%; bottom: " +
            (randoFiver + randoFiver - 1 + 100) +
            "%; animation-delay: 0." +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"><div class="stem" style="animation-delay: 0.' +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"></div><div class="splat" style="animation-delay: 0.' +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"></div></div>';
        backDrops +=
            '<div class="drop" style="right: ' +
            increment +
            "%; bottom: " +
            (randoFiver + randoFiver - 1 + 100) +
            "%; animation-delay: 0." +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"><div class="stem" style="animation-delay: 0.' +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"></div><div class="splat" style="animation-delay: 0.' +
            randoHundo +
            "s; animation-duration: 0.5" +
            randoHundo +
            's;"></div></div>';
    }
    const dropss = document.createElement("div");
    dropss.innerHTML = drops;
    document.querySelector(".front-row").appendChild(dropss);
};

const makeItSnow = () => {
    const snow = document.getElementById("snow");
    snow.classList.add("snowflakes");

    snow.style.display = "flex";
};

const makeItClouds = () => {
    const clouds = document.getElementById("background-wrap");
    clouds.classList.add("clouds");

    clouds.style.display = "block";
};

(function () {
    const getWeatherType = (weatherType) => {
        switch (weatherType) {
            case "Clouds":
                makeItClouds();
                break;
            case "Thunderstorm":
            case "Drizzle":
            case "Rain":
                makeItRain();
                break;
            case "Snow":
                makeItSnow();
                break;
        }
    };

    const getAussie = (countryCode) => {
        if (countryCode === "AU") {
            document.getElementsByTagName("body")[0].style.transform =
                "rotate(180deg)";
            setTimeout(() => {
                alert("G'Day Mate");
            }, 1500);
        }
    };

    const getPosition = (pos) => {
        fetch(
            `http://127.0.0.1:8000/api/getWeather?lat=${pos.coords.latitude}&lon=${pos.coords.longitude}`,
            { method: "GET" }
        )
            .then((response) => {
                if (response.status === 200) {
                    return response.json();
                }
            })
            .then((data) => {
                console.log(data);
                const expiryTime = Date.now() + 2 * 60 * 60 * 1000;
                const weatherObject = {
                    lat: data.coord.lat,
                    lon: data.coord.lon,
                    time: expiryTime,
                    type: data.weather[0].main,
                    loc: data.sys.country,
                };
                localStorage.setItem(
                    "weatherObject",
                    JSON.stringify(weatherObject)
                );

                getWeatherType(data.weather[0].main);
                getAussie(data.sys.country);
            })
            .catch((err) => {
                console.warn(err);
            });
    };

    const weatherData = localStorage.getItem("weatherObject");
    if (weatherData !== null) {
        const weatherObject =
            weatherData == null ? [] : JSON.parse(weatherData);
        if (weatherObject.time < Date.now()) {
            //has expired
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getPosition);
            }
        } else {
            //has not expired
            getWeatherType(weatherObject.type);
            getAussie(weatherObject.loc);
        }
    } else {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getPosition);
        }
    }
})();
