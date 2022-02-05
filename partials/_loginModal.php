<div class="modal" id="mainmodal">
  <div class="modal-background" id="modalbg"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Login to your Account</p>
      <button class="delete closebtn2two" aria-label="close"></button>
    </header>

    <form action="/forum/partials/_handleLogin.php" method= "POST">
      <section class="modal-card-body">
        <div class="field has-addons">
          
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" id="loginUsername" name="loginUsername" placeholder="Username" maxlength="11" />
            
            <span class="icon is-small is-left">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </p>
        </div>


   


        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" id="loginPass" name="loginPass" placeholder="Password" />
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button class="button is-success">Login</button>
          </p>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button closebtn33">Close</button>
      </footer>
    </form>
  </div>
</div>

<script >

  const signinButton = document.querySelector("#signinbtn");
  const ModalBg2 = document.querySelector("#modalbg");
  const modal2 = document.querySelector("#mainmodal");

  const closetwo = document.querySelector(".closebtn2two");
  const close33 = document.querySelector(".closebtn33");

  signinButton.addEventListener("click", () => {
    modal2.classList.add("is-active");
  });

  ModalBg2.addEventListener("click", () => {
    modal2.classList.remove("is-active");
  });

  closetwo.addEventListener("click", () => {
    modal2.classList.remove("is-active");
  });

  close33.addEventListener("click", () => {
    modal2.classList.remove("is-active");
  });


  
  
  // closesModal.addEventListener("click", () => {
  // });
</script>
