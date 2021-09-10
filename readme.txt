Calendrier + agenda très simple (gerer les jours fériés et les jours spéciaux)------------------------------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/50541-calendrier-agenda-tres-simple-gerer-les-jours-feries-et-les-jours-speciauxAuteur  : mondherclubisteDate    : 01/08/2013
Licence :
=========

Ce document intitulé « Calendrier + agenda très simple (gerer les jours fériés et les jours spéciaux) » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Salut,
<br />Voici un script tr&egrave;s simple d'une agenda en ligne , au quel
le on peut g&eacute;rer les jours f&eacute;ri&eacute;es et les jours sp&eacute;c
iaux.
<br />L'avantage de ce script est qu'il est tr&egrave;s simple &agrave; l
e param&eacute;trer pour qu'il r&eacute;pond &agrave; vos besoins (pour une agen
da).
<br />Cot&eacute; graphiquement il est tr&egrave;s simple aussi de le modi
fier gr&acirc;ce au fichiers CSS
<br /><a name='source-exemple'></a><h2> Source
 / Exemple : </h2>
<br /><pre class='code' data-mode='basic'>
&lt;!DOCTYPE ht
ml PUBLIC &quot;-//W3C//DTD XHTML 1.0 Strict//EN&quot; &quot;<a href='http://www
.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd' target='_blank'>http://www.w3.org/TR/xh
tml1/DTD/xhtml1-strict.dtd</a>&quot;&gt;
&lt;html xmlns=&quot;<a href='http://w
ww.w3.org/1999/xhtml' target='_blank'>http://www.w3.org/1999/xhtml</a>&quot;&gt;

&lt;head&gt;
&lt;title&gt;Agenda en PHP&lt;/title&gt;
&lt;meta http-equiv=&q
uot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot; /&gt;
&lt;l
ink href=&quot;style.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&qu
ot; /&gt;
&lt;/head&gt;
&lt;?php
$list_fer=array(7);//Liste pour les jours fe
rié; EX: $list_fer=array(7,1)==&gt;tous les dimanches et les Lundi seront des jo
urs fériers

$list_spe=array('1986-10-31','2009-4-12','2009-9-23');//Mettez vo
s dates des evenements ; NB format(annee-m-j)

$lien_redir=&quot;date_info.php
&quot;;//Lien de redirection apres un clic sur une date, NB la date selectionner
 va etre ajouter à ce lien afin de la récuperer ultérieurement 

$clic=1;//1==
&gt;Activer les clic sur tous les dates; 2==&gt;Activer les clic uniquement sur 
les dates speciaux; 3==&gt;Désactiver les clics sur tous les dates

$col1=&quo
t;#d6f21a&quot;;//couleur au passage du souris pour les dates normales

$col2=
&quot;#8af5b5&quot;;//couleur au passage du souris pour les dates speciaux

$c
ol3=&quot;#6a92db&quot;;//couleur au passage du souris pour les dates férié

$
mois_fr = Array(&quot;&quot;, &quot;Janvier&quot;, &quot;Février&quot;, &quot;Ma
rs&quot;, &quot;Avril&quot;, &quot;Mai&quot;, &quot;Juin&quot;, &quot;Juillet&qu
ot;, &quot;Août&quot;,&quot;Septembre&quot;, &quot;Octobre&quot;, &quot;Novembre
&quot;, &quot;Décembre&quot;);

if(isset($_GET['mois']) &amp;&amp; isset($_GET
['annee']))
{
	$mois=$_GET['mois'];
	$annee=$_GET['annee'];
}
else
{
	$mo
is=date(&quot;n&quot;);
	$annee=date(&quot;Y&quot;);
}
$ccl2=array($col1,$col
2,$col3);
$l_day=date(&quot;t&quot;,mktime(0,0,0,$mois,1,$annee));
$x=date(&qu
ot;N&quot;, mktime(0, 0, 0, $mois,1 , $annee));
$y=date(&quot;N&quot;, mktime(0
, 0, 0, $mois,$l_day , $annee));
$titre=$mois_fr[$mois].&quot; : &quot;.$annee;

//echo $l_day;
?&gt;
&lt;body&gt;
&lt;center&gt;
&lt;form name=&quot;dt&qu
ot; method=&quot;get&quot; action=&quot;&quot;&gt;
&lt;select name=&quot;mois&q
uot; id=&quot;mois&quot; onChange=&quot;change()&quot; class=&quot;liste&quot;&g
t;
&lt;?php
	for($i=1;$i&lt;13;$i++)
	{
		echo '&lt;option value=&quot;'.$i.
'&quot;';
		if($i==$mois)
			echo ' selected ';
		echo '&gt;'.$mois_fr[$i].'&
lt;/option&gt;';
	}
?&gt;
&lt;/select&gt;
&lt;select name=&quot;annee&quot; 
id=&quot;annee&quot; onChange=&quot;change()&quot; class=&quot;liste&quot;&gt;

&lt;?php
	for($i=1950;$i&lt;2035;$i++)
	{
		echo '&lt;option value=&quot;'.$i
.'&quot;';
		if($i==$annee)
			echo ' selected ';
		echo '&gt;'.$i.'&lt;/opti
on&gt;';
	}
?&gt;
&lt;/select&gt;
&lt;/form&gt;
&lt;table class=&quot;table
au&quot;&gt;&lt;caption&gt;&lt;?php echo $titre ;?&gt;&lt;/caption&gt;
&lt;tr&g
t;&lt;th&gt;Lun&lt;/th&gt;&lt;th&gt;Mar&lt;/th&gt;&lt;th&gt;Mer&lt;/th&gt;&lt;th
&gt;Jeu&lt;/th&gt;&lt;th&gt;Ven&lt;/th&gt;&lt;th&gt;Sam&lt;/th&gt;&lt;th&gt;Dim&
lt;/th&gt;&lt;/tr&gt;
&lt;tr&gt;
&lt;?php
//echo $y;
$case=0;
if($x&gt;1)

	for($i=1;$i&lt;$x;$i++)
	{
		echo '&lt;td class=&quot;desactive&quot;&gt;&amp
;nbsp;&lt;/td&gt;';
		$case++;
	}
for($i=1;$i&lt;($l_day+1);$i++)
{
	$f=$y=
date(&quot;N&quot;, mktime(0, 0, 0, $mois,$i , $annee));
	$da=$annee.&quot;-&qu
ot;.$mois.&quot;-&quot;.$i;
	$lien=$lien_redir;
	$lien.=&quot;?dt=&quot;.$da;

	echo &quot;&lt;td&quot;;
	if(in_array($da, $list_spe))
	{
		echo &quot; cla
ss='special' onmouseover='over(this,1,2)'&quot;;
		if($clic==1||$clic==2)
			e
cho &quot; onclick='go_lien(\&quot;$lien\&quot;)' &quot;;
	}
	else if(in_array
($f, $list_fer))
	{
		echo &quot; class='ferier' onmouseover='over(this,2,2)'&
quot;;
		if($clic==1)
			echo &quot; onclick='go_lien(\&quot;$lien\&quot;)' &q
uot;;
	}
	else 
	{
		echo&quot; onmouseover='over(this,0,2)' &quot;;
		if($
clic==1)
			echo &quot; onclick='go_lien(\&quot;$lien\&quot;)' &quot;;
	}
	ec
ho&quot; onmouseout='over(this,0,1)'&gt;$i&lt;/td&gt;&quot;;
	$case++;
	if($ca
se%7==0)
		echo &quot;&lt;/tr&gt;&lt;tr&gt;&quot;;
	
}
if($y!=7)
	for($i=$y
;$i&lt;7;$i++)
	{
		echo '&lt;td class=&quot;desactive&quot;&gt;&amp;nbsp;&lt;
/td&gt;';
	}
?&gt;&lt;/tr&gt;
&lt;/table&gt;
&lt;/center&gt;
&lt;/body&gt;&
lt;/html&gt;

&lt;script type=&quot;text/javascript&quot;&gt;
function change
()
{
	document.dt.submit();
}
	function over(this_,a,t)
{
	&lt;?php 
	ech
o &quot;var c2=['$ccl2[0]','$ccl2[1]','$ccl2[2]'];&quot;;
	?&gt;
	var col;
	i
f(t==2)
		this_.style.backgroundColor=c2[a];
	else
		this_.style.backgroundCo
lor=&quot;&quot;;
}
function go_lien(a)
{
	top.document.location=a;
}
&lt;
/script&gt;
</pre>
<br /><a name='conclusion'></a><h2> Conclusion : </h2>
<b
r />Finalement j'esp&egrave;re que certains trouvent leurs bonheur dans ce scrip
t :)
<br />Le zip contient 2 versions : 
<br />une version simple (juste le ca
lendrier)
<br />une version plus approfondi (calendrier + module pour g&eacute;
rer les date et les consulter), cette version n&eacute;cessite une connexion &ag
rave; une base de donn&eacute;e
