$(document).ready(function() {
	$(function () {
	var t = 100;		
	
		var plot = 
		$.plot($("#placeholder1"), 
			[{data:totalData()}], 
			{	
				series:{
					lines: { show: true, fill: true},
					points: { show: true },
					shadowSize: 10
				},
				//Las etiquetas en el eje X, aqu� pondr�amos los tiempos
				xaxis: {
					ticks: ticks_x,
					show: true,
					max: n_puntos
				},
				//la separaci�n entre los n�meros en el eje Y, Aqui pondr�amos las diferentes intensidades.
				yaxis: {
					ticks: 20,
					show:false,
					min: 0
				},
				grid: {
					backgroundColor: { colors: ["#2c2c2c", "#585858"] },
					hoverable: false, 
					clickable: false,
					color: "#FFF"

				},
				selection: { mode: "x" },
			});//plot
		
		function totalData(){
			return data;
		}
		
		
		function totalData(){
			return data;
		}
		
		function getData() {
			var res = [];
			if (data.length > 0)
				data = data.slice(1);
				
			for (var i = 0; i < data.length; ++i)
				res.push(data[i]);
			return res;
		}
		
		/////////////////////////////
		//tooltip
		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#fee',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}
	
		var previousPoint = null;
		$("#placeholder").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));
	
				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;
						
						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);
						
						showTooltip(item.pageX, item.pageY,
									" Cadencia = " + y );
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;            
				}
		  
		});
		
		var cantidad = 0;
		function updateSelection() {
			plot.setSelection({ xaxis: { from: 0, to: cantidad }});

			// since the axes don't change, we don't need to call plot.setupGrid()
			cantidad = cantidad + incremento;
			setTimeout(updateSelection, updateInterval);
   		}

		updateSelection();
	});//function

		
		
});