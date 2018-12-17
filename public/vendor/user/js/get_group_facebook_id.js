/**
 * Created by long on 5/26/17.
 */
//script get facebook group information

var facebook_group_string=document.querySelectorAll('[property="al:ios:url"]')[0].getAttribute('content');


//get the index of the start of the part of the URL we want to keep
    index  = facebook_group_string.indexOf('id='),

//then get everything after the found index
    facebook_group_id = facebook_group_string.substr(index+3);

    facebook_group_name=document.getElementById('seo_h1_tag').innerText;

    facebook_group_total_member=document.getElementById('count_text').innerText.split(" ")[0];

    window.open('http://dantri.com.vn');

    /*var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://dantri.com.vn", false);
    xhttp.send();
    console.log(xhttp.responseText);*/

//

