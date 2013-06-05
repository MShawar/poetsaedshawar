<html>
<head>
<script type="text/javascript">
function load(div, file)
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
		}
	else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}

	xmlhttp.onreadystatechange = function (){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById(div).innerHTML = xmlhttp.responseText;
				}
		};

	xmlhttp.open('GET', file, true);
	xmlhttp.send();	
}
</script>
</head>
<body>

<input type="submit" value="load" onclick="load('k', 'AjaxLoad.php');">
<div id="k"></div>
</body>
</html>