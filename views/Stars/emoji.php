<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Game With emoji</title>
	<style type="text/css">
		.face{
			position: relative;
			width: 300px;
			height: 300px;
		border-radius: 50%;
		background-color: #282360;
		display: flex;
		justify-content: center;
		align-items: center;
		}
		.face::before{
						content: '';
			position: absolute;
			top: 210px;
			width: 150px;
			height: 20px;
			background:#fff;
			border-bottom-left-radius:0px;
			border-bottom-right-radius: 0px;
			transition: 0.5s;
		}
		.face:hover::before{
			content: '';
			position: absolute;
			top: 180px;
			width: 150px;
			height: 70px;
			background:#fff;
			border-bottom-left-radius: 70px;
			border-bottom-right-radius: 70px;
			transition: 0.5s;
		}
		.eyes{

			position: relative;
			top: -40px;
			display: flex;
		}
		.eyes .eye{
			position: relative;
			width: 80px;
			height: 80px;
			display: block;
			background-color: #fff;
			margin-left: 0 15px ;
			border-radius: 50%;
		}
		.eyes .eye::before{
			content: '';
			position: absolute;
			top: 50%;
			left: 25px;
			transform: translate(-50%,-50%);
			width: 40px;
			height: 40px;
			background:#333;
			border-radius: 50%;
		}
	</style>
</head>
<body>
<div class="face">
<div class="eyes">
	<div class="eye"></div>&nbsp;&nbsp;&nbsp;
	<div class="eye"></div>
	
	
</div>	




<script type="text/javascript">
	
	function eyeball() {//Total Starting
		var eye = document.querySelectorAll('.eye');
		eye.forEach(//loop starting

			function(eye)
			{//fun starting
			let x = (eye.getBoundingClientRect().left)+(eye.clientWidth/2);
			let y = (eye.getBoundingClientRect().top)+(eye.clientHeight/2);
			let radian = Math.atan2(event.pageX-x,event.pageY-y);
			let rot = (radian * (180/Math.PI)*-1)+270;
			eye.style.transform ="rotate("+rot+"deg)";

		}//fun ending

		)//loop ending
	}//Total ending
	document.querySelector('body').addEventListener('mousemove',eyeball);
</script>
</div>
</body>
</html>