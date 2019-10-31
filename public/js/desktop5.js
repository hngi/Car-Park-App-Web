// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Male', 9],
  ['Female', 27],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Gender', 'width':150, 'height':106, colors: ['#F0C419', '#71C285']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart.draw(data, options);
}


// chart 2
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);

// Draw the chart and set the chart values
function drawChart2() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Abuja', 9],
  ['Lagos', 5],
  ['Jos', 22]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Location', 'width':150, 'height':106, colors: ['#F0C419', '#71C285', '#556080']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}

// chart 3
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart3);

// Draw the chart and set the chart values
function drawChart3() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Airtel', 4],
  ['MTN', 32],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Mobile Network', 'width':150, 'height':106, colors: ['#F0C419', '#F0785A']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
  chart.draw(data, options);
}


// chart 4
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart4);

// Draw the chart and set the chart values
function drawChart4() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['IOS', 8],
  ['Android', 28],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Phone', 'width':150, 'height':106, colors: ['#B771C2', '#19F0F0']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
  chart.draw(data, options);
}


