/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$( document ).ready(function() {
    $('#url').focus();
});

function go(url){
    //alert(url);
    $.post('url.php', {url: url}, function(data){
        alert(data);
    });
}

