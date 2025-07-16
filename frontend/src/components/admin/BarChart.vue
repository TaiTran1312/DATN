<template>
  <div style="height: 350px;">
    <canvas id="barChart" ref="barChart"></canvas>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue'
import { Chart, registerables } from 'chart.js'

Chart.register(...registerables)

export default {
  name: 'BarChart',
  setup() {
    const barChart = ref(null)

    onMounted(() => {
      const ctx = barChart.value.getContext('2d')
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
            'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
          ],
          datasets: [{
            label: 'Doanh thu (triệu đồng)',
            data: [1000, 2500, 1800, 4000, 2200, 3000, 3500, 5000, 7000, 8000, 9000, 10000],
            backgroundColor: 'rgba(59, 130, 246, 0.7)',
            borderColor: 'rgba(37, 99, 235, 1)',
            borderWidth: 1,
            borderRadius: 8,
            hoverBackgroundColor: 'rgba(37, 99, 235, 1)',
            barThickness: 30,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
              labels: {
                font: {
                  size: 14
                }
              }
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  return context.dataset.label + ': ' + context.raw.toLocaleString('vi-VN') + ' triệu';
                }
              }
            }
          },
          scales: {
            y: {
              min: 0,
              max: 11000,
              ticks: {
                stepSize: 1000,
                callback: function (value) {
                  return value.toLocaleString('vi-VN')
                },
                font: { size: 12 }
              },
              title: {
                display: true,
                text: 'Doanh thu (triệu đồng)',
                font: {
                  size: 14,
                  weight: 'bold'
                }
              },
              grid: {
                color: '#e5e7eb'
              }
            },
            x: {
              ticks: {
                font: { size: 12 }
              },
              title: {
                display: true,
                text: 'Tháng',
                font: {
                  size: 14,
                  weight: 'bold'
                }
              },
              grid: {
                display: false
              }
            }
          }
        }
      })
    })

    return {
      barChart
    }
  }
}
</script>
