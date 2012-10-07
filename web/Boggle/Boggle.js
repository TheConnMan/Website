/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function calculatePoints(word) {
    var length=word.length;
    if (length<3) {
	return 0;
    } else if (length==3 || length==4) {
	return 1;
    } else if (length==5) {
	return 2;
    } else if (length==6) {
	return 3;
    } else if (length==7) {
	return 5;
    } else {
	return 11;
    }
}
