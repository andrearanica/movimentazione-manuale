<div class="modal fade text-center" id="showAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Il mio account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Il mio account</h4>
                    <p class="my-1" id="name_surname">Nome e cognome: <?php echo $_SESSION['name_surname']; ?></p>
                    <p class="my-1" id="username">Username: <?php echo $_SESSION['username']; ?></p>
                    <p class="my-1" id="role">Ruolo: <?php if ($_SESSION['role'] == 0) { echo 'azienda'; } else if ($_SESSION['role'] == 2) { echo 'operatore'; } else { echo 'Admin'; }?></p>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
    </div>
</div>