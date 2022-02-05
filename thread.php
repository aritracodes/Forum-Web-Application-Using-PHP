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
    <style>
      #main-footer {
        padding: 2rem 1.5rem 3rem;
      }
      .stickyfoo {
        min-height: 100vh;
      }
    </style>
  </head>

  <body>
    <?php include 'partials/_dbconnect.php';
          include 'partials/_header.php'; 
          
    ?>

    <?php
    $id= $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];

        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT username FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['username'];

    }
    
    ?>

    <div class="columns">
      <div class="column"></div>

      <div class="column is-two-thirds mt-4">
        <div class="box has-background-info-light">
          <h3 class="title is-3"><?php echo "Q. ".$title; ?></h3>
          <p>
            <?php echo $desc; ?>
          </p>
          <hr style="background-color: white" />
          <p>
            This is a peer to peer forum for sharing knowledge with each other.
          </p>
          <p class="mt-3"><b>Posted by: <?php echo $posted_by; ?></b></p>
        </div>
      </div>

      <div class="column"></div>
    </div>







   <?php 
      $showAlert = false;
      $method = $_SERVER['REQUEST_METHOD'];

      if($method == 'POST'){
        
        $comment = $_POST['comment'];  
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $sno = $_POST['sno'];
        //INSERT INTO DB
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, 
        `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        $showAlert = true;
        if($showAlert){
          echo '
          <div class="columns">
          <div class="column"></div>
          
          <div class="notification is-primary">
            <button class="delete"></button>
             Your answer has been published successfully for the question <b>'. $title .'</b>
          </div>
          
          <div class="column"></div>
          </div>
          ';
        }
      }


    ?>



<div class="columns">
      <div class="column"></div>




<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{


  echo '
    


         <div class="column is-8">
        <form action="'. $_SERVER['REQUEST_URI'] .'" method="POST">
         <div class="control mt-5">
              <label class="label">Write a Comment:</label>
              <textarea class="textarea" id="comment" name="comment" placeholder="e.g. Tell in brief" required></textarea>
              <input type="hidden" name="sno" id="sno" value="' . $_SESSION["sno"] . '">
          </div>

          <div class="control mt-5">
            <button type="submit" class="button is-success">Post Comment</button>
          </div>
        </form>
      </div>';

}else {
  echo '
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
      Please Login to Comment.</p>
    </div>
  </div>
</div>


</div>
  ';
}
    
?>      
      <div class="column"></div>
    </div>











    <div class="columns mt-5 stickyfoo">
      <div class="column"></div>
      <div class="column is-6 ">
        <h3 class= "title is-3">Comments:</h3>


      <?php 

      $id = $_GET['threadid'];
      $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;

      
      

      while ($row = mysqli_fetch_assoc($result)) {
          $noResult = false;
          $id = $row['comment_id'];
          $content = $row['comment_content'];
          $comment_time = $row['comment_time'];
          $thread_user_id = $row['comment_by'];
         

          // $thread_user_id = $row['thread_user_id'];
          $sql2 = "SELECT username from `users` WHERE sno = '$thread_user_id'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          
          


  echo' 

        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64">
                <img
                  src="https://bulma.io/images/placeholders/128x128.png"
                  alt="Image"
                />
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>'. ucwords($row2['username']) .'</strong> <small>@'. $row2['username'] .'</small>
                  <small>'. $comment_time .'</small>
                  <br />
                  '. $content .'
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                      <i class="fas fa-reply" aria-hidden="true"></i>
                    </span>
                  </a>
                  <a class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                      <i class="fas fa-retweet" aria-hidden="true"></i>
                    </span>
                  </a>
                  <a class="level-item" aria-label="like">
                    <span class="icon is-small">
                      <i class="fas fa-heart" aria-hidden="true"></i>
                    </span>
                  </a>
                </div>
              </nav>
            </div>
          </article>
        </div>
      
      ';

      }


       if($noResult)
          {
          echo '<p>Be the first person to comment.</p>';
          }
      
      ?>
      
      </div>
      <div class="column"></div>
      <div class="column"></div>
    </div>


    

    <?php include 'partials/_footer.php'; ?>
  </body>
</html>
