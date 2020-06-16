<div class="container-fluid">
  <h1 class="h3 mt-3 mb-3 text-gray-800">Notyfikacje</h1>

  
  <div class="card shadow mb-4">
  <?php if(session()->get('success')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('success') ?>
                    </div>
   <?php endif; ?>
   <?php if(session()->get('newone')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('newone') ?>
                    </div>
   <?php endif; ?>
   <?php if(session()->get('editone')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('editone') ?>
                    </div>
   <?php endif; ?>
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
              <th>Wysłać notyfikacje</th>
              <th>Akcja</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            if($documents){
              foreach($documents as $document){
                //var_dump($document);
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
                .'<td>'.$document->d_comment.'</td>';

                if($document->n_d_id != null){
                    $send = 'TAK';
                }else {
                    $send = 'NIE';
                }
                echo '<td>'.$send.'</td>'
                .'<td class="text-center">'
                .anchor(site_url('documents/update/'.$document->d_id), 'Edytuj', 'class="btn btn-primary"').' '
                .anchor(site_url('documents/delete/'.$document->d_id), 'Usuń', ['class' =>"btn btn-danger user_deleted", 'uid' => $document->d_id]).'</td>
                </tr>';
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
          <div class="modal modal-danger fade" id="modal_popup">

<div class="modal-dialog modal-sm">
  <form action="<?php echo base_url(); ?>/documents" method="post"> 
      <div class="modal-content">

        <div class="modal-header" style="height: 150px;">

            <h4 style="margin-top: 50px;text-align: center;">Na pewno chcesz usunąć notyfikacje?</h4>


      <input type="hidden" name="id" id="user_id" value="">

        </div>

        <div class="modal-footer">

            <?php
            echo anchor('', 'Usuń', ['class' =>"btn btn-danger", 'id' => 'deletebutton' ]).'</td>';
            ?>
         
            <button type="button" class="btn btn-success pull-left" data-dismiss="modal" >Nie</button>
        </div>

      </div>

    </form>

</div>

</div>

<script type="text/javascript">
		$(document).on('click','.user_deleted',function(){

			var id = $(this).attr('uid');

			$('#deletebutton').attr("href", "/documents/delete/"+id);

      $('#modal_popup').modal({backdrop: 'static', keyboard: true, show: true});
      
      return false;
		});
	</script>