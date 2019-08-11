am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chartRoles = am4core.create("chartdivRoles", am4charts.PieChart3D);

    // Set up data source
    chartRoles.dataSource.url = "http://localhost/panel_concept/data/roles";

    chartRoles.hiddenState.properties.opacity = 0; // this creates initial fade-in

    chartRoles.legend = new am4charts.Legend();

    chartRoles.innerRadius = am4core.percent(40);



     // Create series
    var series = chartRoles.series.push(new am4charts.PieSeries3D());
    series.dataFields.value = "Total";
    series.dataFields.category = "roles";

    chartRoles.slices.template.tooltipText = "{roles}: {total}";

    // Add a legend
    chartRoles.legend = new am4charts.Legend();

    }); // end am4core.ready()