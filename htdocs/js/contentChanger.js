function changeContent(pageChange,title){

	$("#main_content").load( "pages/"+pageChange+ ".php",function(response,status,xhr){
		if (status == "error") {
		// alert(msg + xhr.status + " " + xhr.statusText);
		console.log( xhr.status + " " + xhr.statusText);
		// alert(msg + xhr.status + " " + xhr.statusText);
		console.log(response);
	}
	});
	$("#header_title").text(title);
}
