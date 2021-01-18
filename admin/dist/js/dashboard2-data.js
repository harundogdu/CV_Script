/*Dashboard Init*/
 
"use strict"; 

/*****Ready function start*****/
$(document).ready(function(){
	$('#statement').DataTable({
		"bFilter": false,
		"bLengthChange": false,
		"bPaginate": false,
		"bInfo": false,
	});


if($('#chart_1').length > 0) {
	// Line Chart
	var data=[{
		period: '2010',
		iphone: 50,
		ipad: 80,
		itouch: 20
	}, {
		period: '2011',
		iphone: 130,
		ipad: 100,
		itouch: 80
	}, {
		period: '2012',
		iphone: 80,
		ipad: 60,
		itouch: 70
	}, {
		period: '2013',
		iphone: 70,
		ipad: 200,
		itouch: 140
	}, {
		period: '2014',
		iphone: 180,
		ipad: 150,
		itouch: 140
	}, {
		period: '2015',
		iphone: 105,
		ipad: 100,
		itouch: 80
	},
	 {
		period: '2016',
		iphone: 250,
		ipad: 150,
		itouch: 200
	}];
	var dataNew=[{
		period: '2010',
		iphone: 10,
		ipad: 80,
		itouch: 40
	}, {
		period: '2011',
		iphone: 110,
		ipad: 150,
		itouch: 80
	}, {
		period: '2012',
		iphone: 80,
		ipad: 60,
		itouch: 70
	}, {
		period: '2013',
		iphone: 70,
		ipad: 100,
		itouch: 190
	}, {
		period: '2014',
		iphone: 180,
		ipad: 150,
		itouch: 140
	}, {
		period: '2015',
		iphone: 315,
		ipad: 100,
		itouch: 80
	},
	 {
		period: '2016',
		iphone: 850,
		ipad: 120,
		itouch: 100
	}];
	var lineChart = Morris.Area({
		element: 'chart_1',
		data: data,
		xkey: 'period',
		ykeys: ['iphone', 'ipad', 'itouch'],
		labels: ['iPhone', 'iPad', 'iPod Touch'],
		pointSize: 3,
		lineWidth: 2,
		pointStrokeColors:['#ff6028'],
		pointFillColors:['#ffffff'],
		behaveLikeLine: true,
		gridLineColor: 'rgba(33,33,33,0.1)',
		smooth: false,
		hideHover: 'auto',
		lineColors: ['#ffcfbe', '#ff6028', '#c63300'],
		resize: true,
		gridTextColor:'#878787',
		gridTextFamily:"Roboto",
		parseTime: false,
		fillOpacity:0.4
	});	
	/* Switchery Init*/
	var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
	$('#morris_switch').each(function() {
		new Switchery($(this)[0], $(this).data());
	});
	var swichMorris = function() {
		if($("#morris_switch").is(":checked")) {
			lineChart.setData(data);
			lineChart.redraw();
		} else {
			lineChart.setData(dataNew);
			lineChart.redraw();
		}
	}
	swichMorris();	
	$(document).on('change', '#morris_switch', function () {
		swichMorris();
	});	
	}
});
/*****Ready function end*****/

/*****Load function start*****/
$(window).on("load",function(){
	window.setTimeout(function(){
		$.toast({
			heading: 'Welcome to Admintres',
			text: 'Use the predefined ones, or specify a custom position object.',
			position: 'bottom-right',
			loaderBg:'#e8af48',
			icon: 'warning',
			hideAfter: 3500, 
			stack: 6
		});
	}, 3000);
});
/*****Load function* end*****/

/*****E-Charts function start*****/
var echartsConfig = function() { 
}
/*****E-Charts function end*****/

/*****Sparkline function start*****/
var sparklineLogin = function() { 
	if( $('#sparkline_6').length > 0 ){
		$("#sparkline_6").sparkline([9,7,7,8,8,6,8,5,6], {
			type: 'bar',
			width: '100%',
			height: '155',
			barWidth: '8',
			resize: true,
			barSpacing: '10',
			barColor: '#ff6028',
			highlightSpotColor: '#ff6028'
		});
	}	
}
/*****Sparkline function end*****/

/*****Resize function start*****/
var sparkResize,echartResize;
$(window).on("resize", function () {
	/*Sparkline Resize*/
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);
	
	/*E-Chart Resize*/
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
}).resize(); 
/*****Resize function end*****/

/*****Function Call start*****/
sparklineLogin();
echartsConfig();
/*****Function Call end*****/