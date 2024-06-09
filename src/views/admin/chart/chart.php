<div class="body__container">
  <div class="list__container">
    <div style="flex: 1;display:flex;justify-content: flex-end">
      <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
        <form id="time_chart_form" action="" method="post" class="admin__form-search chart">
          <fieldset>
            <legend>Thời gian bắt đầu</legend>
            <input class="input_date_chart" type="date" name="start_time_chart" id="start_time_chart"
              value=<?= $_SESSION['start_time_chart'] ?>>
          </fieldset>
          <fieldset>
            <legend>Thời gian kết thúc</legend>
            <input class=" input_date_chart" type="date" name="end_time_chart" id="end_time_chart"
              value=<?= $_SESSION['end_time_chart'] ?>>
          </fieldset>
        </form>
      </div>
    </div>
    <div id="chart_container">
      <div class="chart_subcontainer all">
        <div class="chart_box">
          <h3>Đơn hàng thành công</h3>
          <strong>500</strong>
        </div>
        <div class="chart_box">
          <h3>Doanh thu - VNĐ</h3>
          <strong>500.000.000</strong>
        </div>
        <div class="chart_box">
          <h3>Sản phẩm yêu thích nhất</h3>
          <div class="friendly_customer">
            <strong>
              Mã sản phẩm: 100
            </strong>
            <strong>
              Tên sản phẩm: Nguyễn Lê Tấn Đạt
            </strong>
            <strong>
              Số lượng đã bán: 500 Chiếc
            </strong>
          </div>
        </div>
        <div class="chart_box">
          <h3>Khách hàng thân thiết nhất</h3>
          <div class="friendly_customer">
            <strong>
              Mã khách hàng: 100
            </strong>
            <strong>
              Họ tên: Nguyễn Lê Tấn Đạt
            </strong>
            <strong>
              Số tiền mua sắm: 500.000.000 VNĐ
            </strong>
          </div>
        </div>
      </div>
      <div class="chart_subcontainer">1</div>
      <div class="chart_subcontainer">1</div>
      <div class="chart_subcontainer">1</div>
    </div>

  </div>

</div>

<style>
  .chart {
    display: flex;
    align-items: flex-end;
    gap: 10px;
  }

  .chart>fieldset>input[type="date"] {
    font-size: 16px;
    padding: 4px;
    background-color: transparent;
    border: none;
    color: #fff;
    outline: none;
  }


  .chart>fieldset>input[type="date"]::-webkit-calendar-picker-indicator {
    background-color: #ffffff;
    padding: 2px;
    cursor: pointer;
    border-radius: 3px;
  }

  #chart_container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-gap: 20px;
    height: 100vh;
  }

  .all {
    display: grid !important;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-gap: 20px;
  }

  .chart_box {
    align-items: flex-start !important;
    gap: 0px !important;
    background-color: #2778c4;
    height: 100%;
    border-radius: 10px;
    display: flex !important;
    flex-direction: column;
    padding: 20px;
    border: 1px solid;
  }

  .chart_box>h3 {
    font-size: 15px;
    text-transform: uppercase;
    text-shadow: 1px 1px 2px black;
  }

  .chart_box>strong {
    background: #fff;
    width: 100%;
    color: #1278d2;
    font-size: 30px;
    font-weight: 700;
    text-align: center;
    padding: 25px;
    margin-top: 13px;
    border-radius: 10px;
  }

  .friendly_customer {
    width: 100%;
    flex-direction: column;
    align-items: flex-start !important;
    margin-top: 24px;
    background: #fff;
    border-radius: 10px;
    padding: 10px;
    color: #1278d2;
    font-size: 12px;
  }
</style>

<script>
  $('.input_date_chart').on('change', function () {
    $('#time_chart_form').submit();
  })
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');
  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Thành công', 'Thất bại'],
      datasets: [{
        label: 'Số lượng đơn hàng',
        data: [12, 19],
        borderWidth: 2
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false,
          labels: {
            color: 'rgb(255, 99, 132)'
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- 
<script>

  window.onload = function () {
    const titleChart = $('.option_filt_chart:selected').text();
    const optionChart = $('#filt_option_chart').val();
    $('#title_chart').text(titleChart);
    if (optionChart == 'logistics') {
      var minusQuantityChart =
        <?php echo json_encode($minusQuantityChart); ?>;
      var additionQuantityChart =
        <?php echo json_encode($additionQuantityChart); ?>;
      chartLogistics(additionQuantityChart, minusQuantityChart);
    }
    else if (optionChart == 'bills') {
      var billChartData =
        <?php echo json_encode($billChartData); ?>;
      chartBills(billChartData)
    }
    else if (optionChart == 'sales') {
      var salesChartData =
        <?php echo json_encode($salesChartData); ?>;
      chartSales(salesChartData)
    }
  }


  function chartSales(salesChartData) {
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: salesChartData.map((bill) => bill[1]),
        datasets: [{
          color: 'rgba(255, 255, 255, 1)',
          label: 'Doanh thu (VND)',
          data: salesChartData.map((bill) => bill[0]),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            color: 'red'
          }
        }
      }
    });
  }

  function chartBills(billChartData) {
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: billChartData.map((bill) => bill[1]),
        datasets: [{
          color: 'rgba(255, 255, 255, 1)',
          label: 'Đơn hàng',
          data: billChartData.map((bill) => bill[0]),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            color: 'red'
          }
        }
      }
    });
  }
  function chartLogistics(additionQuantityChart = [], minusQuantityChart = []) {

    const allDays = [...new Set([...additionQuantityChart.map(item => item[1]), ...minusQuantityChart.map(item => item[1])])];
    allDays.sort((a, b) => new Date(a) - new Date(b));
    const result = allDays.map(day => {
      return [
        day,
        additionQuantityChart.find(item => item[1] === day) ? parseInt(additionQuantityChart.find(item => item[1] === day)[0]) : 0,
        minusQuantityChart.find(item => item[1] === day) ? parseInt(minusQuantityChart.find(item => item[1] === day)[0]) : 0
      ];
    });
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: result.map((item, index) => item[0]),
        datasets: [{
          label: 'Số sản phẩm nhập kho',
          data: result.map((item, index) => item[1]),
          borderWidth: 1
        }, {
          label: 'Số sản phẩm xuất bán',
          data: result.map((item, index) => item[2]),
          borderWidth: 1
        }],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
        }
      }
    });
  }

</script> -->