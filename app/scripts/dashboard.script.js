function init() {
    CargaLista();
  }
var CargaLista = () => {
    var html = "";
    $.get(
      "../../controllers/dashboard.controllers.php?op=todos",
      (Dashboard) => {
        console.log(Dashboard);
        Dashboard = JSON.parse(Dashboard);
        $.each(Dashboard, (index, dash) => {
          html += `
          <tr>
            <td>${index + 1}</td>
            <td>${dash.nombreMantenimiento}</td>
            <td>${dash.placa_vehiculo}</td>
            <td>${dash.nombre_repuesto}</td>
            <td>${dash.km}</td>
            <td>${dash.hora}</td>
            <td>${dash.dia}</td> 
            <td>${dash.mes}</td>
            <td>${dash.anio}</td>
            <td>${dash.nota}</td>
            <td>${dash.estado}</td>
          </tr>`;
        });
        $("#Dashboard").html(html);
      }
    );
  };

  init();