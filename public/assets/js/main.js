$.ajaxSetup({
	headers: {
		"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
	},
});
$(document).ready(function () {
	$("#municipio").on("change", function () {
		let municipio_id = this.value;
		// console.log(municipio_id);
		$.ajax({
			// url: "{{ route('parroquias') }}",
			url: "parroquias",
			type: "POST",
			data: {
				mun_id: municipio_id,
			},

			success: function (data) {
				// console.log(data);
				$("#parroquia").empty();
				$("#parroquia").append(
					"<option selected>Seleccionar Parroquia</option>"
				);
				$.each(data.parroquias, function (index, subcategory) {
					$("#parroquia").append(
						'<option value="' +
							subcategory.id +
							'">' +
							subcategory.parroquia +
							"</option>"
					);
				});
			},
		});
	});

	$("#envioEmail").click(function (event) {
		$(this).prop("disabled", true);

		$("#emailform").trigger("submit");
		setTimeout(function () {
			$(this).prop("disabled", false);
		}, 10000);

		event.preventDefault();
	});
});
