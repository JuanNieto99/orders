
$(document).ready(function(){
    
    var table =  $('#orders-table').DataTable({
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
                    "url":"publico/controlador/orderControler.php?case=list_order"
                        
                   },  
                "scrollCollapse": true,
                "info":           true,
                "paging":         true,
                 "pageLength": 25,
                order: [[ 1, "desc" ]],
                 "columns":[
                    {"data": "name_client"},
                    {"data": "price"},                           
                    {"data": "date"},
                    {"data": "delivery"},
                    {"data": "opcion"},
                   
                ]  
        });     
      
            table.on('draw', function(){
                
            $(".delivery").on('click', function(){                
                var id = $(this).attr('data-control');
                $.ajax({
                    url:'publico/controlador/orderControler.php',
                    type :'POST',
                    data : {'case':'delivery_order','id':id},
                    success:function(data)
                    {
                        
                        data = JSON.parse(JSON.stringify(data));  
                        swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
                        $('#orders-table').DataTable().ajax.reload();
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
            })
            $(".eliminar").on('click', function(){
                 
                  var id = $(this).attr('data-control');
                  $.ajax({
                    url:'publico/controlador/orderControler.php',
                    type :'POST',
                    data : {'case':'delete_order','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data));  
                        swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
                        $('#orders-table').DataTable().ajax.reload();
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
            })
            $(".edit").on('click', function(){
                var id = $(this).attr('data-control');
                $("#id_order_edit").val(id)
                loadOrderEdit(id)
                $("#idCustomer").val(id)
                $("#modaledit").modal('show');
                $.ajax({
                    url:'publico/controlador/orderControler.php',
                    type :'POST',
                    data : {'case':'edit_order','id':id},
                    success:function(data)
                    {
                         
                        data = JSON.parse(JSON.stringify(data)); 
                        var dataadjunto = data.adjunto;
                         
                        $("#cliente_edit > option[value='"+ dataadjunto.id_customer +"']").attr("selected",true)
                    //    $("#city_edit").val(dataadjunto.phone)
                    },error:function(data)
                    {
                        alert('error')	
                    } 
            
                })
            
            })
        })
})


$("#order-add").submit(function(){        
    $.ajax({
        url:'publico/controlador/orderControler.php',
        type :'POST',
        data : $('form[name="order-add"]').serialize(),
        success:function(data)
        {
            data = JSON.parse(JSON.stringify(data)); 
            var id =  data.adjunto;
            $("#id_order").val(id)
             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             loadOrder(id);
             $('#orders-table').DataTable().ajax.reload();
 
       
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
    return false;
})

function loadOrder(id) {
    
    $.ajax({
        url:'publico/controlador/orderControler.php',
        type :'POST',
        data : {'case':'loadOrder','id':id} ,
        success:function(data)
        {
             
            data = JSON.parse(JSON.stringify(data)); 
            var html =  data.adjunto[0];
            var price =  data.adjunto[1];
            $("#price").html(price)
            $("#productData").html(html)
             
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
}

$("#buttonCreate").click(function(){
    $("#modalOrder").modal('show');
    $("#price").html("")
    $("#productData").html("")
    $("#id_order").val("")
})

function deleteProductDetail(this_){
    var id = this_.getAttribute('data-control');
    var id_order = this_.getAttribute('data-order');
    
    $.ajax({
        url:'publico/controlador/orderControler.php',
        type :'POST',
        data : {'case':'deleteDetailOrder','id':id,"id_order":id_order} ,
        success:function(data)
        {
            $('#orders-table').DataTable().ajax.reload();
            data = JSON.parse(JSON.stringify(data)); 
            swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
          
            loadOrder(id_order)
            loadOrderEdit(id_order)
           
        },error:function(data)
        {
            alert('error')	
        } 
    })
}

$("#cliente").change(function(){
    var id_order = $("#id_order").val()
    var cliente = $("#cliente").val()
 
    if(id_order!=""){
        $.ajax({
            url:'publico/controlador/orderControler.php',
            type :'POST',
            data : {'case':'updateClient','id':id_order,"id_client":cliente} ,
            success:function(data)
            {
                 
                data = JSON.parse(JSON.stringify(data)); 
                swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
           
                $('#orders-table').DataTable().ajax.reload();
            },error:function(data)
            {
                alert('error')	
            } 
        })
    }
})

$("#cliente_edit").change(function(){
    var id_order = $("#id_order_edit").val()
    var cliente = $("#cliente_edit").val()
 
    if(id_order!=""){
        $.ajax({
            url:'publico/controlador/orderControler.php',
            type :'POST',
            data : {'case':'updateClient','id':id_order,"id_client":cliente} ,
            success:function(data)
            {
                 
                data = JSON.parse(JSON.stringify(data)); 
                swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
                $('#orders-table').DataTable().ajax.reload();
        
            },error:function(data)
            {
                alert('error')	
            } 
        })
    }
})

function loadOrderEdit(id) {
    
    $.ajax({
        url:'publico/controlador/orderControler.php',
        type :'POST',
        data : {'case':'loadOrder','id':id} ,
        success:function(data)
        {
             
            data = JSON.parse(JSON.stringify(data)); 
            var html =  data.adjunto[0];
            var price =  data.adjunto[1];
            $("#price_edit").html(price)
            $("#productData_edit").html(html)
             
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
}

$("#order-edit").submit(function(){
    $.ajax({
        url:'publico/controlador/orderControler.php',
        type :'POST',
        data : $('form[name="order-edit"]').serialize(),
        success:function(data)
        {
             
            data = JSON.parse(JSON.stringify(data)); 
            var id =  data.adjunto;
            $("#id_order").val(id)
             swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
             loadOrderEdit(id);
             $('#orders-table').DataTable().ajax.reload();
       
    
        },error:function(data)
        {
            alert('error')	
        } 

    })
    return false;
})