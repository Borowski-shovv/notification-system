<div class="container-fluid">
  <h1 class="h3 mt-3 mb-3 text-gray-800">Notyfikacje</h1>

  
  <div class="card shadow mb-4">

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
            } else {
              echo '<p class="text-center"><b>Nie znaleziono żadnych płatności</b></p>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
          </div>
          </div>