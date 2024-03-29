am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  var chartRoles = am4core.create("chartdivRoles", am4charts.PieChart3D);

  // Set up data source
  chartRoles.dataSource.url = "http://localhost/panel_concept/data/roles";

  chartRoles.hiddenState.properties.opacity = 0; // this creates initial fade-in

  chartRoles.legend = new am4charts.Legend();

  var series = chartRoles.series.push(new am4charts.PieSeries3D());
  series.dataFields.value = "Total";
  series.dataFields.category = "role";

  }); // end am4core.ready()