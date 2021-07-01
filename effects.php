<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <title>Effects</title>
</head>

<body>
<script type="text/javascript">
$(document).ready(function () {
    $('#submitBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>

  <h1>THIS IS THE EFFECTS PAGE</h1>
  <form id="manipulate" action="manipulate.php" method="post" enctype="multipart/form-data">
    <div class="images">
      <ul>
        <?php 
          $fileList = glob('uploads/*');
          foreach($fileList as $filename){
              if(is_file($filename)){
                  echo '<li>';
                  echo '<input type="checkbox" name="images[]" class="imagesInput" value="',$filename,'" id="',$filename,'"/>';
                  echo '<label for="',$filename,'"><img src="', $filename, '" width="200"/></label>';
                  echo '</li>';
              }   
          }
        ?>
      </ul>
    </div>
    <div class="effects">
      <h1>Choose an effect for your image</h1>
      <div class="radio-effects">
        <div>
          <input type="radio" id="BandW" name="effects" value="BandW" checked>
          <label for="BandW">Black and White</label>
        </div>
        <div>
          <input type="radio" id="negative" name="effects" value="negative">
          <label for="negative">Negative</label>
        </div>
        <div>
          <input type="radio" id="contrast" name="effects" value="contrast">
          <label for="contrast">Contrast</label>
        </div>
        <div>
          <input type="radio" id="watermark" name="effects" value="watermark">
          <label for="watermark">Watermark</label>
        </div>
      </div>
      <input type="submit" class="submit" id="submitBtn">
    </div>
  </form>


</body>

</html>