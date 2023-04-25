<!--<div>
</div>-->
<button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#newAccountModal">Aggiungi nuovo utente</button>
<div class="modal fade" id="newAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Inserisci un nuovo utente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="newUser">
            <label for="name">Nome</label>
            <input id="name" name="name" class="form-control my-2 text-center">
            <label for="surname">Cognome</label>
            <input id="surname" class="form-control my-2 text-center" name="surname">
            <label for="username">Username</label>
            <input id="username" class="form-control my-2 text-center" name="username">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" class="form-control my-2 text-center">
            <label for="role">Ruolo</label>
            <select id="role" class="form-control text-center" name="role">
                <option value="0">Visualizzatore (azienda)</option>
                <option value="1">Amministratore</option>
                <option value="2">Operatore</option>
            </select>
            <input type="submit" value="Salva" class="btn btn-success my-2">
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php



?>