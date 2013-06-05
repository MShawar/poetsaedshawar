function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }

function addComment(poemid)
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
				document.getElementById('ajaxresponse').innerHTML = xmlhttp.responseText;
				}
		};

	arg = 'name='+document.getElementById('name').value+'&body='+document.getElementById('body').value+'&poemid='+poemid;
	xmlhttp.open('POST', 'addcommentajax.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(arg);	
	
}

function allowComment(commentid)
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
				document.getElementById('ajaxresponse'+commentid+'').innerHTML = xmlhttp.responseText;
				}
		};

	arg = 'commentid='+commentid;
	xmlhttp.open('POST', 'allowcommentajax.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(arg);	
	
}