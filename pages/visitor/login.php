<section id="login" class="visitor hideit">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">

        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/login.png" class="img-fluid animated mw-50" alt="">
          </div>
          <div class="col-md-6 ">
            <h5 class="py-5">Hai there... let's Login to Play!</h5>
            <div id="blok_login">
              <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" class="form-control input_login rounded-1">
                <small id="nickname_ket"></small>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control input_login">
                <small id="password_ket"></small>
              </div>

              <button id="btn_login" type="button" class="btn btn-primary btn-block btn-lg" disabled="">Login</button>

            </div>

            <div id="blok_login_sukses" class="hideit">
              <form method="post" action="?">
                <input type="hidden" name="nickname2" id="nickname2">
                <input type="hidden" name="password2" id="password2">
                <button type="submit" name="btn_submit_login" class="btn-primary btn-block btn-lg" style="border-radius: 9px;text-align: center">Next</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  </div>


</section>