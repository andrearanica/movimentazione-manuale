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

document.getElementById('getAllEvaluationsButton').addEventListener('click', () => {
    document.getElementById('showAllEvaluations').innerHTML = ''
    $.ajax({
        url: './ajax/getAllEvaluations.php',
        dataType: 'json',
        success: (result) => {
            document.getElementById('showAllEvaluations').innerHTML = '<div class="row">'
            result.map(resul => document.getElementById('showAllEvaluations').innerHTML += `
            <div class="col"><div class="card my-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">${ resul.business_name }</h5>
                    <p class="card-text">${ resul.timestamp }</p>
                </div>
            </div>`)
            document.getElementById('showAllEvaluations').innerHTML += '</div>'
        }
    })
}) 