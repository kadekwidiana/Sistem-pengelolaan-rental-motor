// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var totalPendapatan = document.getElementById('totalPendapatan').innerHTML;
var totalPengeluaran = document.getElementById('totalPengeluaran').innerHTML;
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Pendapatan ", "Pengeluaran ", ],
    datasets: [{
      data: [  totalPendapatan, totalPengeluaran,],
      backgroundColor: [  '#28a745', '#dc3545',],
    }],
  },
});
