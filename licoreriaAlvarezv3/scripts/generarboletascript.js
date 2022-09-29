function seleccionar(i,fechaproforma,horaproforma){

    var resultado = validarfecha(fechaproforma,horaproforma);

    if(resultado==0){

        alert("La proforma ha caducado");
    }
    else{

        var serie = document.getElementById("serie"+i).innerHTML;
        var cliente = document.getElementById("cliente"+i).innerHTML;
        var totalboleta = 0;

        var fecha = new Date();
            var dia=fecha.getDate();
            var mes=fecha.getMonth()+1;
            var anio=fecha.getFullYear();
            var hora=fecha.getHours();
            var minuto=fecha.getMinutes();
            var segundo=fecha.getSeconds();
            if(dia<10){
                dia="0"+dia;
            }
            if(mes<10){
                mes="0"+mes;
            }
            if(hora<10){
                hora="0"+hora;
            }
            if(minuto<10){
                minuto="0"+minuto;
            }
            if(segundo<10){
                segundo="0"+segundo;
            }	

        

        var idproforma = i;

        $.post("getBoleta.php",{idproforma:idproforma},function(resultado){

            if(resultado==false){

                alert("error");
            }
            else{

                document.getElementById("Ventana").innerHTML = '';

                console.log(resultado);
                var json = JSON.parse(resultado);

                var tabla=
                '<head>'+
                    '<link rel="stylesheet" href="../css/style.css">'+
                '</head>'+
                '<body>'+
                '<div id="boleta">'+
                '<h3 align="center">BOLETA</h3>'+
                '<div id="idproforma" style="display:none">'+idproforma+'</div>'+
                '<table>'+
                '<tr>'+
                    '<td>Cliente</td>'+
                    '<td>Serie</td>'+
                '</tr>'+
                '<tr>'+
                    '<td><label id="ClienteBoleta">'+cliente+'</label></td>'+
                    '<td><label id="SerieBoleta">'+serie+'</label></td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Estado</td>'+
                    '<td>Fecha</td>'+
                    '<td>Hora</td>'+
                    '<td>Tipo de pago</td>'+
                '</tr>'+
                '<tr>'+
                    '<td><label>Por Despachar</label></td>'+
                    '<td><label id="fecha">'+anio+"-"+mes+"-"+dia+'</label></td>'+
                    '<td><label id="hora">'+hora+":"+minuto+":"+segundo+'</label></td>'+
                    '<td><select id="tipodepago">'+
                            '<option>Seleccionar</option>'+
                            '<option>Efectivo</option>'+
                            '<option>Tarjeta</option>'+
                        '</select>'+
                    '</td>'+
                '</tr>'+	
            '</table>';
            
            tabla +=
            '<br>'+
            '<table name="tablaemer">'+
            '<tbody>'+
            '<thead>'+
                '<tr>'+
                    '<td>Codigo</td>'+
                    '<td>Cantidad</td>'+
                    '<td>Descripcion</td>'+
                    '<td>P.U</td>'+
                    '<td>Monto</td>'+
                '</tr>'+
            '</thead>';

            var i = 0;
					for(var item of json){

                        tabla+=
                        '<tr>'+
                            '<td>'+item.codigo+'</td>'+
                            '<td>'+item.cantidad+'</td>'+
                            '<td>'+item.descripcion+'</td>'+
                            '<td>'+item.precio+'</td>'+
                            '<td>'+item.monto+'</td>'+
                        '</tr>';
                        
                        totalboleta += parseFloat(item.monto);
                        i++;
                    }
            tabla+=        
            '</tbody>'+
            '</table>'+
            '<br>'+
            '<div><label>Total: </label> S/ <label id="totalboleta">'+totalboleta+'</label></div>'+
            '</div>'+
            '<br>'+
            '<div>'+
                '<button onclick="emitir()">Emitir boleta</button>'+
                '<button onclick="volver()">Atras</button>'+
            '</div>';
            document.getElementById("Ventana").innerHTML = tabla;
            document.getElementById("Ventana").style.display="block";
            }
            
        });

    }
    
}

function buscar(){

    var dato = document.getElementById("dato").value;    
    var tipo = document.getElementById("seleccionar").value;

    //console.log(dato);

    if(tipo=="Seleccionar"){

        alert("Elija el tipo de busqueda");
    }
    else if(document.getElementById("dato").value==""){

        alert("Ingrese valor para buscar");

    }
    else if(tipo=="Cliente" && dato.length<3){

    

        alert("Nombre del cliente muy corto");
        
        
       		 
    }
    else if(tipo=="Serie" && dato.length!=15){

        alert("Ingrese serie correcta")

    }
    else{

        var datos=[{"tipo":tipo,"dato":dato}];
        jdatos = JSON.stringify(datos);

        $.post("getProforma.php",{jdatos:jdatos},function(resultado){

            if(resultado==false){

                alert("error");
            }
            else{

                console.log(resultado);
                var json=JSON.parse(resultado);
                console.log(json);

                var tabla=      
                        '<head>'+
                        '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"></link>'+
                        '<link rel="stylesheet" href="../css/style.css">'+
                        '</head>'+
                                '<body>'+	
                                '<div align="center">'+
                                '<table name="tabla1" >'+
								  '<thead>'+
								  	'<td width="87">Serie</td>'+
									'<td width="87">Nombre del Cliente</td>'+
									'<td width="36">Estado</td>'+
									'<td width="177">Monto</td>'+
									'<td width="39">Accion</td>'+
								  '</thead>';
					var i = 0;
					for(var item of json){
					
                    if(item.estado==0){

                        var estado="Por atender";
                    }
					 tabla+='<tr>'+
					 			'<td id="serie'+item.idproforma+'">'+item.serie+'</td>'+
								'<td id="cliente'+item.idproforma+'">'+item.cliente+'</td>'+
								'<td id="estado'+item.idproforma+'">'+estado+'</td>'+
								'<td id="monto'+item.idproforma+'">'+item.monto+'</td>'+
                                '<td><button name="Agregar" onclick="seleccionar('+item.idproforma+',\''+item.fecha+'\',\''+item.hora+'\')"><i class="material-icons">add_task</i></button></td>'+
                                '</tr>';
                                i++;		 
                            }
                            tabla+='</table>'+
                                    '<form  method="post" action="../moduloSeguridad/getUsuario.php"> <input type="submit" name="btnvolvermenu" value="Volver" /></form>'+
                                    '</div>'+
                                    '</body>';  
                            
                    document.getElementById("contentproformas").innerHTML=tabla;         

            }

        });


    }

}

function volver(){

    document.getElementById("Ventana").style.display="none";

}

function validarfecha(fechaproforma,horaproforma){

    var fecha = new Date();
    var dia=fecha.getDate();
    var mes=fecha.getMonth()+1;
    var anio=fecha.getFullYear();
    var hora=fecha.getHours();
    var minuto=fecha.getMinutes();
    var segundo=fecha.getSeconds();
    

    var splfechas = fechaproforma.split("-");
    var spl = horaproforma.split(":");
    var tiempominutoproforma = parseInt(spl[0])*60+parseInt(spl[1])+parseInt(splfechas[0])*525600+parseInt(splfechas[1])*43800+parseInt(splfechas[2])*1440;
    var tiempominutosistema = hora*60+minuto+anio*525600+mes*43800+dia*1440;

    console.log(tiempominutoproforma+"///"+tiempominutosistema);
    
    
    if(tiempominutosistema-tiempominutoproforma<=120){

        return 1;
    }
    else{

        return 0;
    }
            
}

function emitir(){

    

    var tipo = document.getElementById("tipodepago").value;

    if(tipo == "Seleccionar"){

        //insertardetalleboleta();
        
        alert("Seleccione el tipo de pago");
    }
    else{

        rc=confirm("Desea emitir boleta?");

        if(rc==true){

            var serie = document.getElementById("SerieBoleta").innerHTML;
            var fecha = document.getElementById("fecha").innerHTML;
            var hora = document.getElementById("hora").innerHTML;
            var cliente = document.getElementById("ClienteBoleta").innerHTML;
            

            console.log(serie+" "+fecha+" "+hora+" "+cliente+""+tipo);

            var datos = [{"serie":serie,"fecha":fecha,"hora":hora,"cliente":cliente,"tipo":tipo}];

            var jsonboleta = JSON.stringify(datos);

            $.post("getBoleta.php",{jsonboleta:jsonboleta},function(resultado){

                if(resultado==false){

                    alert("Error");
                }
                else{

                    if(resultado=="ok"){

                        insertardetalleboleta();

                        


                    }
                    console.log(resultado);
                }
            });

        }
        
    }
}

function insertardetalleboleta(){

    var monto = document.getElementById("totalboleta").innerHTML;
    var serie = document.getElementById("SerieBoleta").innerHTML;
    var idproforma = document.getElementById("idproforma").innerHTML;

    var datos = [{"monto":monto,"serie":serie,"idproforma":idproforma}];

    jsondetalleboleta = JSON.stringify(datos);

    $.post("getBoleta.php",{jsondetalleboleta:jsondetalleboleta},function(resultado){

        if(resultado==false){

            alert("error");
        }
        else{

            console.log(resultado);

            if(resultado=="ok"){

              actualizarproforma();  
            }
            else
            {
                alert("Error al insertar detalle de boleta");
            }

        }

    });
}

function actualizarproforma(){

    var idproformaActualizar = document.getElementById("idproforma").innerHTML;

    $.post("getBoleta.php",{idproformaActualizar:idproformaActualizar},function(resultado){

        if(resultado==false){

            alert("error");
        }
        else{

            console.log(resultado);

            if(resultado=="ok"){

                actualizarstock();

            }
        }
    });

}

function actualizarstock(){

    var idActualizar = document.getElementById("idproforma").innerHTML;

    $.post("getProducto.php",{idActualizar:idActualizar},function(resultado){

        if(resultado==false){

            alert("error");
        }
        else{

            console.log(resultado);
            if(resultado == "ok"){

                savepdf();
                alert("Boleta emitida con exito");
                location.reload();
            }else{
                alert("error actualizando el stock de productos");
            }
        }
    });
}

function savepdf(){
	
    const $elementoParaConvertir = document.getElementById("boleta"); 
    html2pdf().set({
            margin: 1,
            filename: 'boleta.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3, 
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a4",
                orientation: 'portrait' 
            }
        })
        .from($elementoParaConvertir)
        .save()
        .catch(err => console.log(err));

}