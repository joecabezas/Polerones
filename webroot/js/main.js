/* Escribe flash embed para evitar bloqueo de IE*/

/*
 Se aplica:
 <div id="id_contenedor">
 	<img alternativa>
 	<script type="text/javascript">
		// <![CDATA[
		// Se aplica esta linea cuando es video
		urlVideo = "&MM_ComponentVersion=1&skinName=&MM_ComponentVersion=1&skinName=/es/Nombre_del_control&streamName=/swf/nombreflash&autoPlay=true&autoRewind=false";
		//
		var so = new SWFObject("/es/nombrepelicula.swf", "Video", "480px", "368px", "7", "#FFF","transparent", urlVideo);
		so.write("id_contenedor");
		// ]]>
	</script>
</div>
*/
 
if(typeof deconcept=="undefined"){var deconcept=new Object();}
if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}
if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}
deconcept.SWFObject=function(_1,id,w,h,_5,c,_mode,_FlashVars,_7,_8,_9,_a,_b){
if(!document.getElementById){return;}
this.DETECT_KEY=_b?_b:"detectflash";
this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);
this.params=new Object();
this.variables=new Object();
this.attributes=new Array();
if(_1){this.setAttribute("swf",_1);}
if(id){this.setAttribute("id",id);}
if(w){this.setAttribute("width",w);}
if(h){this.setAttribute("height",h);}
if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}
this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();
if(c){this.addParam("bgcolor",c);}
if(_mode) this.addParam("wmode",_mode);
if(_FlashVars) this.addParam("FlashVars",_FlashVars);
var q=_8?_8:"high";
this.addParam("quality",q);
this.setAttribute("useExpressInstall",_7);
this.setAttribute("doExpressInstall",false);
var _d=(_9)?_9:window.location;
this.setAttribute("xiRedirectUrl",_d);
this.setAttribute("redirectUrl","");
if(_a){this.setAttribute("redirectUrl",_a);}};
deconcept.SWFObject.prototype={setAttribute:function(_e,_f){
this.attributes[_e]=_f;
},getAttribute:function(_10){
return this.attributes[_10];
},addParam:function(_11,_12){
this.params[_11]=_12;
},getParams:function(){
return this.params;
},addVariable:function(_13,_14){
this.variables[_13]=_14;
},getVariable:function(_15){
return this.variables[_15];
},getVariables:function(){
return this.variables;
},getVariablePairs:function(){
var _16=new Array();
var key;
var _18=this.getVariables();
for(key in _18){_16.push(key+"="+_18[key]);}
return _16;
},getSWFHTML:function(){
var _19="";
if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){
if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");}
_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\"";
_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";
var _1a=this.getParams();
for(var key in _1a){_19+=key+"=\""+_1a[key]+"\" ";}
var _1c=this.getVariablePairs().join("&");
if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}
_19+="/>";
}else{
	if(this.getAttribute("doExpressInstall")){
this.addVariable("MMplayerType","ActiveX");}
_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\">";
_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";
var _1d=this.getParams();
for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}
var _1f=this.getVariablePairs().join("&");
if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}
_19+="</object>";}
return _19;
},write:function(_20){
if(this.getAttribute("useExpressInstall")){
var _21=new deconcept.PlayerVersion([6,0,65]);
if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){
this.setAttribute("doExpressInstall",true);
this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));
document.title=document.title.slice(0,47)+" - Flash Player Installation";
this.addVariable("MMdoctitle",document.title);}}
if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){
var n=(typeof _20=="string")?document.getElementById(_20):_20;
n.innerHTML=this.getSWFHTML();
return true;
}else{
if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}
return false;}};
deconcept.SWFObjectUtil.getPlayerVersion=function(){
var _23=new deconcept.PlayerVersion([0,0,0]);
if(navigator.plugins&&navigator.mimeTypes.length){
var x=navigator.plugins["Shockwave Flash"];
if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}
}else{
try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}
catch(e){try{
var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
_23=new deconcept.PlayerVersion([6,0,21]);
axo.AllowScriptAccess="always";}
catch(e){
if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}
catch(e){}}
if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}
return _23;};
deconcept.PlayerVersion=function(_27){
this.major=_27[0]!=null?parseInt(_27[0]):0;
this.minor=_27[1]!=null?parseInt(_27[1]):0;
this.rev=_27[2]!=null?parseInt(_27[2]):0;
};
deconcept.PlayerVersion.prototype.versionIsValid=function(fv){
if(this.major<fv.major){return false;}
if(this.major>fv.major){return true;}
if(this.minor<fv.minor){return false;}
if(this.minor>fv.minor){return true;}
if(this.rev<fv.rev){return false;}
return true;
};
deconcept.util={getRequestParameter:function(_29){
var q=document.location.search||document.location.hash;
if(q){
var _2b=q.substring(1).split("&");
for(var i=0;i<_2b.length;i++){
if(_2b[i].substring(0,_2b[i].indexOf("="))==_29){
return _2b[i].substring((_2b[i].indexOf("=")+1));}}}
return "";}};
deconcept.SWFObjectUtil.cleanupSWFs=function(){
var _2d=document.getElementsByTagName("OBJECT");
for(var i=0;i<_2d.length;i++){
_2d[i].style.display="none";
for(var x in _2d[i]){if(typeof _2d[i][x]=="function"){_2d[i][x]=null;}}}};
if(typeof window.onunload=="function"){
var oldunload=window.onunload;
window.onunload=function(){
deconcept.SWFObjectUtil.cleanupSWFs();
oldunload();};
}else{window.onunload=deconcept.SWFObjectUtil.cleanupSWFs;}
if(Array.prototype.push==null){
Array.prototype.push=function(_30){
this[this.length]=_30;
return this.length;};}

var getQueryParamValue=deconcept.util.getRequestParameter;
var FlashObject=deconcept.SWFObject; // for legacy support
var SWFObject=deconcept.SWFObject;



/* Funcion Precarga de imagenes */
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

/* Funciones rollover de imagenes */
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


/* Funcion abre un popup */
function MM_openBrWindow(theURL,winName,features) { //v2.0
  	window.open(theURL,winName,features);
}


/* Funcion para introducir la fecha en una pagina
se llama <script type="text/javascript">fecha();</script>
*/
function fecha(){
	mes = new Array();
	diasem = new Array();
	fechas = new Date();
	diasemana = fechas.getDay();
	diasem[0] = "Domingo";
	diasem[1] = "Lunes";
	diasem[2] = "Martes";
	diasem[3] = "Miercoles";
	diasem[4] = "Jueves";
	diasem[5] = "Viernes";
	diasem[6] = "Sabado";
	dia = fechas.getDate();
	nomes = fechas.getMonth();
	anio = fechas.getYear();
	mes[0] = 'Enero';
	mes[1] = 'Febrero';
	mes[2] = 'Marzo';
	mes[3] = 'Abril';
	mes[4] = 'Mayo';
	mes[5] = 'Junio';
	mes[6] = 'Julio';
	mes[7] = 'Agosto';
	mes[8] = 'Septiembre';
	mes[9] = 'Octubre';
	mes[10] = 'Noviembre';
	mes[11] = 'Diciembre';
	if (anio < 1000) anio = anio + 1900;
	document.write(diasem[diasemana]+" "+ dia +" de "+ mes[nomes] +" de "+ anio);
}



/*Permite que los div se igualen en altura
se aplica <script type='text/javascript'>altura('div1', 'div2','div3');</script>
*/
	function altura(){
		al = new Array();
		max = 0;
		try{
			if(document.getElementById){
				for(i=0;i<arguments.length;i++){
					if(document.getElementById(arguments[i]))
						al[i] = document.getElementById(arguments[i]).offsetHeight;
				}
				max = mayor(al);
				if(max > 0){
					for(i=0;i<arguments.length;i++){
						if(document.getElementById(arguments[i]))
							document.getElementById(arguments[i]).style.height = max + 'px';
					}
				}
			}
		}
		catch (exc) {
			alert("Se ha producido un error en la carga del CSS. La página seguirá operativa pero algo más lenta.");
			throw exc;
		}
	}
	function mayor(datos){
		salida = 0;
		for(i=0;i<datos.length;i++){
			if(parseInt(datos[i]) > salida)
				salida = datos[i];
		}
		return salida;
	}



/*Oculta los select*/
function hideSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "hidden";
	}
}

/*Muestra los select*/
function showSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "visible";
	}
}


/*habilita y deshabilita css
como parametros se pasa title = id del css que se quiere habilitar
y media, medio para el cual se quiere habilitar el css
no es necesario modificar esta funcion, se recorre el total de
<link rel="stylesheet" que tenga la pagina
*/
function setActiveStyleSheet(title, media) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("id") && (a.getAttribute("media") == media)) {
		if(a.getAttribute("id") == title) {
			a.disabled = false;
		}
		else
		{
			a.disabled = true;
		}
    }
  }
}


	
/*Versiones imprimibles, como parametro se pasa el id 
de la version de css que se quiere imprimir y el css de impresion
que debe quedar por defecto luego de la impresión por versión
no es necesario modificar esta funcion, todo es parametrizable

se aplica:
javascript:impresiones('id del estilo a imprimir','id del estilo por defecto del sitio');


*/
function impresiones(style, base_print)
{
	setActiveStyleSheet(style, 'print');
	window.print();
	setActiveStyleSheet(base_print, 'print');
}

function loadMenu() {
	//params:llave del div, cantidad, si se colapsa lentamente, si se inicializa el arreglo
	menuSubmenu = MakeMenu('submenu', 3, 0, 1);
	menuSubmenu.autoClose = true;
	menuSubmenu.useTabs = true;
	menuSubmenu.classTabsActive = "activo"; //La clase del tab activo
	menuSubmenu.classTabsInactive = ""; //La clase del tab inactivo
}






var tamagnoLetras	= new Array(); 
tamagnoLetras['texto'] = 100;
