$(document).ready(function() {
    $.ajax({
      url:'https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items?color=red',
      type:'GET',
      dataType:'json'
    }).done(function(data){
      //console.log(data);
      let table = "";
      data.forEach(function(value) {
        table+="<tr>";
        table+=" <td>" + value['id'] + "</td>";
        table+=" <td>" + value['type'] + "</td>";
        table+=" <td>" + value['color'] + "</td>";
        table+="</tr>";  
      });
       
      $('.content-table').append(table);
    }).fail(function(resp){
      console.log("Error: "+resp.responseText);
    });

});