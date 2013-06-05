<html>
<head>
<script type="text/javascript">
function insert()
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
				document.getElementById('conf').innerHTML = xmlhttp.responseText;
				}
		};

	arg = 'text='+document.getElementById('textValue').value;
	xmlhttp.open('POST', 'AjaxLoad.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(arg);	
	
}
</script>
</head>
<body>

<input type="text" id="textValue" >
<input type="submit" value="insert" onclick="insert();">
<div id="conf"></div>
</body>
</html>