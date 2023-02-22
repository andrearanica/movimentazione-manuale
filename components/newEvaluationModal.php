
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuova valutazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./php/addNewEvaluation.php">
                            <label for="businessName">Ragione sociale</label>
                            <input class="form-control my-2 text-center" name="businessName" id="businessName">
                            <label for="cost">Costo</label>
                            <input class="form-control my-2 text-center" name="cost" id="cost" type="number">  
                            <label for="date">Data di emissione</label>
                            <input class="form-control my-2 text-center" name="date" id="date" type="date">
                            <label for="realWeight">Peso reale</label>
                            <input class="form-control my-2 text-center" name="realWeight" id="realWeight" type="number">
                            <label for="heightFromGround">Altezza da terra delle mani all'inizio del sollevamento</label>
                            <select class="form-control my-2 text-center" name="heightFromGround" id="heightFromGround" type="number">
                                
                            </select>
                            <label for="verticalDistance">Distanza verticale di spostamento del peso fra inizio e fine sollevamento</label>
                            <select class="form-control my-2 text-center" name="verticalDistance" id="verticalDistance" type="number">

                            </select>
                            <label for="horizontalDistance">Distanza orizzontale tra mani e punto di mezzo delle caviglie</label>
                            <select class="form-control my-2 text-center" name="horizontalDistance" id="horizontalDistance" type="number">

                            </select>
                            <label for="angularDisplacement">Dislocazione angolare del peso in gradi</label>
                            <select class="form-control my-2 text-center" name="angularDisplacement" id="angularDisplacement" type="number">

                            </select>
                            <label for="gripValue">Giudizio sulla presa del carico</label>
                            <select class="form-control my-2 text-center" name="gripValue" id="gripValue" type="number">
                            
                            </select>
                            <label for="frequency">Frequenza dei gesti</label>
                            <select id="frequency" name="frequency">
                                <option value="0.2">0.20</option>
                                <option value="1">1</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                                <option value="15">15</option>
                            </select>
                            <select id="duration" name="duration">
                                <option value="< 1 ora">< 1 ora</option>
                                <option value="da 1 a 2 ore">da 1 a 2 ore</option>
                                <option value="da 2 a 8 ore">da 2 a 8 ore</option>
                            </select>
                            <input type="submit" class="btn btn-success" value="Salva">
                        </form>
                    </div>
                    </div>
                </div>
            </div>