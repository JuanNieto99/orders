$(document).ready(function(){
 
    var table =  $('#product-table').DataTable({
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
                    "url":"publico/controlador/productControler.php?case=list_product"
                        
                   },  
                "scrollCollapse": true,
                "info":           true,
                "paging":         true,
                 "pageLength": 25,
                order: [[ 1, "desc" ]],
                 "columns":[
                    {"data": "name"}, 
                    {"data": "amount"}, 
                    {"data": "value"}, 
                    {"data": "opcion"}
                ]  
        });     
      
            table.on('draw', function(){
             
            $(".eliminar").on('click', function(){
                 
                  var id = $(this).attr('data-control');
                  $.ajax({
                    url:'publico/controlador/productControler.php',
                    type :'POST',
                    data : {'case':'delete','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data));  
                        swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
                        $('#product-table').DataTable().ajax.reload();
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
               })
            $(".edit").on('click', function(){
                var id = $(this).attr('data-control');
                $("#id_edit").val(id)
                $("#modaledit").modal('show');
                $.ajax({
                    url:'publico/controlador/productControler.php',
                    type :'POST',
                    data : {'case':'edit_product','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data)); 
                        var dataadjunto = data.adjunto;
             
                        $("#price_edit").val(dataadjunto.value)
                        $("#cantidad_edit").val(dataadjunto.amount)
                        $("#description_edit").val(dataadjunto.name)
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
            
            })
        })
})


$("#buttonCreate").click(function(){
    $("#modalsaveProduct").modal('show');
})

$("#form-product").submit(function(){
 
    $.ajax({
        url:'publico/controlador/productControler.php',
        type :'POST',
        data : $('form[name="form-product"]').serialize(),
        success:function(data)
        { 
             data = JSON.parse(JSON.stringify(data)); 
             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             $('#product-table').DataTable().ajax.reload();
             $("#modalsaveProduct").modal('hide');
    
        },error:function(data)
        {
            alert('error')	
        } 

    })

    return false;
})

$("#form-product-edit").submit(function(){
 
    $.ajax({
        url:'publico/controlador/productControler.php',
        type :'POST',
        data : $('form[name="form-product-edit"]').serialize(),
        success:function(data)
        {
             
             data = JSON.parse(JSON.stringify(data));  
             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             $('#product-table').DataTable().ajax.reload();
             $("#modaledit").modal('hide');
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
    return false;
})