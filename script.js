document.getElementById('myAccount').addEventListener('click', () => {
    $.ajax({
        type: 'GET',
        data: {
            username: 'mauriziogaffuri'
        },
        url: './ajax/getAccountInfo.php',
        dataType: 'json',
        success: (result) => {
            document.getElementById('name_surname').innerHTML = 'Nome e cognome: ' + result.name_surname
            document.getElementById('username').innerHTML = 'Username: ' + result.username
            if (result.role == 0) {
                document.getElementById('role').innerHTML = 'Ruolo: visualizzatore';
            } else if (result.role == 1) {
                document.getElementById('role').innerHTML = 'Ruolo: ';
            }
             
        }
    })
})