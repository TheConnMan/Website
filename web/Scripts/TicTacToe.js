/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function game() {
      //  Array to hold the bgImgs
      this.bgImgs = new Array();
        this.bgImgs[0] = 'tttcircle.png';
        this.bgImgs[1] = 'tttcross.png';

     
      //  Player information   
      this.currentPlayer = 0;
      this.players = new Array();
        this.players[0] = "Player One";
        this.players[1] = "Player Two";

     
       return true;
}

this.changeBackground = function (boxId) {
        var box = document.getElementById('box-' + boxId);
        box.style.background = 'transparent url(' + 
          this.bgImgs[this.currentPlayer] + ') top left no-repeat';

     
        box.removeAttribute('onClick');
     
        this.changePlayer();
      }
      
this.changePlayer = function () {
        //  Switch the active player

        if (this.currentPlayer == 0) {
          this.currentPlayer = 1;
        } else {

          this.currentPlayer = 0;
        }
     
        //  Get a reference to our 'message' element and create the message
        var box = document.getElementById('message');
        var msg = "It is " + this.players[this.currentPlayer] + "'s turn.";
        var txt = document.createTextNode(msg);

     
        //  Erase any existing text
        while (box.hasChildNodes()) {
          box.removeChild(box.lastChild);
        }

     
        //  Add the text node (our message) to our element
        box.appendChild(txt);
      }