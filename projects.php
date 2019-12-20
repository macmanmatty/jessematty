<!DOCTYPE html>
<html>
<head>
<style>


#head{
  position: relative;
  font-size: 40px;
  font-weight: bold;
  padding-left: 33%;
font-family: arial;


}
body{
  width:100%;
}

#menu1{
  position: absolute;

}
#main1 img {
  height: 400px;
  width: 600px;


}


.project{

}
#projectTable{


}
.image{
width: 200px;
height: 200px;



}
#main1{
  position: absolute;
  font-size: 16px;
  font-weight: normal;
  top:200px;
font-family: "comic sans MS";


}
.pName{

font-size:24px;
font-weight: bold;

}
@media only screen and (max-height: 968px), only screen and (max-width:968px)  {



  #head{
    position: relative;
    font-size: 26px;
    font-weight: bold;
    padding-left: 33%;
  font-family: arial;


  }
  body{
    width:100%;
  }

  #menu1{
    position: absolute;

  }
  #main1 img {
    height: 300px;
    width: 500px;


  }


  .project{

  }
  #projectTable{


  }
  .image{
  width: 100px;
  height: 100px;



  }
  #main1{
    position: absolute;
    font-size: 14px;
    font-weight: normal;
    top:200px;
  font-family: "comic sans MS";


  }
  .pName{

  font-size:22px;
  font-weight: bold;

  }




}
@media only screen and (max-height: 768px), only screen and (max-width:768px)  {



  #head{
    position: relative;
    font-size: 30px;
    font-weight: bold;
    padding-left: 33%;
  font-family: arial;


  }
  body{
    width:100%;
  }

  #menu1{
    position: absolute;

  }
  #main1 img {
    height: 200px;
    width: 300px;


  }


  .project{

  }
  #projectTable{


  }
  .image{
  width: 100px;
  height: 100px;



  }
  #main1{
    position: absolute;
    font-size: 14px;
    font-weight: normal;
    top:180px;
  font-family: "comic sans MS";


  }
  .pName{

  font-size:20px;
  font-weight: bold;

  }




}
@media only screen and (max-width:568px)  {



  #head{
    position: relative;
    font-size: 20px;
    font-weight: bold;
    padding-left: 33%;
  font-family: arial;


  }
  body{
    width:100%;
  }

  #menu1{
    position: absolute;

  }
  #main1 img {
    height: 100px;
    width: 150px;


  }


  .project{

  }
  #projectTable{


  }
  .image{
  width: 100px;
  height: 100px;



  }
  #main1{
    position: absolute;
    font-size: 10px;
    font-weight: normal;
    top:180px;
  font-family: "comic sans MS";


  }
  .pName{

  font-size:16px;
  font-weight: bold;

  }




}


  </style>

  <script>

  </script>

</head>
  <body>


    <div id='head'>
Projects

</div>
<div id ="menu1">
  <?php
  include ("menu.php");
  ?>

    </div>


<div id="main1">

  <table id="projecttable">
<tr>
  <td class="project">
    <p class="pName"> Guitar Chords </p>
    <p> A java desktop app for finding guitar chords on any given fretted  instrument and any given tuning.  </p>
    <a href="https://github.com/macmanmatty/guitar-chords"> <img class="image" src="./photos/guitarchords.png"> </a>


  </td>
  <td class="project">
      <p class="pName"> Image Split </p>
      <p> A java desktop app that takes an image an splits it into smaller images based a specified number of  X and Y pixels </p>
    <a href="https://github.com/macmanmatty/png-split"> <img  class="image" src="./photos/imageSplit.png"> </a>
</td>
  </tr>

<tr>

  <td class="project">
    <p class="pName"> Tic Tac Toe </p>
    <p>  A JavaScript TicTacToe game I wrote </p>
  <a href="tictactoe.php"> <img class="image" src="./photos/tictactoe.png"> </a>
</td>
  <td class="project">
    <p class="pName"> Bar Hopn Charters </p>
    <p>  A site I built for  a charter fishing captian  </p>
  <a href="http://www.barhopncharters.com/"> <img class="image" src="./photos/barhopin.png"> </a>

</td>
</tr>
</table>


</div>

</body>
</html>
