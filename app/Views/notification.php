<div class="container">
    <div class="row">
        
        <div class="card shadow mb-4">
    <?php
    echo anchor('notification/create', 'Dodaj Nowy', 'title="News title"');
    ?>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Klient</th>
            <th>Kwota</th>
            <th>Data płatności</th>
            <th>Model rozliczeniowy</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
          </tr>
          <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>