/* Designer Prev/Next buttons - Saves you a click
 * Aidan Wilson, Intersect Australia
 * aidan.wilson@intersect.org.au
*/

$(document).ready(function(){
    var tr = document.createElement("tr");
    tr.classList.add("instrument-nav");
    var prevTd = document.createElement("td");
    var nextTd = document.createElement("td");
    tr.appendChild(prevTd);
    tr.appendChild(nextTd);
    if (prev){
        var prevBtn = document.createElement("button");
        prevBtn.classList.add("float-left");
        prevBtn.classList.add("prevBtn");
        prevBtn.classList.add("btn");
        prevBtn.classList.add("btn-defaultrc");
        prevBtn.classList.add("btn-xs");
        prevBtn.onclick = function() {window.location.href=app_path_webroot+page+'?pid='+pid+'&page='+prevFormName};
        var btnText = document.createTextNode("« "+prevFormLabel);
        prevBtn.appendChild(btnText);
        prevTd.appendChild(prevBtn);
    };
    if (next){
        var nextBtn = document.createElement("button");
        nextBtn.classList.add("float-right");
        nextBtn.classList.add("nextBtn");
        nextBtn.classList.add("btn");
        nextBtn.classList.add("btn-defaultrc");
        nextBtn.classList.add("btn-xs");
        nextBtn.onclick = function() {window.location.href=app_path_webroot+page+'?pid='+pid+'&page='+nextFormName};
        var btnText = document.createTextNode(nextFormLabel+" »");
        nextBtn.appendChild(btnText);
        nextTd.appendChild(nextBtn);
    };
    targetNode = document.getElementById("form_menu_description_label").parentNode.parentNode;
    parent = targetNode.parentNode;
    parent.insertBefore(tr, targetNode);
});
