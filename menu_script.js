var add_loc = "destinations.php";
var map = "map.php";
var list = "list.php";
if(window.location.href.search(add_loc))
{
  document.getElementById('add_destination').style.left = 0;
}
else if(window.location.href.search(map))
{
  document.getElementById('map1').style.left = 0;
}
else if (window.location.href.search(list))
{
  document.getElementById('list').style.left = 0;
}