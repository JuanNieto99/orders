$(document).ready(function(){
  
    var table =  $('#customer-table').DataTable({
        //para cambiar el lenguaje a español
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                     },
                     "sProcessing":"Procesando...",
                }, 
                "ajax": {
                    "url":"publico/controlador/customerControler.php?case=list_customer"
                        
                   },  
                "scrollCollapse": true,
                "info":           true,
                "paging":         true,
                 "pageLength": 25,
                order: [[ 1, "desc" ]],
                 "columns":[
                    {"data": "number"},
                    {"data": "name"},
                    {"data": "birth_date"}, 
                    {"data": "phone"},
                    {"data": "city"},                   
                    {"data": "opcion"},
                 
                   
               
                ]  
        });     
      
            table.on('draw', function(){
             
            $(".eliminar").on('click', function(){
                 
                  var id = $(this).attr('data-control');
                  $.ajax({
                    url:'publico/controlador/customerControler.php',
                    type :'POST',
                    data : {'case':'delete','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data));  
                        swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
                        $('#customer-table').DataTable().ajax.reload();
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
               })
            $(".edit").on('click', function(){
                var id = $(this).attr('data-control');
                $("#idCustomer").val(id)
                $("#modaledit").modal('show');
                $.ajax({
                    url:'publico/controlador/customerControler.php',
                    type :'POST',
                    data : {'case':'edit_customer','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data)); 
                        var dataadjunto = data.adjunto;
                        $("#name_edit").val(dataadjunto.name)
                        $("#number_edit").val(dataadjunto.number)
                        $("#birth_day_edit").val(dataadjunto.birthday)
                        $("#phone_edit").val(dataadjunto.phone)

                        $("#city_edit > option[value='"+ dataadjunto.city_id +"']").attr("selected",true)
                    //    $("#city_edit").val(dataadjunto.phone)
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
            
            })
        })
})


$("#buttonCreate").click(function(){
    $("#modalsaveCustomer").modal('show');
})

$("#form-customer").submit(function(){
 
    $.ajax({
        url:'publico/controlador/customerControler.php',
        type :'POST',
        data : $('form[name="form-customer"]').serialize(),
        success:function(data)
        {
             
             data = JSON.parse(JSON.stringify(data)); 


             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             $('#customer-table').DataTable().ajax.reload();
             $("#modalsaveCustomer").modal('hide');
    
        },error:function(data)
        {
            alert('error')	
        } 

    })

    return false;
})

$("#form-customer-edit").submit(function(){
 
    $.ajax({
        url:'publico/controlador/customerControler.php',
        type :'POST',
        data : $('form[name="form-customer-edit"]').serialize(),
        success:function(data)
        {
             
             data = JSON.parse(JSON.stringify(data));  
             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             $('#customer-table').DataTable().ajax.reload();
             $("#modaledit").modal('hide');
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
    return false;
})

function  loadCity() {
    $.ajax({
        url:'publico/controlador/customerControler.php',
        type :'POST',
        data : {"case":"load_city"},
        success:function(data)
        {
             
             data = JSON.parse(JSON.stringify(data));  
             var html = data.adjunto
             $("#city").html(html)
             $("#city_edit").html(html)
        },error:function(data)
        {
            alert('error')	
        } 

    })
    return false;
}