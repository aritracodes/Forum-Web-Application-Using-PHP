<?php 

session_start();

echo '<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/forum">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="/forum">
        Home
      </a>

      <a class="navbar-item" href="about.php">
        About
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Categories
        </a>

        <div class="navbar-dropdown">';

        

        $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        
          
          echo '
          <a class="navbar-item" href= "threadlist.php?catid=' . $row['category_id'] .'">
              '. $row['category_name'] .'
          </a>';     
          
        }

          

    echo '</div>
        </div>

        <a class="navbar-item" href="contact.php">
          Contact
        </a>

      
    </div>
    
    <div class="navbar-end level">
        <div class="navbar-item level">
            
    ';



    
    

    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

 echo'   
            





   <div class="level-item has-text-centered">
            <form action="search.php" method="GET">
              <div class="field has-addons mr-3">
            <div class="control">
              <input class="input" name="search" id="search" type="text" placeholder="Find a repository" required>
            </div>
            <div class="control">
              <button class="button is-info">
                Search
              </button>
            </div>
          </div>
          </form>
            </div>



            


<div class="level-item has-text-centered ">
  <p class="control mr-3 ml-3">
    <a class="button is-static">
      <strong> Welcome '. $_SESSION['username'] . ' </strong>
    </a>
</div>
  


           
<div class="level-item has-text-centered">

          

            <div class="buttons control">
              
              <a class="button is-danger is-outlined is-primary" href="partials/_logout.php">
                Logout
              </a>
            
              
            </div>
            </div>
            
          
          


             
';


    }
        
    else{   echo '


        
            
            <div class="level-item has-text-centered">
            <form action="search.php" method="GET">
              <div class="field has-addons mr-3">
            <div class="control">
              <input class="input" name="search" id="search" type="text" placeholder="Find a repository">
            </div>
            <div class="control">
              <button class="button is-info">
                Search
              </button>
            </div>
          </div>
          </form>
            </div>
            




        

            
          <div class="buttons">

          <a class="button is-primary" id="signupbtn">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" id="signinbtn">
            Log in
          </a>
        </div>
      
';


    }



    echo '
  
          </div>
        </div>
      </div>
    </nav>';


include 'partials/_signupModal.php';
include 'partials/_loginModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true")
{
    
      echo '<div class="columns mt-3">
              <div class="column"></div>
              <div class="column is-two-thirds">
            <div class="notification is-success">
              <button class="delete"></button>
              Thank you for Signing Up. Your account has been successfully created.
            </div>
            </div>
            <div class="column"></div>
            </div>';
}

?>