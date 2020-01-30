<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'the-wall') or die ('Error connecting');
$query = "SELECT image_id, location, title, description FROM images ORDER BY image_id DESC";
$stmt = $mysqli->prepare($query) or die ('Error preparing');
$stmt->bind_result($image_id, $location, $title, $description) or die ('binding result');
$stmt->execute() or die ('Error excecuting');


?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js">
    
    </script>
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Mono' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
<style>
    body {
        font-family: 'IBM Plex Mono';
    }
</style>
    </head>
    <body>
        <div id="particles-js"></div>
        <div id="top_bar"><div id="title">The-Wall</div></div>

        <div id="content_bar">
            <div id="function_bar">
                <select id="select_sorting" name="list_order">
                        <option value="new">new</option>
                        <option value="popular">popular</option>
                </select>
        <div id="up">
                <form method="post" action="process_upload.php" enctype="multipart/form-data">
                    <label><input id="file_select" type="file" name="uploaded_image"/></label><br>
                    <label>Title:<br><input class="text_input" name="title"/></label><br>
                    <label>Description:<br><input class="text_input" name="description"/></label>
                    <br>
                    <input type="submit" name="submit_image" value="Send"/>
                </form>
        </div>

        <button id="upload_button" value="upload">upload</button>
               </div>
    <?php   
            while ($succes = $stmt->fetch()) {                  
    ?>
            <div class='post_frame'>
                <img class='pic_frame' style="width:200px" src="<?php echo $location ?>" onclick="location.href='post.php?img=<?php echo $location; ?>'">
                <div class='title_frame'><?php echo $title?>
                <div class='script_frame'><?php echo $description?></div></div>
            </div>
    <?php   
        }
    ?>
        </div>
        <script src="responsive.js"></script>
        <script>
            particlesJS.load('particles-js', 'particles.json', function(){
            console.log('particles.json loaded...');
            });
    </script>
    </body>
</html>