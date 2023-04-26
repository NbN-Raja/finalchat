<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>

  <body id="root">
  
  <div class="text-center">
    <div class="preview_img">
      <div class="main_img">
        <picture>
               <img src="" id="preview" class="preview" alt="Not Image Selected">
        </picture>
      </div>
    </div>
      <form action="#" method="post">
           <div>
            <label class="imgUploadCss" id="imgLabel" for="imgUpload"><i class="fa-solid fa-cloud-arrow-up pr-5"></i> Choose Image</label>
             <input class="imgHidden" id="imgUpload" type="file">
           </div>
      </form>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
   
  </body>

  <style>
    

.preview_img{
    width: 300px;
    height: 190px;
    background: #303d3c;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    padding: 20px;
}
.preview_img .main_img{
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-shadow: inset 0 0 10px 0 #222222;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.preview_img img{
    width: 100%;
    height: 100%;
    display: block;
}
.imgHidden{
    display: none;
}
.imgUploadCss{
    display: block;
    width: 300px;
    background: #303d3c;
    font-size: 16px;
    font-weight: 400;
    color: #ffffff;
    font-family: 'Inter', sans-serif;
    padding: 20px 20px;
    margin-top: 16px;
    border-radius: 6px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    -ms-border-radius: 6px;
    -o-border-radius: 6px;
    position: relative;
    overflow: hidden;
    cursor: pointer;

}
img[alt="Not Image Selected"]{
   color: #c74444;
}


  </style>


<script>
  // Image Upload Click Event 

  let img = null;
    let imgUrl =null;
    let imgInput = document.getElementById('imgUpload')
    let nameShow = document.getElementById('imgLabel')
    let preview = document.getElementById('preview')


    function ReadUrl(input){
        let reader =  new FileReader();
         reader.onload = function(e) {
            imgUrl = e.target.result
            $('#preview').attr('src',e.target.result)
        }
        reader.readAsDataURL(input)

    }

    imgInput.addEventListener('change', function (e){
        if(e.currentTarget.files[0].type == 'image/png' ||e.currentTarget.files[0].type == 'image/jpeg'||e.currentTarget.files[0].type == 'image/jpg'){
            ReadUrl(e.currentTarget.files[0])
            img = e.currentTarget.files[0].name
            nameShow.innerText = img
        }else{
            nameShow.innerText = 'please, provide image file'
            nameShow.style.color = '#E91F63'
        }

    })
</script>




