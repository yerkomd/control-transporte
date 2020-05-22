$(document).ready(function () {
	opcion = '';
	var tabla = $('#tablaCuentasEmpresa').DataTable({
		responsive: "true",
		"order": [
			[0, "desc"]
		],
		"columnDefs": [{
			"targets": -1,
			"data": null,
			"defaultContent": "<div class='text-right'> <div class='btn-group'><button class='btn btn-warning btn-sm' id='btn-editar'><i class='fas fa-pencil-alt'></i> Editar</button><button class='btn btn-danger btn-sm' id='btn-borrar'><i class='fas fa-trash-alt'></i> Borrar</button></div></div>",
		}],
		"language": {
			'lengthMenu': "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registro",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Ultimo",
				"sNext": "Siguiente",
				"sPrevious": "Anterior",

			},
			"sProcesing": "Procesando...",
		}
	});
	$('#btn-cerrar').on('click', function () {
		LimpiarFormulario();
	});
	$(document).on('click', '#btn-editar', function () {
		fila = $(this).closest('tr');
		ID_pago_cuentas = parseInt(fila.find('td:eq(0)').text());
		$('.modal-title').text('Formulario transacciones de cliente EDITAR');
		$('#modal-cuentaEmpresa').modal('show');
		$.ajax({
			type: "POST",
			url: base_url + "/Pago_cuentas/obtenerPagoCliente",
			data: {
				ID_pago_cuentas: ID_pago_cuentas
			},
			dataType: "json",
			success: function (respuesta) {
				$("#ID_Cliente option[value=" + respuesta['ID_Cliente'] + "]").attr("selected", true);
				$('#Fecha').val(respuesta['fecha']);
				$('#Descripcion').text(respuesta['Descripcion']);
				$('#Debe').val(respuesta['Debe']);
				$('#Haber').val(respuesta['Haber']);

			}
		});
		opcion = 'editar';
	});
	$('#formcuentaEmpresa').submit(function (e) {
		e.preventDefault();

		ID_tipo_cuenta = $.trim($('#ID_tipo_cuenta').val());
		Nombre_cuenta = $.trim($('#Nombre_cuenta').val());
		Descripcion = $.trim($('#Descripcion').val());

		$('#modal-cuentaEmpresa').modal('hide');

		if (opcion != 'editar') {
			$.ajax({
				type: "POST",
				url: base_url + "/CuentaEmpresa/ingresarCuentaEmpresa",
				data: {
					ID_tipo_cuenta: ID_tipo_cuenta,
					Nombre_cuenta: Nombre_cuenta,
					Descripcion: Descripcion,
				},
				dataType: "json",
				success: function (respuesta) {
					if (respuesta['respuesta'] === 'Exitoso') {
						ID_cuenta_empresa = respuesta['datos']['ID_cuenta_empresa'];
						nombre = respuesta['datos']['nombre'];
						Nombre_cuenta = respuesta['datos']['Nombre_cuenta'];
						balance = respuesta['datos']['balance'];
						Descripcion = respuesta['datos']['Descripcion'];
						tabla.row.add([ID_cuenta_empresa, Nombre, Nombre_cuenta, Descripcion, balance]).draw();
						LimpiarFormulario();
						swal({
							title: 'Guardar',
							text: respuesta['message'],
							type: 'success'
						});

					} else {
						LimpiarFormulario();
						swal({
							title: 'Error',
							text: respuesta['message'],
							type: 'error'
						});
					}

				}
			});
		} else {
			$.ajax({
				type: "POST",
				url: base_url + "/Pago_cuentas/editarCuentaEmpresa",
				data: {
					ID_pago_cuentas: ID_pago_cuentas,
					ID_Cliente: ID_Cliente,
					Fecha: Fecha,
					Descripcion: Descripcion,
					Debe: Debe,
					Haber: Haber,
				},
				dataType: "json",
				success: function (respuesta) {
					if (respuesta['respuesta'] === 'Exitoso') {

						Fecha = respuesta['datos']['Fecha'];
						Nombre = respuesta['datos']['Nombre'];
						CI = respuesta['datos']['CI'];
						Telefono = respuesta['datos']['Telefono_01'];
						Descripcion = respuesta['datos']['Descripcion'];
						Debe = respuesta['datos']['Debe'];
						Haber = respuesta['datos']['Haber'];
						LimpiarFormulario();
						tabla.row(fila).data([ID_pago_cuentas, Fecha, Nombre, CI, Telefono, Descripcion, Debe, Haber]).draw();

						swal({
							title: 'Editado',
							text: respuesta['message'],
							type: 'success'
						});
						$('#formEmpleados').trigger('reset');
					} else {
						LimpiarFormulario();
						swal({
							title: 'Error',
							text: respuesta['message'],
							type: 'error'
						});
					}

				}
			});
		}


	});
	$(document).on('click', '#btn-borrar', function () {
		Swal.fire({
			title: 'Esta seguro de elimar?',
			text: "El movimiento se eliminara, una vez eliminado no se recuperara!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, deseo elimniar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				fila = $(this).closest('tr');
				id = parseInt(fila.find('td:eq(0)').text());
				$.ajax({
					url: base_url + "/Pago_cuentas/eliminarPago/" + id,
					type: 'POST',
					success: function (respuesta) {

						tabla.row(fila).remove().draw();
						swal({
							title: 'Eliminado',
							text: 'Se borro correctamente',
							type: 'success'
						});


					}
				})


			}
		})

	})
});

function LimpiarFormulario() {
	$('#modal-cuentaEmpresa').modal('hide');
	$('.modal-title').text('Formulario cuentas o cajas de la empresa');
	$("#ID_tipo_cuenta option:selected").removeAttr("selected");
	$('#Descripcion').text('');
	$('#formcuentaEmpresa').trigger('reset');
	opcion = '';
};
