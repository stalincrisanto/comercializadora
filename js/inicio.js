function cargarDatosPrincipal()
{
    $.ajax({
        url:"../controlador/inicio/controlador_numero_pacientes.php",
        type:'POST',
    }).done(function(resp){
        $("#num_pacientes").text(resp);
    })
    $.ajax({
        url:"../controlador/inicio/controlador_numero_evaluadores.php",
        type:'POST',
    }).done(function(resp){
        $("#num_evaluadores").text(resp);
    })
    $.ajax({
        url:"../controlador/inicio/controlador_numero_pruebas.php",
        type:'POST',
    }).done(function(resp){
        $("#num_pruebas").text(resp);
    })
}

function iniciarCalendario()
{
    const test = [
        {
            "id":"id1",
            "title":"Prueba3",
            "start":"2021-04-20"
        },
        {
            "id":"id2",
            "title":"Prueba10",
            "start":"2021-04-22"
        },
        {
            "id":"id1",
            "title":"Prueba1100",
            "start":"2021-04-22"
        }
    ]
    $.ajax({
        url:"../controlador/inicio/controlador_calendario_pruebas.php",
        type:'POST',
    }).done(function(resp){
        const tests = JSON.parse(resp);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            eventSources: [{
                color: '#306EFE',   
                textColor: '#ffffff',
                events: tests
            }],
            eventClick: function(info) {
                console.log(info)
                console.log('Id: ' + info.event.extendedProps.sourceId);
                console.log('Event: ' + info.event.title);
                let $modalPrueba = document.getElementById("modal_prueba_detalle");
                $("#modal_prueba_detalle").modal('show');
                document.getElementById("paciente").setAttribute("value",info.event.extendedProps.PACIENTE);
                document.getElementById("profesion").setAttribute("value",info.event.extendedProps.NOMBRE_PROFESION);
                document.getElementById("evaluador").setAttribute("value",info.event.extendedProps.EVALUADOR);
                document.getElementById("prueba").setAttribute("value",info.event.extendedProps.NOMBRE_PRUEBA);
                document.getElementById("fecha").setAttribute("value",info.event.extendedProps.FECHA_PRUEBA);
                document.getElementById("hora").setAttribute("value",info.event.extendedProps.HORA_PRUEBA);
            }    
        });
        calendar.render();
    })

    //test.forEach(item=>console.log(`Tengo lo siguientes valores: ${item.title} con la fecha: ${item.start}`));

    
}
//si puedo sacar el id en los tests para poner en events
//https://fullcalendar.io/docs/event-object
//dayGridMonth