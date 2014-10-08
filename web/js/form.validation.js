function display_interesse_kurs_prio(name, type) {
	id_array = name.split("_");
	$("#prioritaet_kurs_"+id_array[2]).css("display", type);
}

function validateForm() {

	errors = [];

	//at least one kurs need to be set
	countChecked = 0;
	$("input[name^='intresse_kurs_']" ).each(function() {
		if($(this).val() != "nichts" && $(this).is(':checked')) { countChecked++; }
	});
	if(countChecked == 0)
		errors.push("Bitte zeige ein bisschen mehr Interesse an den Kursen.");
	

	if($("#pfadiname").val() == "")
		errors.push("Du hast dien Pfadiname vergessen.");

	if($("#email").val() == "")
		errors.push("Du hast deine E-mail Adresse vergessen.");

	if($("#natelnummer").val() == "")
		errors.push("Du hast deine Natelnummer vergessen");

	if($("#abteilung").val() == "0")
		errors.push("Du hast deine Abteilung vergessen");

	if(!$("#erfahrung_1_stufe").is(':checked') && !$("#erfahrung_2_stufe").is(':checked'))
		errors.push("In welcher Stufe hast du Leitererfahrung?");
	
	if(!$("#aktuell_leiter_in_1").is(':checked') && !$("#aktuell_leiter_in_2").is(':checked'))
		errors.push("Was ist deine aktuelle Leitertätigkeit?");

	if(!$("#panorama_ja").is(':checked') && !$("#panorama_nein").is(':checked'))
		errors.push("Hast du den Panorama-Kurs besucht ?");

	if(errors.length > 0) {

		alert(errors.shift());
		return false;
	}
	else
		return true;
	
}

$(document).ready(function() {

	$("input[name^='intresse_kurs_']" ).each(function() {
		$(this).change(function() {
			if($("#"+$(this).attr('name')+"_nichts").is(':checked')) 
				display_interesse_kurs_prio($(this).attr('name'), "none");
			else
				display_interesse_kurs_prio($(this).attr('name'), "block");
		});
		$(this).trigger("change");
	});

});

