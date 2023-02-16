document.getElementById('getAllEvaluationsButton').addEventListener('click', () => {
    document.getElementById('showAllEvaluations').innerHTML = ''
    $.ajax({
        url: './ajax/getAllEvaluations.php',
        dataType: 'json',
        success: (result) => {
            document.getElementById('showAllEvaluations').innerHTML = '<div class="row">'
            result.map(r => {
                document.getElementById('showAllEvaluations').innerHTML += `
                <div class="col"><div class="card my-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">${ r.businessName }</h5>
                        <p class="card-text">${ r.date }</p>
                    </div>
                </div>`

            })    
            
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

document.getElementById('addEvaluation').addEventListener('click', () => {
    const businessName = document.getElementById('businessName').value
    const date = document.getElementById('date').value
    const heightFromGround = document.getElementById('heightFromGround').value
    const verticalDistance = document.getElementById('verticalDistance').value
    const horizontalDistance = document.getElementById('horizontalDistance').value
    const angularDisplacement = document.getElementById('angularDisplacement').value
    const gripValue = document.getElementById('gripValue').value
    const realWeight = document.getElementById('realWeight').value

    $.ajax({
        url: './ajax/addNewEvaluation.php',
        data: {
            businessName: businessName,
            date: date,
            heightFromGround: heightFromGround,
            verticalDistance: verticalDistance,
            horizontalDistance: horizontalDistance,
            angularDisplacement: angularDisplacement,
            gripValue: gripValue,
            realWeight: realWeight
        },
        success: (result) => {
            if (result == 1) {
                document.getElementById('alert').innerHTML = ''
                document.getElementById('alert').className='alert alert-success'
                document.getElementById('alert').innerHTML = 'Nuova valutazione inserita con successo'
            }
            console.log(result)
        }
    })
})

document.getElementById('newEvaluationButtonClose').addEventListener('click', () => {
    document.getElementById('alert').className = ''
    document.getElementById('alert').innerHTML = ''
})