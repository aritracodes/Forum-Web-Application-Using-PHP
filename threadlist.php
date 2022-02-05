<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Codeforum - A forum for coders</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <style>#main-footer{padding: 2rem 1.5rem 3rem;}.stickyfoo{min-height: 50vh;}</style>

  </head>

  <body>
    <?php 
    include 'partials/_dbconnect.php'; 
    include 'partials/_header.php'; 
    ?>




    <?php 
    $id = $_GET['catid'];
    $sql = "SELECT * FROM categories WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $catname = $row['category_name'];
      $catdesc = $row['category_description'];
    }

    ?>

    <div class="columns ">
      <div class="column"></div>

      <div class="column is-two-thirds mt-4">
        <div class="box has-background-info-light">
          <h1 class="title is-1">Welcome to <?php echo $catname; ?> forums</h1>
          <p>
            <?php echo $catdesc; ?>
          </p>
          <hr style="background-color: white" />
          <p>
            This is a peer to peer forum for sharing knowledge with each other
          </p>
          <button class="button is-link mt-3">Learn more</button>
        </div>
      </div>

      <div class="column"></div>
    </div>


    <?php 
      $showAlert = false;
      $method = $_SERVER['REQUEST_METHOD'];

      if($method == 'POST'){
        //INSERT INTO DB
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        // Replace the script tags with html code
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sno = $_POST['sno'];

        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, 
        `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( 
        '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        $showAlert = true;
        if($showAlert){
          echo '
          <div class="columns">
          <div class="column"></div>
          
          <div class="notification is-primary">
            <button class="delete"></button>
             Your question has been successfully published. Please wait for the contributors 
             to get your answer.
          </div>
          
          <div class="column"></div>
          </div>
          ';
        }
      }


    ?>



<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{

echo '
<form action="'. $_SERVER['REQUEST_URI'] .'" method="POST">
 <div class="columns stickyfoo mt-4">
    <div class="column"></div>
      <div class="column is-6">

          <h3 class="title is-3">Ask a question:</h3>
            
          <div class="control">
              <label class="label">Question:</label>
              <input class="input" id="title" name="title" type="text" placeholder="keep question short & crisp" required>
          </div>
          

          
          <div class="control mt-5">
              <label class="label">Tell us in brief what\'s the problem:</label>
              <textarea class="textarea" id="desc" name="desc" placeholder="e.g. Tell in brief"></textarea required>
              <input type="hidden" name="sno" id="sno" value="' . $_SESSION["sno"] . '">
          </div>

          <div class="control mt-5">
            <button class="button is-success">Submit question</button>
          </div>
          

          </div>



          <div class="column"></div>
          <div class="column"></div>
  </div>
  </form>';

}
else {






echo '

<div class="columns mt-4">
    <div class="column"></div>
      <div class="column is-4">

  <div class="card">
  <header class="card-header">
    <p class="card-header-title">
      You\'re not logged in !
    </p>
   
  </header>
  <div class="card-content">
    <div class="content">
      Kindly recheck your login status and if you\'re not logged in 
      you can relogin or create an account for free. <p class="is-italic	d"> 
      Please Login to post a Question.</p>
    </div>
  </div>
</div>


</div>
<div class="column"></div>
</div>

';















  
}


?>

  

<hr>



    <div class="columns">
      <div class="column"></div>

      <div class="column is-two-thirds mt-3 stickyfoo">
          <h3 class="title is-3">Browse Questions Asked:</h3>
      
        

      <?php 

      $id = $_GET['catid'];
      $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;

     

      



      while ($row = mysqli_fetch_assoc($result)) {
          $noResult = false;
          $id = $row['thread_id'];
          $title = $row['thread_title'];
          $desc = $row['thread_desc'];

          $thread_time = $row['timestamp'];
          // $time_esp = time_elapsed_string($comment_time);

          $thread_user_id = $row['thread_user_id'];
          $sql2 = "SELECT username from `users` WHERE sno = '$thread_user_id'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $user_name = $row2['username'];
          
          
              
          
          

echo '  
        
       
          <article class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p>
                  
                  <strong><a class="" href="thread.php?threadid='. $id .'">'. $title .'</a></strong><br/>
                  Asked by <strong>'. $user_name .'</strong> <small>@'. $user_name .' at</small>
                  <small>'. $thread_time .'</small>
                  <br>
                    '. $desc .'
                  <br>
                </p>
              </div>
              </div>
          </article>
      
      ';

          
}

      



          if($noResult)
          {
          echo '<p>Be the first person to ask a question.</p>';
          }

      ?>
      

      </div>
      <div class="column"></div>
    </div>


<div class="columns">
  <div class="column">

  </div>
</div>


 <!-- <div class="columns">
      <div class="column"></div> -->








     


      <!-- <div class="column"></div>
    </div> -->



    <?php include 'partials/_footer.php'; ?>

         

  </body>
</html>
