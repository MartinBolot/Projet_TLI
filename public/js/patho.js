/**
  * displayDetail
  * Ajax call used to gather symptomes for a given patho id
  *
*/
function displayDetail(idPatho){
	$.ajax({
		url: "index.php?api=detail&id="+idPatho, //TO CHANGE
		type: 'GET',

		success: function(data) {
			data=$.parseJSON(data);

			var result = "Symptomes : \n";

			$(data).each(function(i){
				result += data[i]["description"]+"\n";
			});

			alert(result);
        }
	});
}

/**
  * filtrerPathologie
  * Function triggered when the user choose an option in the filters, it parses the table and filter out the row
  *
*/
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
