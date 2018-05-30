
function searchSymptome(){
	keyword = $("#keyword").val();
	// alert(keyword);
	if (keyword.length >= 3) {
		$.ajax({
			url: "/api/criteres/"+keyword,
			type: 'GET',

			success: function(data) {
				if (data == "[]") {
					result ='<tr><th>Description</th><th>Meridien</th><th>Type</th></tr><tr class="content_tr">\
						  	<td>No result..</td>\
						    <td class="meridien_td">No result..</td>\
						    <td class="type_td">No result..</td>\
						  </tr>';
				}
				else{
					data=$.parseJSON(data);
					result="<tr><th>Description</th><th>Meridien</th><th>Type</th></tr>";
					$(data).each(function(i){
						result += '<tr class="content_tr">\
						  	<td>'+data[i]["description"]+'</td>\
						    <td class="meridien_td">'+data[i]["mer"]+'</td>\
						    <td class="type_td">'+data[i]["type"]+'</td>\
						  </tr>';
					});
				}
				$("#sympto_table").html(result);
			}
		});
	}
	else{
		$("#sympto_table").html(' <tr><th>Description</th><th>Meridien</th><th>Type</th></tr><tr class="content_tr">\
						  	<td>Type 3 letters..</td>\
						    <td class="meridien_td">Type 3 letters..</td>\
						    <td class="type_td">Type 3 letters..</td>\
						  </tr>'
			);
	}

}

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
