<div class="container">
    <div class="row">
        
        <div class="card shadow mb-4">
    <?php
    echo anchor('documents/create', 'Dodaj Nowy', 'title="News title"');
    ?>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Klient</th>
            <th>Data płatności</th>
            <th>Kwota</th>
            <th>Model rozliczeniowy</th>
            <th>Komentarz</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          if($documents){
            foreach($documents as $document){
              echo '<tr><td>'.$document->d_id
              .'<td>'.$document->d_clientname.'</td>'
              .'<td>'.$document->d_paydate.'</td>'
              .'<td>'.$document->d_amount.'</td>';

              if($document->d_paymentmodel == 2){
                $paymentmodel = 'roczny';
              }
              else {
                $paymentmodel = 'miesięczny';
              }

              echo '<td>'.$paymentmodel.'</td>'
              .'<td>'.$document->d_comment.'</td></tr>';

            }
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>