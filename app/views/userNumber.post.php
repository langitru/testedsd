  
<?php $this->layout('layout', ['title' => 'Введите ваше число:']) ?>

<div class="col-8 offset-2">
  <form action="/number" method="post">
    <br><br>
      <div class="row g-2 justify-content-center">
          <div class="col-auto">
              <label for="inputnum" class="col-form-label">Введите ваше число:</label>
          </div>
          <div class="col-2">
              <input name="user_number" type="text" id="inputnum" class="form-control">
          </div>
          <div class="col-auto">
              <button name="user_send_number" type="submit" class="btn btn-primary">Отправить</button>
          </div>
      </div>
    <div class="row">
      <div class="col-lg-4 mx-auto">
      <? if ( isset($game->error) ): ?>
          <div class="answer_extrasens alert alert-danger alert-dismissible fade show" role="alert">
              <p><b><?= $game->DisplayError() ?></b></p> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

      <? elseif ( $game->GetCurrentRound() != 0 && $game->GetCurrentStep() != 0 ) : ?> 
          <div class="answer_extrasens alert alert-success alert-dismissible fade show" role="alert">
          
              <?php foreach($game->GetPsychics() as $psychic): ?>
                  
                  <p><b><?= $psychic->GetName() ?> : <?= $psychic->GetCurrentGuess() ?></b></p>   
              
              <?php endforeach;?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <? endif;?>
    
    </div>
</div>
  </form>   
</div>

