// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: medicines,
    datasets: [{
      data: totalMedicines,
      backgroundColor: [
        '#007bff', // biru
        '#dc3545', // merah
        '#ffc107', // kuning
        '#28a745', // hijau
        '#17a2b8', // cyan
        '#6f42c1', // ungu
        '#fd7e14', // oranye
        '#20c997', // teal
        '#6610f2', // biru tua
        '#e83e8c'  // pink
      ],
    }],
  },
});
