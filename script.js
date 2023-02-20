let allEvaluationState = 0
let searchEvaluationState = 0

document.getElementById('getAllEvaluationsButton').addEventListener('click', () => {
    if (allEvaluationState == 0) {
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
                            ${ r.IR <= 0.85 ? '<div class="alert alert-success">' : r.IR <= 0.99 ? '<div class="alert alert-warning">' : '<div class="alert alert-danger">' }<b class="card-text">IR: ${ r.IR }</b></div>
                            <button class="btn btn-primary " onclick=showEvaluationInfo(${ r.id }) data-bs-toggle="modal" data-bs-target="#evaluationInfoModal">Visualizza</button>
                        </div>
                    </div>`
    
                })    
                
                document.getElementById('showAllEvaluations').innerHTML += '</div>'
            }
        })
    } else {
        document.getElementById('showAllEvaluations').innerHTML = ''
    }

    if (allEvaluationState == 0) {
        allEvaluationState = 1
    } else {
        allEvaluationState = 0
    }
}) 

function showEvaluationInfo (id) {
    console.log(id)
    $.ajax({
        url: './ajax/getEvaluationInfo.php',
        dataType: 'json',
        data: {
            id: id
        },
        success: (result) => {
            document.getElementById('evaluationInfoModalBody').innerHTML = `
            <p class="my-2">
            <b>Informazioni generali</b><br>
            Ragione sociale: ${ result.businessName }<br>
            Data di rilascio: ${ result.date }<br>
            Peso realmente sollevato: ${ result.realWeight }
            </p>
            <center>
            <table style="border: 1px solid black; margin: 40px;" class="text-center">
                <tr>
                    <th style="border: 1px solid black; padding: 15px;">Fattore moltiplicativo</th>
                    <th style="border: 1px solid black; padding: 15px;">Valore</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 15px;">Altezza da terra delle mani all'inizio del sollevamento</td>
                    <td style="border: 1px solid black; padding: 15px;">${ result.heightFromGround }</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 15px;">Distanza verticale di spostamento del peso fra inizio e fine del sollevamento</td>
                    <td style="border: 1px solid black; padding: 15px;">${ result.verticalDistance }</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 15px;">Distanza orizzontale tra le mani e il punto di mezzo delle caviglie</td>
                    <td style="border: 1px solid black; padding: 15px;">${ result.horizontalDistance }</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 15px;">Dislocazione angolare del peso in gradi</td>
                    <td style="border: 1px solid black; padding: 15px;">${ result.angularDisplacement }</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 15px;">Giudizio sulla presa del carico</td>
                    <td style="border: 1px solid black; padding: 15px;">${ result.gripValue }</td>
                </tr>
            </table>
            ${ result.IR <= 0.85 ? '<div class="alert alert-success" style="width: 90%">' : result.IR < 0.99 ? '<div class="alert alert-warning" style="width: 90%">' : '<div class="alert alert-danger" style="width: 90%;">' }<b>Peso massimo consentito: ${ result.maximumWeight }</b><br>
            <b>Indice di sollevamento: ${ result.IR }</b>
            ${ result.IR <= 0.85 ? '<p class="my-2">Non sono necessari provvedimenti per questo livello di rischio</p>' : result.IR < 0.99 ? '<p class="my-2"><b>Livello di attenzione:</b> è necessario attivare la sorveglianza sanitaria e la formazione e informazione del personale</p>' : '<p class="my-2" >Livello di rischio: sono necessari<ul><li>Interventi di prevenzione</li><li>Sorveglianza sanitaria annuale</li><li>Formazione e informazione del personale</li></ul></p>' }
            </div></center>    
            `
        }
    })
}

try {
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
} catch (error) {
    console.log(error)
}

try {
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
} catch (error) {
    console.log(error)
}

document.getElementById('newEvaluationButtonClose').addEventListener('click', () => {
    document.getElementById('alert').className = ''
    document.getElementById('alert').innerHTML = ''
})

document.getElementById('searchByBusinessNameButton').addEventListener('click', () => {
    if (document.getElementById('businessNameInput').value != '') {
        if (searchEvaluationState == 0) {
            $.ajax({
                url: './ajax/getAllEvaluations.php',
                dataType: 'json',
                data: {
                    businessName: document.getElementById('businessNameInput').value
                },
                success: (result) => {
                    result = result[0]
                    console.log(result)
                    document.getElementById('showEvaluationByBusinessName').innerHTML = `
                    <div class="col"><div class="card my-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">${ result.businessName }</h5>
                            <p class="card-text">${ result.date }</p>
                            ${ result.IR <= 0.85 ? '<div class="alert alert-success">' : result.IR <= 0.99 ? '<div class="alert alert-warning">' : '<div class="alert alert-danger">' }<b class="card-text">IR: ${ result.IR }</b></div>
                            <button class="btn btn-primary " onclick=showEvaluationInfo(${ result.id }) data-bs-toggle="modal" data-bs-target="#evaluationInfoModal">Visualizza</button>
                        </div>
                    </div>`
                }
            })
            if (searchEvaluationState == 0) {
                searchEvaluationState = 1
            } else {
                searchEvaluationState = 0
            }
        } else {
            document.getElementById('showEvaluationByBusinessName').innerHTML = ''
            
            if (searchEvaluationState == 0) {
                searchEvaluationState = 1
            } else {
                searchEvaluationState = 0
            }
        }
    } else {
        searchEvaluationState = 0
    }
})