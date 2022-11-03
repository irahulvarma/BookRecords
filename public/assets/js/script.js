/**
 * SCRIPT FOR SEARCH PAGE
 */

//fetch result on key up of authorname field
const authorname = document.getElementById("authorname");
authorname.onkeyup = function(evt) {
    evt = evt || window.event;
    let str = document.getElementById("authorname").value;
    
    clearTbody();

    if (str != "") {
      httpRequest = new XMLHttpRequest();

      if (!httpRequest) {
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
      }
      httpRequest.onreadystatechange = displayContents;
      httpRequest.open('GET', '/BookRecords/getbooksbyauthorname/'+str);
      httpRequest.send();
    }
};

//display fetched data into table format
function displayContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {        
        let json = JSON.parse(httpRequest.responseText);        
        let tbodyRef = document.getElementById('tbody');

        for (let i = 0; i < json.length; i++) {
            let newRow = tbodyRef.insertRow(-1);
            let newCell = newRow.insertCell(0);
            let newText = document.createTextNode(json[i]['name']);
            newCell.appendChild(newText);
            let newCell1 = newRow.insertCell(1);
            let newText1 = document.createTextNode(json[i]['book_name']);
            newCell1.appendChild(newText1);           
        }

        const rows = Array.from(document.querySelectorAll('tr'));
        rows.forEach(slideOut);
        rows.forEach(slideIn);
        
      } else {
        alert('There was a problem with the request.');
      }
    }
}

//clear tbody of author book table
function clearTbody() {
  let node = document.getElementById("tbody");
  while (node.hasChildNodes()) {
      node.removeChild(node.lastChild);
  }
}

function slideOut(row) {
  row.classList.add('slide-out');
}

function slideIn(row, index) {
  setTimeout(function() {
    row.classList.remove('slide-out');
  }, (index + 5) * 200);  
} 
  