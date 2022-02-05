<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Codeforum - A forum for coders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>#main-footer{padding: 2rem 1.5rem 3rem;}.stickyfoo{min-height: 100%;}</style>
</head>

<body>
    <?php 
    include 'partials/_dbconnect.php';
    include 'partials/_header.php'; 
    ?>


    <div class="columns is-multiline mr-3 ml-3 mb-3 mt-3">
        <?php 

      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      $catid = $row['category_id'];
      $cat_name = $row['category_name'];
      $cat_desc = $row['category_description'];
      
  echo '
      <div class="column is-3">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img
                src="https://source.unsplash.com/500x400/?'. $cat_name .' , coding"
                alt="Placeholder image"
              />
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4"><a class="has-text-black" href="threadlist.php?catid='. $catid .'">'. $cat_name .'</a></p>
              </div>
            </div>

            <div class="content">
              '. substr($cat_desc, 0, 90) .'...
            </div>

            <a class="has-text-white" href="threadlist.php?catid='. $catid .'">
            <button class="button is-success">View Threads</button>
            </a>
          </div>
        </div>
      </div>
    ';
      }
?>
    </div>










    <?php include 'partials/_footer.php'; ?>
</body>

</html>