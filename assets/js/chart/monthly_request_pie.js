// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Request", "Budget"],
    datasets: [{
      data: [sum_chart, sum_budget],
      backgroundColor: ['#4e73df', '#e33939'],
      hoverBackgroundColor: ['#2e59d9', '#c71818'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          let label = chart.labels[tooltipItem.index];
          return label+ ' : Rp ' + number_format(chart.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
      }
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
