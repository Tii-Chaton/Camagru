var verifpass = function(){
   var normalpass = document.getElementById('normalpass').value;
   var repeatpass = document.getElementById('repeatpass').value;
   if (normalpass === repeatpass && /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]){3,}$/)
		document.getElementById('SignupButton').disabled = false;
   else{
		document.getElementById('SignupButton').disabled = true;
		/*alert("Veuillez verrifier vos mots de passe");*/
	}
}
