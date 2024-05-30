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
      <div id="chart_logistics"></div>
    </div>
  </div>

</div>

<style>
  #title_chart {
    margin: 20px auto 10px;
    font-size: 20px;
    font-weight: 600;
    color: var(--blue-white-cl);
    text-transform: uppercase;
    width: 90%;

  }

  .chart_container {
    display: flex !important;
    height: 400px;
    flex-direction: column !important;
    width: 90%;
    margin: 0 auto;
  }


  #chart_logistics {
    flex: 1;
  }

  .canvasjs-chart-canvas {}

  .canvasjs-chart-credit {
    display: none !important;
  }
</style>

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
    var chart = new CanvasJS.Chart("chart_logistics", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title: {
        text: "Đơn hàng"
      },
      axisY: {
        title: "Số lượng đơn hàng đã bán",
        suffix: "đơn"
      },
      axisX: {
        title: "Thời gian"
      },
      data: [{
        type: "column",
        yValueFormatString: "#,###\" đơn hàng\"",
        dataPoints:
          billChartData.map((bill, index) => {
            return { label: bill[1], y: parseInt(bill[0]) }
          })
      }]
    });
    chart.render();
  }
  function chartLogistics(inLogistics = 0, outLogistics = 0) {
    var chart = new CanvasJS.Chart("chart_logistics", {
      exportEnabled: true,
      animationEnabled: true,
      title: {
        text: "Logistics"
      },
      legend: {
        cursor: "pointer",
        itemclick: explodePie
      },
      data: [{
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}%</strong>",
        indexLabel: "{name} - {y}%",
        dataPoints: [
          { y: inLogistics, name: "Nhập sản phẩm" },
          { y: outLogistics, name: "Xuất sản phẩm" },
        ]
      }]
    });
    chart.render();
    function explodePie(e) {
      if (typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();

    }
  }

</script>