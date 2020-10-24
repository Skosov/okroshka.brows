window.onload = function()
{
fetch('get_users.php')
    .then(
        function (response) {
            if (response.status !== 200) {
                console.log('Looks like there was a problem. ' +
                    'Status Code: ' + response.status);
            }
            response.json().then(function (data) {
                const users = data;
                console.log(users);

                const parent = document.querySelector('#users-list');

                for(const user of users) {
                const login = document.createElement('div');

                login.setAttribute('data-id', user.id);
                login.classList = "child";
                login.innerText = user.login;

                const userinfo = document.createElement('div');
                const ban = document.createElement('div');
                const user_id = document.createElement('div');

                if (user.ban_status == 1) ban.textContent = 'Забанен';
                else ban.textContent = 'Не забанен';

                user_id.innerText = user.id;


                userinfo.classList = 'user-info';
                userinfo.appendChild(user_id);
                userinfo.appendChild(login);
                userinfo.appendChild(ban);

                parent.appendChild(userinfo);
                }
            });
        })
    .catch(function (err) { 
        console.log('Fetch Error :-S', err);
    });
}