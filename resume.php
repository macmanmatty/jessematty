<!DOCTYPE html>
<html>
<head>
  <style>
#head{
position: absolute;
}
#main1{
position: relative;
height:150px;
top:500px;


}
#download:hover{
    visibility: hidden;


}
#download{
    z-index: 1;
  padding-left:40px;
  padding-top: 40px;

    position: absolute;


}
#download2{
    z-index: 0;
  padding-left:40px;
  padding-top: 40px;

    position: absolute;


}
body{
  width:100%;

}

  </style>

  <script>

  </script>

</head>
  <body>
    <div id='head'>
  <?php

  include ("menu.php");


  ?>

</div>

<div id="main1">


  <a href="./resume.pdf"> <img id="download"  src="downloadresume.png"> <img   id ="download2" src="downloadresume2.png"></a>

</div>

</body>
</html>
