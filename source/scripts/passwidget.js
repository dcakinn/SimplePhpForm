
function PasswordWidget(divid,passname)
{
	this.maindivobj = document.getElementById(divid);
	this.passobjname = passname;

	this.MakePassWidget=_MakePassWidget;

	this.showing_pass=1;
	this.txtShow = 'Show';
	this.txtMask = 'Mask';
	this.txtGenerate = 'Generate';
	this.txtWeak='weak';
	this.txtMedium='medium';
	this.txtGood='good';

	this.enableShowMask=true;
	this.enableGenerate=true;
	this.enableShowStrength=true;
	this.enableShowStrengthStr=true;

}

function _MakePassWidget()
{
	var code="";
    var passname = this.passobjname;

	this.passfieldid = passname+"_id";

	code += "<input type='password' class='passfield' name='"+passname+"' id='"+this.passfieldid+"'>";

	this.passtxtfield=passname+"_text";

	this.passtxtfieldid = this.passtxtfield+"_id";

	code += "<input type='text' class='passfield' name='"+this.passtxtfield+"' id='"+this.passtxtfieldid+"' style='display: none;'>";

	this.passshowdiv = passname+"_showdiv";

	this.passshow_anch = passname + "_show_anch";

	code += "<div class='passopsdiv' id='"+this.passshowdiv+"'><a href='#' id='"+this.passshow_anch+"'>"+this.txtShow+"</a></div>";

	this.passgendiv = passname+"_gendiv";

	this.passgenerate_anch = passname + "_gen_anch";

	code += "<div class='passopsdiv'id='"+this.passgendiv+"'><a href='#' id='"+this.passgenerate_anch+"'>"+this.txtGenerate+"</a></div>";

	this.passstrengthdiv = passname + "_strength_div";

	code += "<div class='passstrength' id='"+this.passstrengthdiv+"'>";

	this.passstrengthbar = passname + "_strength_bar";

	code += "<div class='passstrengthbar' id='"+this.passstrengthbar+"'></div>";

	this.passstrengthstr = passname + "_strength_str";

	code += "<div class='passstrengthstr' id='"+this.passstrengthstr+"'></div>";

	code += "</div>";

	this.maindivobj.innerHTML = code;

	this.passfieldobj = document.getElementById(this.passfieldid);
	
	this.passfieldobj.passwidget=this;

	this.passstrengthbar_obj = document.getElementById(this.passstrengthbar);
	
	this.passstrengthstr_obj = document.getElementById(this.passstrengthstr);

	this._showPasswordStrength = passwordStrength;

	this.passfieldobj.onkeyup=function(){ this.passwidget._onKeyUpPassFields(); }

	this._showGeneatedPass = showGeneatedPass;

	this.generate_anch_obj = document.getElementById(this.passgenerate_anch);
	
	this.generate_anch_obj.passwidget=this;

	this.generate_anch_obj.onclick = function(){ this.passwidget._showGeneatedPass(); }

	this._showpasschars = showpasschars;

	this.show_anch_obj = document.getElementById(this.passshow_anch);

	this.show_anch_obj.passwidget = this;

	this.show_anch_obj.onclick = function(){ this.passwidget._showpasschars();}

	this.passtxtfield_obj = document.getElementById(this.passtxtfieldid);

	this.passtxtfield_obj.passwidget=this;

	this.passtxtfield_obj.onkeyup=function(){ this.passwidget._onKeyUpPassFields(); }
	

	this._updatePassFieldValues = updatePassFieldValues;

	this._onKeyUpPassFields=onKeyUpPassFields;

	if(!this.enableShowMask)
	{ document.getElementById(this.passshowdiv).style.display='none';}

	if(!this.enableGenerate)
	{ document.getElementById(this.passgendiv).style.display='none';}

	if(!this.enableShowStrength)
	{ document.getElementById(this.passstrengthdiv).style.display='none';}

	if(!this.enableShowStrengthStr)
	{ document.getElementById(this.passstrengthstr).style.display='none';}
}

function onKeyUpPassFields()
{
	this._updatePassFieldValues(); 
	this._showPasswordStrength();
}

function updatePassFieldValues()
{
	if(1 == this.showing_pass)
	{
		this.passtxtfield_obj.value = this.passfieldobj.value;	
	}
	else
	{
		this.passfieldobj.value = this.passtxtfield_obj.value;
	}
}

function showpasschars()
{
	var innerText='';
	var pwdfield = this.pwdfieldobj;
	var pwdtxt = this.pwdtxtfield_obj;
	var field;
	if(1 == this.showing_pwd)
	{
		this.showing_pass=0;
		innerText = this.txtMask;

		passtxt.value = passfield.value;
		passfield.style.display='none';
		passtxt.style.display='';
		passtxt.focus();
	}
	else
	{
		this.showing_pwd=1;
		innerText = this.txtShow;	
		passfield.value = pwdtxt.value;
		passtxt.style.display='none';
		passfield.style.display='';
		passfield.focus();
			
	}
	this.show_anch_obj.innerHTML = innerText;

}

function passwordStrength()
{
	var colors = new Array();
	colors[0] = "#cccccc";
	colors[1] = "#ff0000";
	colors[2] = "#ff5f5f";
	colors[3] = "#56e500";
	colors[4] = "#4dcd00";
	colors[5] = "#399800";

	var passfield = this.passfieldobj;
	var password = passfield.value

	var score   = 0;

	if (password.length > 6) {score++;}

	if ( ( password.match(/[a-z]/) ) && 
	     ( password.match(/[A-Z]/) ) ) {score++;}

	if (password.match(/\d+/)){ score++;}

	if ( password.match(/[^a-z\d]+/) )	{score++};

	if (password.length > 12){ score++;}
	
	var color=colors[score];
	var strengthdiv = this.passstrengthbar_obj;
	
	strengthdiv.style.background=colors[score];
	
	if (password.length <= 0)
	{ 
		strengthdiv.style.width=0; 
	}
	else
	{
		strengthdiv.style.width=(score+1)*10+'px';
	}

	var desc='';
	if(password.length < 1){desc='';}
	else if(score<3){ desc = this.txtWeak; }
	else if(score<4){ desc = this.txtMedium; }
	else if(score>=4){ desc= this.txtGood; }

	var strengthstrdiv = this.passstrengthstr_obj;
	strengthstrdiv.innerHTML = desc;
}

function getRand(max) 
{
	return (Math.floor(Math.random() * max));
}

function shuffleString(mystr)
{
	var arrPass=mystr.split('');

	for(i=0;i< mystr.length;i++)
	{
		var r1= i;
		var r2=getRand(mystr.length);

		var tmp = arrPass[r1];
		arrPass[r1] = arrPwd[r2];
		arrPass[r2] = tmp;
	}

	return arrPass.join("");
}

function showGeneatedPass()
{
	var pass = generatePWD();
	this.passfieldobj.value= pwd;
	this.passtxtfield_obj.value =pwd;

	this._showPasswordStrength();
}

function generatePass()
{
    var maxAlpha = 26;
	var strSymbols="~!@#$%^&*(){}?><`=-|][";
	var password='';
	for(i=0;i<3;i++)
	{
		password += String.fromCharCode("a".charCodeAt(0) + getRand(maxAlpha));
	}
	for(i=0;i<3;i++)
	{
		password += String.fromCharCode("A".charCodeAt(0) + getRand(maxAlpha));
	}
	for(i=0;i<3;i++)
	{
		password += String.fromCharCode("0".charCodeAt(0) + getRand(10));
	}
	for(i=0;i<4;i++)
	{
		password += strSymbols.charAt(getRand(strSymbols.length));
	}

	password = shuffleString(password);
	password = shuffleString(password);
	password = shuffleString(password);

	return password;
}
