//reRem
var ww=window.innerWidth;
var html=document.getElementsByTagName("html")[0];
html.setAttribute('style',"font-size:"+(ww/750)*100+"px");
window.onresize=function(){
    var ww=window.innerWidth;
    var html=document.getElementsByTagName("html")[0];
    html.setAttribute('style',"font-size:"+(ww/750)*100+"px");
};