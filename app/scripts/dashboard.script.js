function init() {
    CargaLista();
  }
var CargaLista = () => {
    var html = "";
    $.get(
      "../../../API/controllers/dashboard.controllers.php?op=todos",
      (Dashboard) => {
        Dashboard = JSON.parse(Dashboard);

        Dashboard.sort(function(a, b){
          var prioridadA = obtenerPrioridad(a.estado);
          var prioridadB = obtenerPrioridad(b.estado);
          return prioridadA - prioridadB;
      });

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

  function obtenerPrioridad(estado){
    switch(estado.toLowerCase()){
      case 'mantenimiento atrasado':
        return 1;
      case 'alerta':
        return 2;
      case 'proximo mantenimiento':
        return 3;
      case 'buen estado':
        return 4;
      default: 
        return 0;  
    }
  }

  init();