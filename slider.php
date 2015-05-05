
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

  <title>AssembleMe - Interactive Assembler</title>

  <link rel='stylesheet' href='jquery-ui.css'>
  <link rel='stylesheet' href='style.css'>
  <style>* {
    box-sizing: border-box;
  }

</style>

<script src="io.js"></script>
<script src='jquery.io.js'></script>
<script src="upload.js"></script>
</head>

<body>

  <div id="slideHolder" class='all-slides'>
    <h2 class='slides-title'>i386</h2>
    <div class='slide'>push ebp</div>
    <div class='slide'>mov ebp,esp</div>
    <div class='slide'>mov eax,DWORD PTR [ebp+0x8]</div>
    <div class='slide'>push esi</div>
    <div class='slide'>mov esi,DWORD PTR [ebp+0xc]</div>
    <div class='slide'>pop ebx</div>
    <div class='slide'>pop esi</div>
    <div class='slide'>pop ebp</div>
    <div class='slide'>ret</div>
    <input type="submit" value="Submit ASM"/>
  </div>
  <div class='cloned-slides' id='cloned-slides'></div>

  

  <script src="timer.io.js"></script>

  <script src="slider.js"></script>
  
  <div class='main-content'>
    <div class='upload-class'>
      <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    //http://stackoverflow.com/questions/16399911/uploading-xml-file-and-parsing-it-without-temporary-files

      { 
        ?>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>"
          enctype="multipart/form-data">
          <input type="file" name="doc"/>
          <input type="submit" value="Send File"/>
        </form>

      <?php 
      } 
      else 
      {
        if (isset($_FILES['doc']) &&
          ($_FILES['doc']['error'] == UPLOAD_ERR_OK)) 
        {
          $oldPath = $_FILES['doc']['tmp_name'];
          $newPath = basename($_FILES['doc']['name']);
          if (move_uploaded_file($oldPath, $newPath)) 
          {
            print "
            <div id='xmlfile'>$newPath</div>
            <script> 
              
              $(document).ready(function()
              { 
                $.ajax(
                {
                  type: 'GET',
                  url: $('#xmlfile').text(),
                  dataType: 'xml',
                  success : function(service_data) { 
                      console.log('OK');
                      console.log(service_data);
                      parse2(service_data);
                  },
                  error : function(msg) {
                      console.log('ERROR');
                      console.log(JSON.stringify(msg));
                  }
                });
                $('button').click(function(e)
                {  
                  console.log($('#xmlfile').text());  
                  
                });
              });
            </script>  
            
            <button id='myButtonId'>Click Me</button>  
            ";
          } 
          else 
          {
            print "Couldn't move $oldPath to $newPath";
          }
        } 
        else 
        {
          print "No valid file uploaded.";
        }
      }
    ?>
  </div>
</div>

</body>

</html>