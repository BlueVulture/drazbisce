var count = 2;

function picture_slot()
{
  if(count <= 5){
    document.getElementById("pictures-containter").insertAdjacentHTML('beforeend', '<input type="file" name="file'+count+'"><br><br>');
    count++;
  }
  else{
    var elem = document.getElementById("add-pic-slot");
    elem.parentNode.removeChild(elem);
  }
    //insertAdjacentHTML('beforeend', <input type="file" name="file"><br><br>);
}
