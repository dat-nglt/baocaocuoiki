<div class="body__container">
  <div class="list__container">
    <div style="flex: 1;display:flex;justify-content: flex-end">

      <?php
      var_dump($logisticsDataChart);
      echo $_SESSION['sort_chart_date'];
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
    /* position: relative; */
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
      var logisticsDataChart =
        <?php echo json_encode($logisticsDataChart); ?>;
      const sumLogistics = parseInt(logisticsDataChart[0][1]) + parseInt(logisticsDataChart[1][1]);
      const inLogistics = parseInt(logisticsDataChart[0][1]) / sumLogistics * 100;
      const outLogistics = parseInt(logisticsDataChart[1][1]) / sumLogistics * 100;
      chartLogistics(inLogistics, outLogistics);
    }
    else if (optionChart == 'bills') {
      var billChartData =
        <?php echo json_encode($billChartData); ?>;
      chartBills(billChartData)
    }
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
  function chartLogistics(inLogistics = 0, outLogistics = 0) {
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3'],
        datasets: [{
          label: 'Nhập',
          data: [12, 13, 15],
          borderWidth: 1
        }, {
          label: 'Xuất',
          data: [19, 11, 18],
          borderWidth: 1
        }],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Floating Bar Chart'
          }
        }
      }
    });
  }

</script>