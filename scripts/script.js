for (var i = 0; i < 20; i++) {

}

for(i=0;i<30;i++) {

    var contentdiv = ['div0','div1','div2','div3','div4','div5'];
    var contentdiv1 = ['div0','div1','div2','div3','div4','div5'];
    contentdiv1.push("div" + [i]);

    var descdiv = ['desc0','desc1','desc2','desc3','desc4','desc5'];
    var descdiv1 = ['desc0','desc1','desc2','desc3','desc4','desc5'];

    var descText = ['descText0','descText1','descText2','descText3','descText4','descText5'];
    var descText1 = ['descText0','descText1','descText2','descText3','descText4','descText5'];


    var content = document.getElementById('content');
    contentdiv[i] = document.createElement('div');
    var cclss = document.createAttribute('class');
    var cid = document.createAttribute('id');
    cid.value = contentdiv1[i];
    cclss.value = "contentDiv";
    contentdiv[i].setAttributeNode(cid);
    contentdiv[i].setAttributeNode(cclss);
    content.appendChild(contentdiv[i]);

    var img = document.createElement('img');
    var src = document.createAttribute('src');
    var wdth = document.createAttribute('width');
    src.value = 'img/deadpool1.png';
    wdth.value = "50%";
    img.setAttributeNode(src);
    img.setAttributeNode(wdth);
    contentdiv[i].appendChild(img);

    descdiv[i] = document.createElement('div');
    var dclss = document.createAttribute('class');
    var did = document.createAttribute('id');
    did.value = descdiv1[i];
    dclss.value = "descdiv";
    descdiv[i].setAttributeNode(dclss);
    descdiv[i].setAttributeNode(did);
    contentdiv[i].appendChild(descdiv[i]);

    descText[i] = document.createElement('p');
    var descTextClss = document.createAttribute('class');
    descTextClss.value = "descText";
    descText[i].setAttributeNode(descTextClss);
    descdiv[i].appendChild(descText[i]);
    descText[i].innerHTML = "This is an image";

}
