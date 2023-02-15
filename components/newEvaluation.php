<button type="button" class="btn btn-success my-2" id="newEvaluationButton" data-bs-toggle="modal" data-bs-target="#newEvaluationModal">
  Nuova valutazione
</button>

<div class="modal fade" id="newEvaluationModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuova valutazione</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="businessName">Ragione sociale</label>
        <input class="form-control my-2" name="businessName" id="businessName">
        <label for="heightFromGround">Altezza da terra delle mani all'inizio del sollevamento</label>
        <select class="form-control my-2" name="heightFromGround" id="heightFromGround">
            
        </select>
        <label for="verticalDistance">Distanza verticale di spostamento del peso fra inizio e fine sollevamento</label>
        <select class="form-control my-2" name="verticalDistance" id="verticalDistance">

        </select>
        <label for="horizontalDistance">Distanza orizzontale tra mani e punto di mezzo delle caviglie</label>
        <select class="form-control my-2" name="horizontalDistance" id="horizontalDistance">

        </select>
        <label for="angularDisplacement">Dislocazione angolare del peso in gradi</label>
        <select class="form-control my-2" name="angularDisplacement" id="angularDisplacement">

        </select>
        <label for="gripValue">Giudizio sulla presa del carico</label>
        <select class="form-control my-2" name="gripValue" id="gripValue">
        </select>
        <label for="frequency">Frequenza dei gesti</label>
        <input class="form-control my-2" name="frequency" id="frequency">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Aggiungi</button>
      </div>
    </div>
  </div>
</div>