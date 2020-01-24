<!DOCTYPE html>

<html>
  <head>
  <style>


#grid {
  -- columnNumber;

  display: grid;
      grid-template-columns:repeat(var(--columnNumber),30px);
      grid-template-rows:repeat(var(--columnNumber),30px);

font-size: 30px;
font-weight: bold;


  grid-row-gap:0px;
  grid-column-gap:0px;
  padding-top: 20px;




}

#settings{
  background-color:red;



}
.square{
  padding:0px;
  border: 2px solid;
  box-sizing: border-box;
  width: 30px;
    padding-bottom: 30px;


}
.row{


}
</style>
<script>
var turn="x"; // the letter for the  turn
var squares; // the board squares
var size=null; // the baord size ie 3x3 4x4 5x5

var computer; // boolean for whether or not you playing computer
var computerStarts; // boolean for whether the computer starts
var computerLetter; // trhe computers letter
var turnNumber=1; // the turn number counter
var winningSquares; // number of squares ian row required to win
var previousSquareX=0; // location of last placed square
var previousSquareY=0;
function makeGrid(){
turn="x";
turnNumber=1;
previousSquareX=0;
previousSquareY=0;

  var computerBox=document.getElementById("playComputer");
  if (computerBox.checked){ // polaing computer is true
    computer=true;

  }
  else{
  computer=false;

  }
  var computerStart =document.getElementById("computerStarts");
  if (computerStart.checked){ // computer starts is true
    computerStarts=true;
    computerLetter="x";

  }
  else{
  computerStarts=false;
  computerLetter="o";
  }
winningSquares=parseInt(document.getElementById("winBox").value);
  size=parseInt(document.getElementById("sizeBox").value);

  if (size==null || size<3 || isNaN(size) || size%1!==0){
    size=3;

  }
   if (winningSquares==null || winningSquares<3 || isNaN(winningSquares) || winningSquares%1!==0){
    winningSquares=size;

  }
if (winningSquares>size){
  winningSquares=size;

}


  console.log(size);


  squares=[];
  for(var count=0 ; count<size; count++){ // make the game board
   squares[count]=[];
  }
var element = document.getElementById("grid");
element.innerHTML="";

document.documentElement.style.setProperty("--columnNumber", size);

for (var countx=0; countx<size; countx++){


for (var county=0; county<size; county++){ // the board buttons
squares[countx][county]=null;
 var button=document.createElement("button");
     var text = document.createTextNode(" ");
    button.appendChild(text);
  button.id=""+countx+" "+county;
  button.classList.add("square");
  button.onclick=function (){
  var   id=this.id;
    var numbers=id.split(" ");
    var x=parseInt(numbers[0]);
    var y=parseInt(numbers[1]);
    if(squares[x][y]===null){


  placeSquare(x,y, id);



    }

  }






  element.appendChild(button);

}
}
  if (computerStarts===true){

    computerTurn();

  }
}



function checkWin(x, y){ // check to see a if a placed letter yeilds a win

  var inarow=squares[x][y];
  var connectedSquares=0;

  var win=0;

   for (var county=0; county<size; county++){ // check for vertical wins

if (inarow===squares[x][county]){
  connectedSquares++;

  if (connectedSquares===winningSquares){

  win=1;

  break;

}
}
     else{
       connectedSquares=0;

     }

   }

  if (win===1){
    alert(turn+" wins!");
    makeGrid();
return true;
  }
  connectedSquares=0;
   for (var countx=0; countx<size; countx++){ // check for horozontal wins
if (inarow===squares[countx][y]){
  connectedSquares++;

  if (connectedSquares===winningSquares ){
  win=1;
  break;
  }
}

   else{
       connectedSquares=0;

     }



   }
  if (win===1){
        alert(turn+" wins!");
    makeGrid();
    return true;

  }


    connectedSquares=0;

 var xx=0;
 var yy=0;

    for (var count=0; count<size; count++){
      xx=count;
      yy=count+(y-x);

      if (yy>size || xx>size){
        continue;

      }




if (inarow===squares[xx][yy]){ // check for major diagnol wins
 connectedSquares++;
 if (connectedSquares===winningSquares ){

 win=1;
 break;
 }

}

  else{
      connectedSquares=0;

    }


  }








     for (var county=0; county<size; county++){

yy=y+x-county;

xx=county;

if (yy>size || xx>size || xx<0){
  continue;

}




if (inarow===squares[xx][yy]){ // check for minor diagnol wins
  connectedSquares++;

  if (connectedSquares===winningSquares ){
  win=1;

  break;
  }

}

   else{
       connectedSquares=0;

     }



   }



  if (win===1){
    alert(turn+" wins!");
    makeGrid();

    return true;

  }


  var draw=1; // check for draw

  for (var countx=0; countx<size; countx++){


for (var county=0; county<size; county++){
if (squares[countx][county]===null){

  draw=0;

}
}
  }
  if (draw===1){
    alert("Draw!");
    makeGrid();

    return true;

  }


  return false;
}










function computerTurn(){
  var startSquare=0;
  var endSquare=0;
  var placed=false;

  if (turnNumber==1){
    placeSquare(0,0, "0 0");
    placed=true;
    return;
  }

  var inarow=squares[previousSquareX][previousSquareY];
  var connectedSquares=0;



   for (var county=0; county<size; county++){
if (inarow===squares[previousSquareX][county]){
  connectedSquares++

  if (connectedSquares===winningSquares-1 ){

  for (var count=startSquare; count<endSquare; count++){
    endSquare=county;

    if (startSquare-1<0){
      start=0;

    }
    else{
      startSquare=startSquare-1;

    }
    if (endSquare+1>size-1){
      endSquare=size-1;

    }
    else{

      endSquare=endSquare+1;
    }



    for (var count=startSquare; count<endSquare; count++){
  if (squares[previousSquareX][count]===null){
    var text=""+previousSquareX+" "+count;

    placeSquare(previousSquareX, count,text);
    placed=true;
  return;
  }
}

  }
}
     else{
       connectedSquares=0;
       startSquare=county+1;


     }

   }

}
  connectedSquares=0;
startSquare=0;
endSquare=0;



   for (var countx=0; countx<size; countx++){
     if (inarow===squares[countx][previousSquareY]){
  connectedSquares++


  if (connectedSquares===winningSquares-1 ){
    endSquare=countx;

    if (startSquare-1<0){
      start=0;

    }
    else{
      startSquare=startSquare-1;

    }
    if (endSquare+1>size-1){
      endSquare=size-1;

    }
    else{

      endSquare=endSquare+1;
    }



    for (var count=startSquare; count<endSquare; count++){
if (squares[count][previousSquareY]===null){
    var text=""+count+" "+previousSquareY;

    placeSquare(count, previousSquareY,text);
    placed=true;
return;
}

}

  }
}

   else{
       connectedSquares=0;
       startSquare=countx+1;


     }



   }

var x=previousSquareX;
var y=previousSquareY;

  if(x>=y){
    var yy=y;
    connectedSquares=0;
           yy=0;

     for (var countx=x-y; countx<size; countx++){

if (inarow===squares[countx][yy]){
  connectedSquares++
  endSquare=countx;
  if (connectedSquares===winningSquares-1  ){
    endSquare=county;

    if (startSquare-1<0){
      start=0;

    }
    else{
      startSquare=startSquare-1;

    }
    if (endSquare+1>size-1){
      endSquare=size-1;

    }
    else{

      endSquare=endSquare+1;
    }



    for (var count=startSquare; count<endSquare; count++){
  if (squares[count][yy]===null){
    var text=""+count+" "+yy;

    placeSquare(count, yy,text);
    placed=true;
  return;
  }

  }

  }

}




   else{
       connectedSquares=0;
       startSquare=countx+1;

     }


      yy++;

   }
  }
  startSquare=0;
  endSquare=0;

  if(x<y){
    var xx=x;
    connectedSquares=0;
           xx=0;

     for (var county=y-x; county<size; county++){
       console.log(connectedSquares);

if (inarow===squares[xx][county]){
  connectedSquares++
  if (connectedSquares===winningSquares-1  ){
    endSquare=county;

    if (startSquare-1<0){
      start=0;

    }
    else{
      startSquare=startSquare-1;

    }
    if (endSquare+1>size-1){
      endSquare=size-1;

    }
    else{

      endSquare=endSquare+1;
    }



    for (var count=startSquare; count<endSquare; count++){
if (squares[xx][count]===null){
    var text=""+xx+" "+count;

    placeSquare(xx, count,text);
    placed=true;
return;
}

}

}
}


   else{
       connectedSquares=0;
       startSquare=county+1;


     }


      xx++;

   }
  }







for (var countx=previousSquareX-1; countx<previousSquareX+1; countx++){


for (var county=previousSquareY-1; county<previousSquareY+1; county++){

  if (county===previousSquareY && countx===previousSquareX){
    continue;

  }
var x=countx;
  var y=countx;
  if (x<0){
    x=0;
  }
  if (y<0){
    y=0;
  }
  if (y>size-1){
    y=size-1;
  }
  if (x>size-1){
    x=size-1;
  }
  if(squares[x][y]===null){
    var text=""+x+" "+y;

    placeSquare(x, y , text);
    return;

  }



  }


}


for (var countx=0; countx<size; countx++){


for (var county=previousSquareY-1; county<previousSquareY+1; county++){
  var y=county;
  var x=countx;
    if (y<0){
    y=0;
  }
  if (y>size-1){
    y=size-1;
  }
    if (squares[x][y]===null){
        var text=""+x+" "+y;

    placeSquare(x, y , text);
    return;
    }
}
}
 for (var countx=previousSquareX-1; countx<previousSquareX+1; countx++){


for (var county=0; county<size; county++){
  if (county===previousSquareY && countx===previousSquareX){
    continue;

  }
var x=countx;
  var y=countx;
  if (x<0){
    x=0;
  }

  if (x>size-1){
    x=size-1;
  }
  if(squares[x][y]===null){
    var text=""+x+" "+y;

    placeSquare(x, y , text);
    return;

  }






}
}
 for (var countx=0; countx<size; countx++){


for (var county=0; county<size; county++){
  if (squares[countx][county]===null){
    var text=""+countx+" "+county;

    placeSquare(countx, county , text);
    return;


  }
}
 }




  }











  function placeSquare(x, y, id) {
    turnNumber++;
    if (turn==="x"){

  squares[x][y]="x";
      previousSquareX=x;
      previousSquareY=y;


document.getElementById(id).textContent='X';
    var end=checkWin(x,y);
    if(end==true){

      return;

    }

    changeTurn();

  if(computer==true && computerLetter==="o"){
    computerTurn();
  }


  }
  else{
    squares[x][y]="o";
     previousSquareX=x;
      previousSquareY=y;

document.getElementById(id).textContent='O';
            var end=checkWin(x,y);
            if(end==true){
              return;
            }

    changeTurn();

 if(computer==true && computerLetter==="x"){
    computerTurn();
  }
  }

  }


  function changeTurn(){
    if (turn==="x"){
      turn="o";

    }
    else{
      turn="x";

    }
  }


</script>

  </head>
  <body>
    <div id="settings">
    <input type='text' id="sizeBox"> </input> Number Of Squares On Board?
    <input type='text' id="winBox"> </input> Number Of Squares To  Win?

 <input type="checkbox" id="playComputer"> Play Computer?
     <input type="checkbox" id="computerStarts"> Computer Starts?


       <button onClick="makeGrid()"> start Game  </button>
    </div>




<div id='grid'>

</div>

  </body>
</html>
