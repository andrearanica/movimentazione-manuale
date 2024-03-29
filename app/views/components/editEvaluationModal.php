<div class='modal fade' id='editEvaluationModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
        <div class='modal-header'>
            <h1 class='modal-title fs-5' id='exampleModalLabel'>Modifica valutazione</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <form action='editEvaluation' id='editEvaluationForm' method='post'>
                <input name='id' id='edit-id' style='display: none;'>
                <label for='businessName'>Ragione sociale</label>
                <input required class='form-control my-2 text-center' name='businessName' id='edit-businessName' readonly>
                <label for='cost'>Costo</label>
                <input required class='form-control my-2 text-center' name='cost' id='edit-cost' type='number'>  
                <label for='date'>Data di emissione</label>
                <input required class='form-control my-2 text-center' name='date' id='edit-date' type='date'>
                <label for='realWeight'>Peso realmente sollevato (Kg)</label>
                <input required class='form-control my-2 text-center' name='realWeight' id='edit-realWeight' type='number' min=3 max=30>
                <label for='heightFromGround'>Altezza da terra delle mani all'inizio del sollevamento</label>
                <select required class='form-control my-2 text-center' name='heightFromGround' id='edit-heightFromGround' type='number'>
                    
                </select>
                <label for='verticalDistance'>Distanza verticale di spostamento del peso fra inizio e fine sollevamento</label>
                <select required class='form-control my-2 text-center' name='verticalDistance' id='edit-verticalDistance' type='number'>

                </select>
                <label for='horizontalDistance'>Distanza orizzontale tra mani e punto di mezzo delle caviglie</label>
                <select required class='form-control my-2 text-center' name='horizontalDistance' id='edit-horizontalDistance' type='number'>

                </select>
                <label for='angularDisplacement'>Dislocazione angolare del peso in gradi</label>
                <select required class='form-control my-2 text-center' name='angularDisplacement' id='edit-angularDisplacement' type='number'>

                </select>
                <label for='gripValue'>Giudizio sulla presa del carico</label>
                <select required class='form-control my-2 text-center' name='gripValue' id='edit-gripValue' type='number'>
                
                </select>
                <label for='frequency'>Frequenza dei gesti</label>
                <select required id='edit-frequency' name='frequency' class='form-control my-2 text-center'>
                    <option value='0.2'>0.20 gesti/minuto</option>
                    <option value='1'>1 gesti/minuto</option>
                    <option value='4'>4 gesti/minuto</option>
                    <option value='6'>6 gesti/minuto</option>
                    <option value='9'>9 gesti/minuto</option>
                    <option value='12'>12 gesti/minuto</option>
                    <option value='15'>15 gesti/minuto</option>
                </select>
                <select required id='edit-duration' name='duration' class='form-control my-2 text-center'>
                    <option value='< 1 ora'>< 1 ora</option>
                    <option value='da 1 a 2 ore'>da 1 a 2 ore</option>
                    <option value='da 2 a 8 ore'>da 2 a 8 ore</option>
                </select>
                <label for='edit-oneHand'>Sollevamento con una sola mano?</label>
                <input type='checkbox' id='edit-oneHand' name='oneHand'><br />
                <label for='edit-twoPeople'>Sollevamento fatto da due persone?</label>
                <input type='checkbox' id='edit-twoPeople' name='twoPeople'><br />
                <br /><input type='submit' class='btn btn-success' value='Salva'>
            </form>
        </div>
        </div>
    </div>
</div>