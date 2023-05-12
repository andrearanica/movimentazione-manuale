document.getElementById('newEvaluationButton').addEventListener('click', () => {
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'heightFromGround'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('heightFromGround').innerHTML = ''
            result.map(r => document.getElementById('heightFromGround').innerHTML += `
            <option value=${ r.height }>${ r.height }</option>
            `)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'verticalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('verticalDistance').innerHTML = ''
            result.map(r => document.getElementById('verticalDistance').innerHTML += `
            <option value=${ r.dislocation }>${ r.dislocation }</option>
            `)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'horizontalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('horizontalDistance').innerHTML = ''
            result.map(r => document.getElementById('horizontalDistance').innerHTML += `<option value=${ r.distance }>${ r.distance }</option>`)
        } 
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'angularDisplacement'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('angularDisplacement').innerHTML = ''
            result.map(r => document.getElementById('angularDisplacement').innerHTML += `<option value=${ r.displacement }>${ r.displacement }</option>`)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'gripValue'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('gripValue').innerHTML = ''
            result.map(r => document.getElementById('gripValue').innerHTML += `<option value=${ r.value }>${ r.value }</option>`)
        }
    })
})

document.getElementById('date').value = new Date().getDate() 

document.getElementById('oneHand').onmouseover = () => {
    
}

document.getElementById('search').addEventListener('click', async () => {
    document.getElementById('searchBusinessName').innerHTML = ''
    await $.ajax({
        url: 'ajax',
        data: {
            request: 'get-all-businessnames'
        },
        dataType: 'json',
        success: data => {
            data.map(d => {
            document.getElementById('searchBusinessName').innerHTML += `
                <option value=${ d.businessName }>${ d.businessName }</option>
            `
            })
        },
        error: data => {
            console.log(data)
        }
    })
})

document.getElementById('searchEvaluationForm').addEventListener('submit', (e) => {
    e.preventDefault()
    $.ajax({
        url: 'ajax',
        dataType: 'json',
        data: {
            request: 'getEvaluation',
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
                        <a href="printPdf?id=${ r.id }"><button class="btn btn-primary">Stampa PDF</button></a>
                    </div>
                </div>
                `
            })
        } ,
        error: data => {
            console.log(data)
        }
    })
})

function fillForm (id) {
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'heightFromGround'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('edit-heightFromGround').innerHTML = ''
            result.map(r => document.getElementById('edit-heightFromGround').innerHTML += `
            <option value=${ r.height }>${ r.height } cm</option>
            `)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'verticalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('edit-verticalDistance').innerHTML = ''
            result.map(r => document.getElementById('edit-verticalDistance').innerHTML += `
            <option value=${ r.dislocation }>${ r.dislocation } cm</option>
            `)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'horizontalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('edit-horizontalDistance').innerHTML = ''
            result.map(r => document.getElementById('edit-horizontalDistance').innerHTML += `<option value=${ r.distance }>${ r.distance } cm</option>`)
        } 
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'angularDisplacement'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('edit-angularDisplacement').innerHTML = ''
            result.map(r => document.getElementById('edit-angularDisplacement').innerHTML += `<option value=${ r.displacement }>${ r.displacement } °</option>`)
        }
    })
    $.ajax({
        url: 'ajax',
        data: {
            request: 'tableInfo',
            table: 'gripValue'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('edit-gripValue').innerHTML = ''
            result.map(r => document.getElementById('edit-gripValue').innerHTML += `<option value=${ r.value }>${ r.value }</option>`)
        }
    })
    $.ajax({
        url: 'ajax?request=getEvaluation',
        dataType: 'json',
        data: {
            id: id
        },
        success: data => {
            data = data[0]
            console.log(data)
            document.getElementById('edit-id').value = data.evaluation_id
            document.getElementById('edit-businessName').value = data.businessName
            document.getElementById('edit-cost').value = data.cost
            document.getElementById('edit-date').value = data.date
            document.getElementById('edit-realWeight').value = data.realWeight
            document.getElementById('edit-heightFromGround').value = data.heightFromGround
            document.getElementById('edit-verticalDistance').verticalDistance = data.verticalDistance
            document.getElementById('edit-horizontalDistance').value = data.horizontalDistance
            document.getElementById('edit-angularDisplacement').value = data.angularDisplacement
            document.getElementById('edit-gripValue').value = data.gripValue
        },
        error: data => {
            console.log(data)
        }
    })
}

document.getElementById('date').value = Date.now()
document.getElementById('edit-date').value = Date.now()