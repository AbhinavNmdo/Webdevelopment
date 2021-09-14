<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.flip-box {
  background-color: transparent;
  width: 10%;
  height: 35px;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 35px;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateX(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 95%;
  height: 35px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-box-front {
  background-color: #e31837;
  color: black;
  border-bottom: 3px rgba(0,0,0,0.1) solid;
}

.flip-box-back {
  background-color: #59B210;
  color: white;
  border-bottom: 3px rgba(0,0,0,0.1) solid;
  transform: rotateX(180deg);
}

#ac{
	background: #e31837;
	padding: 8px 15px 9px;
	color: #fff;
	font-size: 14px;
	border: 1px solid #e31837;
}

#sc{
	background: #59B210;
	padding: 8px 15px 9px;
	color: #fff;
	font-size: 14px;
	border: 1px solid #59B210;
}
</style>
</head>
<body>

<h1>Card Flip with Text</h1>
<h3>Hover over the image below:</h3>

<div class="flip-box"><div class="flip-box-inner"><div class="flip-box-front"><button id="ac">ADD TO CART</button></div><div class="flip-box-back"><button id="sc">ADDED!</button></div></div></div>

</body>
</html>