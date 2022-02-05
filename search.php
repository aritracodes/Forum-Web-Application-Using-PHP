<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Codeforum - A forum for coders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>#main-footer{padding: 2rem 1.5rem 3rem;}.stickyfoo{min-height: 100vh;}</style>
</head>

<body>
    <?php 
    include 'partials/_dbconnect.php';
    include 'partials/_header.php'; 
    ?>


   
            
                    
               
           

                <div class="columns stickyfoo">
                    <div class="column"></div>

                    

                    <div class="column is-6 mt-6 ">

                        <h2 class="title is-2">Search Results for <em>"<?php echo $_GET['search']; ?>"</em> </h2>
                        

                        <?php 
                        $noresults = true;
                        $query = $_GET['search'];
                        $sql = "Select * from threads where match(thread_title, thread_desc) against ('$query')";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['thread_title'];
                            $desc = $row['thread_desc'];
                            $thread_id = $row['thread_id'];
                            $short_title = substr($title, 0, 100);
                            $short_desc = substr($desc, 0, 70);
                            $noresults = false;
                            
                            $url = "thread.php?threadid=" . $thread_id;




                        echo'
                   

                            

                        <article class="message is-link ">
                            <div class="message-body">
                                <h4 class="title is-4">'. $short_title .'...</h4>
                                <p>'. $short_desc .'... <b><a href="'. $url . '">Read More>></a></b> </p>       
                            </div>
                        </article>
                            ';

                        }

                        if($noresults){
                            echo '
                            
                                    <div class="box">
                                        <div class="icon-text">
                                            
                                                
                                            
                                            <h3 class="title is-3"> <span class="icon has-text-warning">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            </span>&nbsp;&nbsp;
                                            
                                            No Results Found   

                                            
                                            
                                            </h3>
                                            
                                            </div>

                                            <p class="block">
                                            <p><em>Suggestions:</em></p>
                                                <ul style="list-style:inside">
                                                    <li>Make sure that all words are spelled correctly.</li>
                                                    <li>Try different keywords.</li>
                                                    <li>Try more general keywords.</li>
                                                </ul>

                                            </p>
                                    </div>

                            ';
                        }
                        



                        ?>

                    </div>
                   
                    
                    

                    <div class="column"></div>
                </div>








                <div class="columns ">
                    <div class="column"></div>
                </div>




    <?php include 'partials/_footer.php'; ?>
</body>

</html>