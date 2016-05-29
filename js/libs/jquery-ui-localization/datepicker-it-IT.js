/* Modificato da Luca Cilfone: ".it" diventa "["it-IT"]"
 * Italian initialisation for the jQuery UI date picker plugin. */
/* Written by Antonello Pasella (antonello.pasella@gmail.com). */
(
	function (factory) {
		if (typeof define === "function" && define.amd) {
			// AMD. Register as an anonymous module.
			define(["../widgets/datepicker"], factory);
		} else {
			// Browser globals
			factory(jQuery.datepicker);
		}

	}(function (datepicker) {

		datepicker.regional["it-IT"] = {
			closeText: "Chiudi",
			prevText: "&#x3C;Prec",
			nextText: "Succ&#x3E;",
			currentText: "Oggi",
			monthNames: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
			monthNamesShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
			dayNames: ["Domenica", "Luned&igrave;", "Marted&igrave;", "Mercoled&igrave;", "Gioved&igrave;", "Venerd&igrave;", "Sabato"],
			dayNamesShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
			dayNamesMin: ["Do", "Lu", "Ma", "Me", "Gi", "Ve", "Sa"],
			weekHeader: "Sm",
			dateFormat: "dd-mm-yy",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: "",
		};

		datepicker.setDefaults(datepicker.regional["it-IT"]);

		return datepicker.regional["it-IT"];

	})
);
