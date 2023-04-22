<div class="container">
</div>
<div class="contents">
    <div class="summernote">
        <form method="POST" action="">
            <input type="text" name="title" value="" placeholder="Enter Your Title">
            <textarea id="summernote" name="contents"></textarea>
            <label> Please Select Your Tags </label>
            <label>Please Select Your Tags</label>
            <select name="tags">
                <?php
                // define the available tags
                $tags = array('life', 'coding', 'music', 'videos', 'politics');

                // generate the options
                foreach ($tags as $tag) {
                    echo '<option value="' . $tag . '">' . ucfirst($tag) . '</option>';
                }
                ?>
            </select>

            <input type="name" name="username" value="<?php echo $username ?>">
            <input type="name" name="p_p" value="<?php echo $p_p ?>">
            <button type="submit" name="submit">Save</button>
        </form>

    </div>
</div>
</div>

<?php

// Get the content from the Summernote editor
if (isset($_POST['submit'])) {


    $contents = $_POST['contents'];
    $usernamee = $_POST['username'];
    $p_p = $_POST['p_p'];
    $title = $_POST['title'];
    $tags = $_POST['tags'];


    $conn = mysqli_connect('localhost', 'root', '', 'chat_app_db');

    // Insert the content into the database
    $sql = "INSERT INTO community (username, p_p,contents,title,tags) VALUES ('$usernamee','$p_p','$contents','$title','$tags')";
    $result = mysqli_query($conn, $sql);



    

    // Close the database connection
    mysqli_close($conn);
}
?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false
        });
    });
</script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>