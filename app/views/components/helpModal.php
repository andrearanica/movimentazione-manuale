<div class='modal fade' id='helpModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Aiuto</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <h4 class='text-center'>Aiuto</h4>
        <p>Ti trovi nella dashboard: da questa sezione puoi</p>
          <ul>
            <li><b>Consultare e stampare tutte le valutazioni</b> che hai il permesso di visualizzare</li>
            <?php if ($_SESSION['role'] != 0) { echo '<li><b>Inserire una nuova valutazione</b>, compilando il modulo ed inserendo i dati corretti</li>'; } ?>
            <?php if ($_SESSION['role'] != 0) { echo '<li><b>Modificare una valutazione</b>, rendendo scaduta la vecchia valutazione e creandone una nuova</li>'; } ?>
            <?php if ($_SESSION['role'] != 0) { echo '<li><b>Eliminare una valutazione</b></li>'; } ?>
          </ul>
      </div>
    </div>
  </div>
</div>