function init() {
    CargaLista();
  }
var CargaLista = () => {
    var html = "";
    $.get(
      "../../../API/controllers/reportes.controllers.php?op=todos",
      (Reporte) => {
        console.log(Reporte);
        Reporte = JSON.parse(Reporte);
        $.each(Reporte, (index, rep) => {
          html += `
          <tr>
            <td>${index + 1}</td>
            <td>${rep.nombreMantenimiento}</td>
            <td>${rep.placa_vehiculo}</td>
            <td>${rep.nombre_repuesto}</td>
            <td>${rep.km}</td>
            <td>${rep.hora}</td>
            <td>${rep.dia}</td> 
            <td>${rep.mes}</td>
            <td>${rep.anio}</td>
            <td>${rep.nota}</td>
            <td>${rep.estado}</td>
          </tr>`;
        });
        $("#Reporte").html(html);
      }
    );
  };

  init();