
/*
* Close notification
*/
function closeNotification(item)
{
	document.getElementById('notif' + item).style.display = 'none';
}

/*
* Close notification
*/
function showEditComment(id)
{
	var i= 1; // number of the article
	while(1)
	{
		var edit = document.getElementById('iArticleEdit' + i);
		var art  = document.getElementById('iArticle' + i);
		
		if(edit == undefined) // if theres not articles anumore
			break;
		
		edit.style.display = 'none';  //hide the comment
		art.style.display  = 'block'; // show the edit comment
		
		i++;
	}
	
	// Do the opposit
	document.getElementById('iArticleEdit' + id).style.display = 'block';
	document.getElementById('iArticle' + id).style.display     = 'none';
}