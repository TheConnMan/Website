<html>
<head>
<script language="JavaScript">
// Change these values to fit your needs
var alignRight    = true;
var alignBottom    = false;
var offsetX     = 25;
var offsetY     = 20;

function adjustDivs(){
  var df=document.getElementById('divFloat');
  df.style.left = alignRight ? document.body.clientWidth-(parseInt(df.offsetWidth)+offsetX) : offsetX;
  df.style.top = alignBottom ? document.body.clientHeight-(parseInt(df.offsetHeight)+offsetY) : offsetY;
}
</script>
</head>
<body scroll=no leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 onload="adjustDivs()" onresize="adjustDivs()">
  <div id="divContent" style="position:absolute; width:100%; height:1100px; overflow:auto;">
    Absolute content
  </div>
  <div id="divFloat" style="position: absolute; left:0px; top:0px; background-color: #cccccc; width:200px; height:200px;">
    Floating content
  </div>
</body>
</html>