// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("tes");
var totalBulanJanuari = document.getElementById('totalBulanJanuari').innerHTML;
var totalBulanFebruari = document.getElementById('totalBulanFebruari').innerHTML;
var totalBulanMaret = document.getElementById('totalBulanMaret').innerHTML;
var totalBulanApril = document.getElementById('totalBulanApril').innerHTML;
var totalBulanMei = document.getElementById('totalBulanMei').innerHTML;
var totalBulanJuni = document.getElementById('totalBulanJuni').innerHTML;
var totalBulanJuli = document.getElementById('totalBulanJuli').innerHTML;
var totalBulanAgustus = document.getElementById('totalBulanAgustus').innerHTML;
var totalBulanSeptember = document.getElementById('totalBulanSeptember').innerHTML;
var totalBulanOktober = document.getElementById('totalBulanOktober').innerHTML;
var totalBulanNovember = document.getElementById('totalBulanNovember').innerHTML;
var totalBulanDesember = document.getElementById('totalBulanDesember').innerHTML;
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [{
      label: "Total",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [
        totalBulanJanuari,
        totalBulanFebruari,
        totalBulanMaret,
        totalBulanApril,
        totalBulanMei,
        totalBulanJuni,
        totalBulanJuli,
        totalBulanAgustus,
        totalBulanSeptember,
        totalBulanOktober,
        totalBulanNovember,
        totalBulanDesember
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 8
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000000,
          maxTicksLimit: 15
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
