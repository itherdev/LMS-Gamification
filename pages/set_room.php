<?php

?>

<section id="set_room" class="visitor">
  <div class="container">




    <div class="row">
      <div class="col-lg-4">
        &nbsp;
      </div>
      <div class="col-lg-4">
        <h3>Welcome back <?= $nickname ?></h3>
        <p>It's time to choose your Room</p>
        <hr>
        <form method="post">
          <div class="form-group">
            <select name="id_room" class="form-control">
              <?= $room_options ?>
            </select>
          </div>
          <button type="submit" name="btn_submit_id_room" class="btn-primary btn-block btn-lg" style="border-radius: 9px;text-align: center">Set Room</a>

        </form>





      </div>
      <div class="col-lg-4">
        &nbsp;
      </div>

    </div>

  </div>
</section>