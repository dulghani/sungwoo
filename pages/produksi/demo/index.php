<!DOCTYPE html>
<html>
<head>
<style>
#div1 {
  position: relative;
  height: 200px;
  width: 200px;
  margin: 100px;
  padding: 10px;
  border: 1px solid black;
}

#div2 {
  padding: 5px;
  float: left;
  position: absolute;
  border: 1px solid black;
  background-color: yellow;
  opacity:0.8;
  -ms-transform: rotate(45deg); /* IE 9 */
  -ms-transform-origin: 20% 40%; /* IE 9 */
  transform: rotate(270deg);
  transform-origin:60% 240% ;
}
#div3 {
  padding: 5px;
  float: right;
  position: absolute;
  border: 1px solid black;
  background-color: yellow;
  opacity:0.8;
  -ms-transform: rotate(45deg); /* IE 9 */
  -ms-transform-origin: 20% 40%; /* IE 9 */
  transform: rotate(270deg);
  transform-origin:60% 240% ;
}
</style>
</head>
<body>

<h1>The transform-origin Property</h1>

<div id="div1">
<span style='font-size:20px; margin-left: 38%'><b>R LH</b></span>
  <div id="div2"><span style='font-size:12px'>D30D </span> &nbsp;&nbsp;<b>SC-0563</b></div>
  
</div>

</body>
</html>