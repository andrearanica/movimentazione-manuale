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
            <option value=${ r.dislocation }>${ r.dislocation }</option>
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

document.getElementById('oneHand').onmouseover = () => {
    
}

document.getElementById('searchEvaluationButton').onclick = () => {
    $.ajax({
        url: './ajax/getEvaluation.php',
        dataType: 'json',
        data: {
            businessName: document.getElementById('searchBusinessName').value
        },
        success: (result) => {
            document.getElementById('evaluation').innerHTML = ''
            if (result.length == 0) {
                document.getElementById('evaluation').innerHTML = '<div class="alert alert-danger text-center my-2"><b>Non è stata trovata nessuna valutazione per questa ragione sociale</b></div>'
            }
            result.map(r => {
                document.getElementById('evaluation').innerHTML += `
                <div class="card my-2" style="width: 18rem; margin-bottom: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">${ r.businessName }</h5>
                        <p class="card-text">Indice di sollevamento: ${ r.IR }</p>
                        <a href="./php/printPdf.php?id=${ r.id }"><button class="btn btn-primary">Stampa PDF</button></a>
                    </div>
                </div>
                `
            })
        } 
    })
}

