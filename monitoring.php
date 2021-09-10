<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.2, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  <title>MONITORING</title>

  
<?php include("header.php"); ?>
  <link href="agenda/agenda/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
<section class="menu cid-sAWkXENcqb" once="menu" id="menu1-c">
 <?php include("menu.php"); ?>    
</section>

<section class="engine"><a href="https://mobiri.se/p">web templates free download</a></section><section class="header9 cid-sI6Q4SsA1w mbr-parallax-background" id="header9-c">
    <div style="padding-left:30px; padding-right:30px">
	        <div class="media-container-column mbr-white" style="background-color:rgba(249,245,242,0.9);padding:15px; color:black; margin-top:100px">
		
            <h4 class="mbr-section-title align-left mbr-bold pb-3 mbr-fonts-style display-1" style="font-size:25px">MONITORING - JOURNAL <br>(<a href="javascript:location.reload()" class="stl1">ACTUALISER</a>) - (<a href="javascript:initialiser()" class="stl1">INITIALISER</a>)</h4>

            <div class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-2" style="font-size:14px"> </div>
			
	<div id="date_log">----</div>
	<hr>

			<h4>Filtrage</h4>
    <form style="margin-bottom: 8px;">
    <select name="donnee" id="donnee" onclick="save();use(); document.getElementById('ipfil').focus()" size="4">
        <option value="no_filter" id="no_filter" style="display:none" >Selectionnez un filtre</option>
        <option value="ip" id="ip">Ip</option>
        <option value="utilisateur" id="utilisateur">Utilisateur</option>
		
		<option value="methode" id="methode">Methode</option>
        <option value="adresse" id="adresse">Adresse</option>
		<option value="protocole" id="protocole">Protocole</option>
        <option value="observation" id="observation">Observation</option>      
    </select><br>
    <div id="type"></div>
</form>
    <div id="logtxt" style="font-size:14px"></div>
</body>
<script>
const dates=document.getElementById('daty');
const portion= document.getElementById("logtxt");
const types = document.getElementById("type");
const selecting= document.getElementById("donnee");
//const option = selecting.options[selecting.selectedIndex].value;
const inputs=document.getElementById("ipfil");
let load=setInterval(content,500);
//enregistrement valeur select
const save = () => {
    sessionStorage.setItem('selecteditem',selecting.value);
}

if(sessionStorage.getItem('selecteditem')){
let locals=sessionStorage.getItem('selecteditem');
selecting.value = locals;
}

//filtre php
const filtrerip = (str,str2) =>{
    if(str==""){
        //location.reload();
    }else{
    clearInterval(load);
    var filterip = new XMLHttpRequest();
    filterip.onreadystatechange=function(){
    if(filterip.readyState==4 && filterip.status==200){
        portion.innerHTML=filterip.responseText;
    }}
    filterip.open('GET','filtre.php?q='+str+'&q1='+str2,true);
    filterip.send();
    }
}
//affichage dynamique du base de donnee
function content(){
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
        portion.innerHTML=ajaxlog.responseText;
    }
}
    ajaxlog.open('POST','update.php',true);
    ajaxlog.send(null);
}
//document.addEventListener('DOMContentLoaded',use())
//changement dynamique input filtre
// AFFICHER LES DATE_LOG EXISTANTE
date_lg();
function date_lg()
{
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
		//document.getElementById('date_log').innerHTML=ajaxlog.responseText;
		agenda();
    }
}
    document.getElementById('date_log').innerHTML="Miandrasa kely azafady ...";
	ajaxlog.open('POST','date_lg.php',true);
    ajaxlog.send(null);

}

function initialiser()
{
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
		//document.getElementById('date_log').innerHTML=ajaxlog.responseText;
		agenda()
		alert("Initialisation de la base de données faite ...");
		location.reload();
    }
}
    ajaxlog.open('POST','initialiser.php',true);
    ajaxlog.send(null);
}

function agenda()
{
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
		document.getElementById('date_log').innerHTML=ajaxlog.responseText;
    }
}
    ajaxlog.open('POST','agenda/agenda/agenda.php',true);
    ajaxlog.send(null);

}
const sdate=`<span>Filtrez ici:</span><br>
<input type="date" name="ipfil" onchange="filtrerip(this.value,document.getElementById(\'donnee\').value)" id="ipfil">`;
const sinp=`<span>Filtrez ici:</span><br>
    <input type="text" name="ipfil" onkeyup="filtrerip(this.value,document.getElementById('donnee').value)" id="ipfil">`;
const nones='<br>';
const meth=`<span>Filtrez ici:</span><br>
<select name="ipfil" id="ipfil" onchange="filtrerip(this.value,document.getElementById(\'donnee\').value)">
    <option value="GET">GET</option>
    <option value="POST">POST</option>
    </select>`;
const use = () =>{

if(selecting.value=="date"){
types.innerHTML=sdate;
}else if(selecting.value=="methode"){
types.innerHTML=meth;
}else if(selecting.value=="no_filter"){
types.innerHTML=nones;
}else{
types.innerHTML=sinp;
}
}
</script>
            
        </div>
    </div>

    <div class="mbr-arrow hidden-sm-down" aria-hidden="true" style="display:none">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>
 <?php include("footer.php"); ?>  
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script>
function change()
{
	//document.dt.submit();
	
	mois=document.getElementById('mois').value
	annee=document.getElementById('annee').value
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
		document.getElementById('date_log').innerHTML=ajaxlog.responseText;
    }
}
    ajaxlog.open('POST','agenda/agenda/agenda.php?mois=' + mois + '&annee=' + annee,true);
    ajaxlog.send(null);	
	
}
/*
	function over(this_,a,t)
{
	<?php 
	echo "var c2=['$ccl2[0]','$ccl2[1]','$ccl2[2]'];";
	?>
	var col;
	if(t==2)
		this_.style.backgroundColor=c2[a];
	else
		this_.style.backgroundColor="";
}
*/
function go_lien(a,this_)
{
//EVALUER MONITORING SELON AGENDA ...
clearInterval(load);
log_date=a;
annee=log_date.substr(0,4);
mois=log_date.substr(5,2);
jour=log_date.substr(8,2);
date_ppd=annee + "-" + mois + "-" + jour;

a_1="log" + annee + mois + jour + ".txt";
date_encours=a_1;
var ajaxlog= new XMLHttpRequest();
ajaxlog.onreadystatechange=function(){
    if(ajaxlog.readyState==4 && ajaxlog.status==200){
        portion.innerHTML=ajaxlog.responseText;
		alert(date_ppd)
    }
}
    ajaxlog.open('POST','update_1.php?a_1='+a_1+'&date_ppd='+date_ppd,true);
    ajaxlog.send(null);
	
}


</script>
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>