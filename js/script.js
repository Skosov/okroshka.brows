
window.onload = function()
{
selectFromDB('Понедельник');
fetch('get_days.php')
    .then(
        function (response) {
            if (response.status !== 200) {
                console.log('Looks like there was a problem. ' +
                    'Status Code: ' + response.status);
            }
            response.json().then(function (data) {
                const days = data;
                console.log(days);
                const parent = document.querySelector('#days');
                for(let i = 0; i < days.length; i++) {
                const element = document.createElement('option');
                element.innerText = days[i];
                parent.appendChild(element);
                }
            });
        })
    .catch(function (err) { 
        console.log('Fetch Error :-S', err);
    });
}



function selectFromDB(day) {
    fetch('get_times.php?day=' + day)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. ' +
                        'Status Code: ' + response.status);
                }
                    response.json().then(function (data) {
                    const times = data;
                    const TimeSelect = document.querySelector('#times');
                    while (TimeSelect.firstChild) {
                    TimeSelect.removeChild(TimeSelect.firstChild);
                    }   
                    console.log(times);
                    for (let i = 0; i < times.length; i++) {
                        const TimeAdd = document.createElement('option');
                        TimeAdd.innerText = times[i];
                        TimeSelect.appendChild(TimeAdd);
                    }
                });
            })
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
    document.getElementById('times').selectedIndex = 0; // выбираем самое первое время
}