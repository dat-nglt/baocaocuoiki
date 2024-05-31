<div class="body__container">
  <div class="list__container">
    <div style="flex: 1;display:flex;justify-content: flex-end">

      <?php
      // var_dump($logisticsDataChart);
      // echo $_SESSION['sort_chart_date'];
      ?>

      <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
        <fieldset>
          <legend>Lựa chọn</legend>
          <form action="" method="post" class="admin__form-search">
            <select name="filt_option_chart" id="filt_option_chart">
              <option value="sales" class="option_filt_chart" <?php if ($_SESSION['filt_option_chart'] === "sales") {
                echo 'selected';
              }
              ?>>
                Thống kê doanh thu bán hàng
              </option>
              <option value="logistics" class="option_filt_chart" <?php if ($_SESSION['filt_option_chart'] === "logistics") {
                echo 'selected';
              }
              ?>>
                Thống kê nhập xuất sản phẩm
              </option>
              <option value="bills" class="option_filt_chart" <?php if ($_SESSION['filt_option_chart'] === "bills") {
                echo 'selected';
              }
              ?>>
                Thống kê đơn hàng đã bán
              </option>
            </select>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </fieldset>
        <fieldset>
          <legend>Thời gian</legend>
          <form action="" method="post" class="admin__form-search">
            <select name="sort_chart_date" id="sort_chart_date">
              <option value="7" <?php if ($_SESSION['sort_chart_date'] === "7") {
                echo 'selected';
              }
              ?>>
                7 ngày qua
              <option value="30" <?php if ($_SESSION['sort_chart_date'] === "30") {
                echo 'selected';
              }
              ?>>
                30 ngày qua
              </option>
              <option value="60" <?php if ($_SESSION['sort_chart_date'] === "60") {
                echo 'selected';
              }
              ?>>
                60 ngày qua
              </option>
              </option>
              <option value="90" <?php if ($_SESSION['sort_chart_date'] === "90") {
                echo 'selected';
              }
              ?>>
                90 ngày qua
              </option>
            </select>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </fieldset>
      </div>
    </div>
    <div id="title_chart"></div>
    <div class="chart_container">
      <canvas width="1100px" height="400px" id="myChart"></canvas>
    </div>
  </div>

</div>

<style>
  #title_chart {
    margin: 20px auto 30px;
    font-size: 20px;
    font-weight: 600;
    color: var(--blue-white-cl);
    text-transform: uppercase;
    width: 1100px;

  }

  .chart_container {
    display: flex !important;
    height: 400px;
    flex-direction: column !important;
    width: 1100px;
    margin: 0 auto;
  }

  canvas#myChart {
    width: 1100px !important;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>\
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

      const maxDate = additionQuantityChart.length > minusQuantityChart.length
        ? additionQuantityChart
        : minusQuantityChart;
      chartLogistics(maxDate, additionQuantityChart, minusQuantityChart);
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
  function chartLogistics(maxDate = [], additionQuantityChart = [], minusQuantityChart = []) {
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: maxDate.map((date, index) => date[1]),
        datasets: [{
          label: 'Số sản phẩm nhập kho',
          data: additionQuantityChart.map((add, index) => add[0]),
          borderWidth: 1
        }, {
          label: 'Số sản phẩm xuất bán',
          data: minusQuantityChart.map((minus, index) => minus[0]),
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

</script>