<button class='btn btn-primary my-2' id='search' data-bs-toggle='modal' data-bs-target='#searchEvaluation'>Cerca per ragione sociale</button>
<div class='modal fade' id='searchEvaluation' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'>Cerca valutazione</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <form id='searchEvaluationForm'>
                    <label for='businessName'>Ragione sociale</label>
                    <select required class='form-control my-2 text-center' name='searchBusinessName' id='searchBusinessName'>
                    
                    </select>
                    <button id='searchEvaluationButton' class='btn btn-success'>Cerca valutazione</button>
                </form>
                <center>
                <div class='' id='evaluation'>

                </div></center>
            </div>
        </div>
    </div>
</div>