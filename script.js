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
            result.map(r => document.getElementById('showAllEvaluations').innerHTML += `
            <div class="col"><div class="card my-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">${ r.business_name }</h5>
                    <p class="card-text">${ r.timestamp }</p>
                </div>
            </div>`)
            document.getElementById('showAllEvaluations').innerHTML += '</div>'
        }
    })
}) 

document.getElementById('newEvaluationButton').addEventListener('click', () => {
    $.ajax({
        url: './ajax/getTableInfo.php?table=heightFromGround',
        dataType: 'json',
        success: (result) => {
            document.getElementById('heightFromGround').innerHTML = ''
            result.map(r => document.getElementById('heightFromGround').innerHTML += `
            <option value=${ r.height }>${ r.height }</option>
            `)
        }
    })
    $.ajax({
        url: './ajax/getTableInfo.php?table=verticalDistance',
        dataType: 'json',
        success: (result) => {
            document.getElementById('verticalDistance').innerHTML = ''
            result.map(r => document.getElementById('verticalDistance').innerHTML += `
            <option value=${ r.dilocation }>${ r.dislocation }</option>
            `)
        }
    })
    $.ajax({
        url: './ajax/getTableInfo.php?table=horizontalDistance',
        dataType: 'json',
        success: (result) => {
            document.getElementById('horizontalDistance').innerHTML = ''
            result.map(r => document.getElementById('horizontalDistance').innerHTML += `<option value=${ r.distance }>${ r.distance }</option>`)
        } 
    })
    $.ajax({
        url: './ajax/getTableInfo.php?table=angularDisplacement',
        dataType: 'json',
        success: (result) => {
            document.getElementById('angularDisplacement').innerHTML = ''
            result.map(r => document.getElementById('angularDisplacement').innerHTML += `<option value=${ r.displacement }>${ r.displacement }</option>`)
        }
    })
    $.ajax({
        url: './ajax/getTableInfo.php?table=gripValue',
        dataType: 'json',
        success: (result) => {
            document.getElementById('gripValue').innerHTML = ''
            result.map(r => document.getElementById('gripValue').innerHTML += `<option value=${ r.value }>${ r.value }</option>`)
        }
    })
})