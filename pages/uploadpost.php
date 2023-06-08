<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Button trigger modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" />
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPostModal" id="createbtn">
    Create Post
</button>





<!-- Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="http://localhost/main/php/uploadpost.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="display: flex;align-items: center;">
                        <div class="">
                            <?php $phoo = $_SESSION['p_p'] ?>
                            <img src="client/assets/uploads/<?= $phoo ?>" class="w-30 rounded-circle" style="width:36px; height: 36px;"> <br>
                        </div>
                        <div class="p-1">
                            <b class="caret">
                                <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
                                <?php echo htmlspecialchars($_SESSION["lastname"]); ?></a>
                            </b>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <textarea type="text" cols="10" rows="5" name="something" id="emoji" class="form-control" placeholder="Whats on Your Mind  <?php echo htmlspecialchars($_SESSION["name"]); ?> ?" required> </textarea>

                    </div>
                    <input type="hidden" name="name" value=<?php echo htmlspecialchars($_SESSION["name"]); ?> placeholder="Display Name">
                    <div class="preview_img">
                        <div class="main_img">
                            <picture style="    width: -webkit-fill-available;
    height: -webkit-fill-available;">
                                <img src="" id="preview" class="preview" alt="Select Image/Video">
                                <video src="" id="previewd" class="preview" alt="Select Image/Video" width="200px" height="200px" style="    position: relative;
    bottom: 10pc;">
                            </picture>
                        </div>
                    </div>
                    <div>
                        <label class="imgUploadCss" id="fileLabel" for="fileUpload"><i class="fa-solid fa-cloud-arrow-up"></i> Select File</label>
                        <input class="fileHidden" id="fileUpload" name="file" type="file" style="display:none">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .preview_img {
        width: 300px;
        height: 190px;
        background: #f5fffe;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        padding: 20px;
    }

    .preview_img .main_img {
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .preview_img img {
        width: 100%;
        height: 100%;
        display: block;
    }

    .imgUploadCss {
        display: block;
        width: 173px;
        background: #e6edec;
        /* font-size: 12px; */
        font-weight: 400;
        color: #0c0b0b;
        font-family: 'Inter', sans-serif;
        padding: 4px -1px;
        margin-top: 9px;
        border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        -ms-border-radius: 6px;
        -o-border-radius: 6px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        left: 0pc;

    }

    img[alt="Selected Image"] {
        color: #c74444;
    }

    .imgHidden {
        display: none;
    }

    #createbtn{
        width: -webkit-fill-available;
    background-color: #ffffff;
    color: black;
    border: 1px solid white;
    font-weight: 700;
    }
</style>

<!-- Include the CSS file for the emoji picker -->

<!-- Include the JavaScript files for jQuery and the emoji picker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-picker@2.2.4/dist/emoji-picker.js"></script>

<!-- Initialize the emoji picker on the input field -->
<script>
  
  $(document).ready(function() {
    $('#emoji').emojioneArea({
      pickerPosition: 'bottom'
    });
  });
 
</script>


<script>




    let file = null;
    let fileUrl = null;
    let fileInput = document.getElementById('fileUpload');
    let fileLabel = document.getElementById('fileLabel');
    let preview = document.getElementById('preview');

    function readUrl(input) {
        let reader = new FileReader();
        reader.onload = function(e) {
            fileUrl = e.target.result;
            preview.src = fileUrl;
            if (input.type.includes('image')) {
                $('#preview').attr('src', e.target.result);
            } else {
                $('#previewd').attr('src', e.target.result);
            }
        };
        reader.readAsDataURL(input);
    }

    fileInput.addEventListener('change', function(e) {
        if (e.currentTarget.files[0].type.includes('image') || e.currentTarget.files[0].type.includes('video')) {
            readUrl(e.currentTarget.files[0]);
            file = e.currentTarget.files[0].name;
            fileLabel.innerText = file;
        } else {
            fileLabel.innerText = 'Please provide image or video file';
            fileLabel.style.color = '#E91F63';
        }
    });
</script>



