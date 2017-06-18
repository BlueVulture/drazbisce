// var count = 2;
//
// function picture_slot()
// {
//   if(count <= 5)
//   {
//     document.getElementById("pictures-containter").insertAdjacentHTML('beforeend', '<input type="file" name="file"><br><br>');
//     count++;
//   }
//   else
//   {
//     var elem = document.getElementById("add-pic-slot");
//     elem.parentNode.removeChild(elem);
//   }
//     //insertAdjacentHTML('beforeend', <input type="file" name="file"><br><br>);
// }

function min_price()
{
  var min_price = document.getElementById("min_price");
  var price = document.getElementById("price");

  if(min_price.value<price.value)
  {
    min_price.min = price.value;
  }

}
