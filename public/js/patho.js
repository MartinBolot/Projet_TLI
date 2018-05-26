
function displayDetail(idPatho){
	$.ajax({
		url: "index.php?page=detail", //TO CHANGE
		type: 'GET',

		success: function(data) {
			console.log(data);
			data=$.parseJSON(data);

			var result = "Symptomes : \n";

			$(data).each(function(i){
				result += data[i]["description"]+"\n";
			});

			alert(result);
        }
	});
}

function filtrerPathologie(){
	var type = $("#type_filter option:selected").val();
	var meridien = $("#meridien_filter option:selected").val();

	$(".content_tr").each(function(index, element) {
		$(element).show();

		if (type=="" && meridien!="") {
			if ($(element).find(".meridien_td").text()!=meridien){
				$(element).hide();
			}
		}else{
			if (type!="" && meridien=="") {
				if ($(element).find(".type_td").text()!=type){
					$(element).hide();
				}
			}else{
				if (type!="" && meridien!="") {
					if ($(element).find(".type_td").text()!=type || $(element).find(".meridien_td").text()!=meridien){
						$(element).hide();
					}
				}
			}
		}
	});
}
