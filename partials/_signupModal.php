<div class="modal" id="mainmodal2">
  <div class="modal-background" id="modalbg2"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Signup to your account</p>
      <button class="delete closebtn" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
          


    <form action="/forum/partials/_handleSignup.php" method="POST">
        <div class="field">
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="email" id="signupEmail" name="signupEmail" placeholder="Email">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-check"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" id="signupUsername" name="signupUsername" maxlength="11" placeholder="Username">
            <span class="icon is-small is-left">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" id="signupPassword" name="signupPassword" placeholder="Password">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" id="signupcPassword" name="signupcPassword" placeholder="Confirm Password">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button type="submit" class="button is-success">
              SignUp
            </button>
          </p>
        </div>
    </form>



    </section>
    <footer class="modal-card-foot">
      <button class="button closebtn22 is-right">Cancel</button>
    </footer>
  </div>
</div>

<script>
 const signupButton = document.querySelector("#signupbtn");
  const ModalBg = document.querySelector("#modalbg2");
  const modal = document.querySelector("#mainmodal2");

  const close1 = document.querySelector(".closebtn");
  const close2 = document.querySelector(".closebtn22");


  


  signupButton.addEventListener("click", () => {
    modal.classList.add("is-active");
  });

  ModalBg.addEventListener("click", () => {
    modal.classList.remove("is-active");
  });

  close1.addEventListener("click", () => {
    modal.classList.remove("is-active");
  });

  close2.addEventListener("click", () => {
    modal.classList.remove("is-active");
  });

  
  


  // closesModal.addEventListener("click", () => {
  // });
</script>
