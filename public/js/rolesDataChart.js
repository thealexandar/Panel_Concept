am4core.ready(function() {

    // Themes begin
   // am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chartRoles = am4core.create("chartdivRoles", am4charts.PieChart);

    // Set up data source
    chartRoles.dataSource.url = "http://localhost/panel_concept/data/roles";

    // Add and configure Series
    var pieSeries = chartRoles.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "Total";
    pieSeries.dataFields.category = "role";

    // Let's cut a hole in our Pie chart the size of 30% the radius
    chartRoles.innerRadius = am4core.percent(30);

    // Put a thick white border around each Slice
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    pieSeries.slices.template
      // change the cursor on hover to make it apparent the object can be interacted with
      .cursorOverStyle = [
        {
          "property": "cursor",
          "value": "pointer"
        }
      ];

    pieSeries.alignLabels = false;
    pieSeries.labels.template.bent = true;
    pieSeries.labels.template.radius = 3;
    pieSeries.labels.template.padding(0,0,0,0);

    pieSeries.ticks.template.disabled = true;

    // Create a base filter effect (as if it's not there) for the hover to return to
    var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
    shadow.opacity = 0;

    // Create hover state
    var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

    // Slightly shift the shadow and make it more prominent on hover
    var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
    hoverShadow.opacity = 0.7;
    hoverShadow.blur = 5;

    // Add a legend
    chartRoles.legend = new am4charts.Legend();

    }); // end am4core.ready()