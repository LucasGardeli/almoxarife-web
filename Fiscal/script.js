/* function setDate(){

var input = document.getElementById("Data").autocomplete;


var now = new Date();

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


document.getElementById("Nome").innerHTML = today;
//$('#Data').val(today);

console.log(today);

}*/

// Get the modal
var modal = document.getElementById("InsertModal");

// Get the button that opens the modal
var btn = document.getElementById("InsertBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
  console.log("QQQQQQQQQQQQQQ")
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}