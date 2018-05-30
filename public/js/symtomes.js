
function searchSymptome(){
	keyword = $("#keyword").val();
	// alert(keyword);
	if (keyword.length >= 3) {
		$.ajax({
			url: "/api/criteres/"+keyword,
			type: 'GET',

			success: function(data) {
				if (isEmpty(data)) {
					result = "No result...";
				}
				else{
					data=$.parseJSON(data);
					result="";
					$(data).each(function(i){
						result += '<tr class="content_tr">\
						  	<td>'+$data[i]["description"]+'</td>\
						    <td class="meridien_td">'+$data[i]["mer"]+'</td>\
						    <td class="type_td">'+$data[i]["type"]+'</td>\
						  </tr>';
					});
				}
				$("#sympto_table").html(result);
			}
		});
	}
}

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
