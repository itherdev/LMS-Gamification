<section id="login" class="visitor hideit">
  <div class="container">


    <div class="row">
      <div class="col-lg-4">
        &nbsp;
      </div>
      <div class="col-lg-4">
        <h5 id="pesan_login">Hai there... let's Login to Play!</h5>
        <hr>

        <div id="blok_login">
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" id="nickname" class="form-control input_login">
            <small id="nickname_ket"></small>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control input_login">
            <small id="password_ket"></small>
          </div>

          <button id="btn_login" class="btn-primary btn-block btn-lg" style="border-radius: 9px" disabled="">Login</button>
          <hr>
          <table width="100%">
            <tr>
              <td width="50%">
                <button id="btn_login_viag" class="btn-success btn-block"><small>Login via Google</small></button>
              </td>
              <td width="50%">
                <button id="btn_lupa_pass" class="btn-success btn-block"><small>Lupa Password</small></button>
              </td>
            </tr>
          </table>
        </div>

        <div id="blok_login_sukses" class="hideit">
          <form method="post" action="?">
            <input type="hidden" name="nickname2" id="nickname2">
            <input type="hidden" name="password2" id="password2">
            <button type="submit" name="btn_submit_login" class="btn-primary btn-block btn-lg" style="border-radius: 9px;text-align: center">Next</button>
          </form>
        </div>




      </div>
      <div class="col-lg-4">
        &nbsp;
      </div>

    </div>

    /////////
    <!-- <div class="container">
      <div class="forms-container">
        <div class="blok_login accent-fuchsiasignin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <label for="nickname">Nickname</label>
              <input type="text" id="nickname" class="form-control input_login">
              <small id="nickname_ket"></small>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>

            <div id="blok_login">
              <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" class="form-control input_login">
                <small id="nickname_ket"></small>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control input_login">
                <small id="password_ket"></small>
              </div>

              ....
              <input type="submit" value="Login" class="btn solid" />
              <p class="social-text">Or Sign in with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
          </form>
        </div>
      </div>
    </div> -->

  </div>
</section>