<section id="change_room" class="visitor hideit">
  <div class="container">

    <div class="row">
      <div class="col-lg-4">
        &nbsp;
      </div>
      <div class="col-lg-4">
        <h4>Hello <?=$nickname?>, bored with this room?</h4>
        <p>It's time to change to another!</p>
        <hr>
        <form method="post">
          <div class="form-group">
            <select name="id_room" id="change_room_id" class="form-control">
              <?=$room_options?>
            </select>
          </div>
          <button type="submit" name="btn_submit_id_room" class="btn-primary btn-block btn-lg" style="border-radius: 9px;text-align: center">Change Room</a>
        </form>

      </div>
      <div class="col-lg-4">
        &nbsp;
      </div>

    </div>

  </div>
</section>
