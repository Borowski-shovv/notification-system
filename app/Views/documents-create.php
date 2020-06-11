<div class="container">
    <div class="row">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1>Dodaj nową notyfikacje</h1>
<?php if(session()->get('success')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= session()->get('success') ?>
  </div>
<?php endif; ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nazwa klienta</label>
    <input class="form-control" id="exampleFormControlInput1" name="clientname">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Komentarz</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Kwota</label>
    <input type="" class="form-control" id="exampleFormControlInput1" name="amount">
  </div>
  <div class="form-group"> 
        <label class="control-label" for="date">Data</label>
        <input class="form-control" id="date" name="paydate" placeholder="MM/DD/YYY" type="text"/>
  </div>
  <div class="form-group"> 
    <label class="control-label" for="date">Model płatności</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="paymentmodel" id="exampleRadios1" value="1" checked <?php echo  set_radio('paymentmodel', '1', TRUE); ?>>
      <label class="form-check-label" for="exampleRadios1">
        Miesięczny
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="paymentmodel" id="exampleRadios2" value="2" <?php echo  set_radio('paymentmodel', '2'); ?>>
      <label class="form-check-label" for="exampleRadios2">
        Roczny
      </label>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Utwórz</button>
  </div>
  <?php if (isset($validation)): ?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
      </div>
    </div>
  <?php endif; ?>
</form>

</div>
</div>