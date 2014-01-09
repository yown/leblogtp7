function closeNotification(item)
{
	document.getElementById('notif' + item).style.display = 'none';
}

function showEditComment(id)
{
	var i= 1;
	while(1)
	{
		var edit = document.getElementById('iArticleEdit' + i);
		var art = document.getElementById('iArticle' + i);
		
		if(edit == undefined)
			break;
		
		var innerArt = art.innerHTML;
		//edit.innerHTML = innerArt;
		
		edit.style.display = 'none';
		art.style.display = 'block';
		
		i++;
	}
	
	document.getElementById('iArticleEdit' + id).style.display = 'block';
	document.getElementById('iArticle' + id).style.display = 'none';
}