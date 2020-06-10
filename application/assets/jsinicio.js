$(document).ready(function () {
	var year = new Date();
	var year = year.getFullYear();
	var tablaCliente = $('#tablaDetalleCliente').DataTable({
		responsive: "true",
		"order": [
			[3, "desc"]
		],
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
		},
		"footerCallback": function (row, data, start, end, display, tfoot) {
			var api = this.api(),
				data;

			// Remove the formatting to get integer data for summation
			var intVal = function (i) {
				return typeof i === 'string' ?
					i.replace(/[\$,]/g, '') * 1 :
					typeof i === 'number' ?
					i : 0;
			};

			// Total over all pages
			total = api
				.column(3)
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Total over this page
			pageTotal = api
				.column(3, {
					page: 'current'
				})
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Update footer
			$(api.column(3).footer()).html(
				total
			);
		},
	});
	var tablaProveedores = $('#tablaDetalleProveedores').DataTable({
		responsive: "true",
		"order": [
			[3, "desc"]
		],
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
		},
		"footerCallback": function (row, data, start, end, display, tfoot) {
			var api = this.api(),
				data;

			// Remove the formatting to get integer data for summation
			var intVal = function (i) {
				return typeof i === 'string' ?
					i.replace(/[\$,]/g, '') * 1 :
					typeof i === 'number' ?
					i : 0;
			};

			// Total over all pages
			total = api
				.column(3)
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Total over this page
			pageTotal = api
				.column(3, {
					page: 'current'
				})
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Update footer
			$(api.column(3).footer()).html(
				total
			);
		},
	});
	var tablaTalleres = $('#tablaDetalleTaller').DataTable({
		responsive: "true",
		"order": [
			[3, "desc"]
		],
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
		},
		"footerCallback": function (row, data, start, end, display, tfoot) {
			var api = this.api(),
				data;

			// Remove the formatting to get integer data for summation
			var intVal = function (i) {
				return typeof i === 'string' ?
					i.replace(/[\$,]/g, '') * 1 :
					typeof i === 'number' ?
					i : 0;
			};

			// Total over all pages
			total = api
				.column(3)
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Total over this page
			pageTotal = api
				.column(3, {
					page: 'current'
				})
				.data()
				.reduce(function (a, b) {
					return intVal(a) + intVal(b);
				}, 0);

			// Update footer
			$(api.column(3).footer()).html(
				total
			);
		},
	});
	GenerarGraficoMovimiento(year);
	$(document).on('click','.btn-reporte-cliente', function () {
		fila = $(this).closest('tr');
		ID_Cliente = parseInt(fila.find('td:eq(0)').text());
		$.ajax({
			type: "POST",
			url: base_url + "/Inicio/detalleCliente/" + ID_Cliente,
			dataType: "html",
			success: function (response) {
				$('#modal-detalle .modal-body').html(response);
			}
		});
	});
	$(document).on('click','.btn-reporte-proveedor', function () {
		fila = $(this).closest('tr');
		ID_proveedor = parseInt(fila.find('td:eq(0)').text());
		$.ajax({
			type: "POST",
			url: base_url + "/Inicio/detalleProveedor/" + ID_proveedor,
			dataType: "html",
			success: function (response) {
				$('#modal-detalle .modal-body').html(response);
			}
		});
	});
	$(document).on('click','.btn-reporte-taller', function () {
		fila = $(this).closest('tr');
		ID_taller = parseInt(fila.find('td:eq(0)').text());
		$.ajax({
			type: "POST",
			url: base_url + "/Inicio/detalleTaller/" + ID_taller,
			dataType: "html",
			success: function (response) {
				$('#modal-detalle .modal-body').html(response);
			}
		});
	});
	$(document).on('click', '.btn-print', function () {

		$("#modal-detalle .modal-body").print({
			title: 'Balance',
		});
	});
});

function resetGrafico() {
	$('#GraficoM').remove(); // this is my <canvas> element
	$('#GraficoMovimiento').append('<canvas id="GraficoM" height="200" width="700""></canvas>');
}

function GenerarGraficoMovimiento(year) {
	$.ajax({
		type: "POST",
		url: base_url + "/inicio/graficoMovimiento",
		data: {
			year: year
		},
		dataType: "json",
		success: function (response) {
			resetGrafico();
			GraficoMovimiento(response);
		}
	});
}

function GraficoMovimiento(Datos) {

	var f = document.getElementById("GraficoM");
	new Chart(f, {
		type: "line",
		data: {
			labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
			datasets: [{
				label: "Movimiento total de transporte",
				backgroundColor: "rgba(38, 185, 154, 0.31)",
				borderColor: "rgba(38, 185, 154, 0.7)",
				pointBorderColor: "rgba(38, 185, 154, 0.7)",
				pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
				pointHoverBackgroundColor: "#fff",
				pointHoverBorderColor: "rgba(220,220,220,1)",
				pointBorderWidth: 1,
				data: Datos['MovimientoGeneralTransportePorMes']
			}, {
				label: "Movimiento por camiones de la empresa",
				backgroundColor: "rgba(3, 88, 106, 0.3)",
				borderColor: "rgba(3, 88, 106, 0.70)",
				pointBorderColor: "rgba(3, 88, 106, 0.70)",
				pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
				pointHoverBackgroundColor: "#fff",
				pointHoverBorderColor: "rgba(151,187,205,1)",
				pointBorderWidth: 1,
				data: Datos['MovimientoGeneralTransporteCamionesEmpresa']
			}]
		},
		options:{
			legend: {
				display: false,
				position: 'bottom',
			},
		}

	});
}
