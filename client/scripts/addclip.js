var add = function(name){

	document.getElementById('coner').disabled = false;
	document.getElementById('clipart').src="/client/images/"+name+".png";
	document.getElementById('clipprep').value= name;
	document.getElementById('startbutton').disabled = false;
	console.log('toto');
	if (name == "arch")
	{
		document.getElementById('coner').value = "br";
	}
	else if (name == "birthday"){
		document.getElementById('coner').value = "top";
		document.getElementById('coner').disabled = true;
	}
	else
	{
		document.getElementById('coner').value = "tl";
	}
};

const controlClic = (e) => {
  var img = null;
  if (e.target.tagName === "P") {
    img = e.target.children[1];
  } else if (e.target.tagName === "INPUT") {
      img = e.target.parentNode.children[1];
  }
  if (img === null) { return ; }
  img.style.display = (img.style.display === "block") ? "none" : "block";
  if (e.target.tagName === "P") {
    e.target.children[0].checked = img.style.display === "block";
  }
};
document.querySelector("#control").addEventListener("click", controlClic, false);