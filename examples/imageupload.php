<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Capture webcam image</h1>
   
    <form method="POST" action="imageshow.php">
         <table>
                    <tr>
                            <td>
                              <span>
                                User Name:
                              </span>
                            </td> 
                            
                            <td>
                              <input type="text" placeholder="Enter your name" name="name">
                            </td>
                   </tr>
        <tr>
            <td>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="my_camera"></div>
                                <br/>
                            </div>
                        </div>
            </td>
        </tr>              
         <tr>
                    
                                <div>    
                                   <td> <input type=button value="Take Snapshot" onClick="take_snapshot()"></td>
                                   <td> <input type="hidden" name="image" class="image-tag"></td>
                                </div>
        </tr>
        <tr>
            <td>
                    
                                    <button class="btn btn-success" name="register">Submit</button>
                                
                                        </td>
         </tr>
    </table>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>