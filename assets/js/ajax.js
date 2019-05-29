$("#assign_st").click(function() {
	var class_id = $("#class_id").val();
	studentArray = [];
	$("input[name=student]:checked").each(function() {
		studentArray.push($(this).val());
	});
	var vals = studentArray.join(",");
	$.ajax({
		type: "POST",
		url: baseURL + "classroom/assign",
		data: { student_id: vals, class_id: class_id },
		success: function(result) {
			if (result == true) {
				$(".alert .alert-success").html("Success Adding Students to classroom");
			} else {
				$(".alert .alert-danger").html("Error Adding Students");
			}
		}
	});
	setTimeout("location.reload(true);", 200);
});
