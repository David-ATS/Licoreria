

var lista=[];
function agregar(i){
	var idproducto = document.getElementById("idproducto" + i).innerHTML;
	var codigo = document.getElementById("codigo" + i).innerHTML;
	var stock = document.getElementById("stock" + i).innerHTML;
	var descripcion = document.getElementById("descripcion" + i).innerHTML;
	var precio = document.getElementById("precio" + i).innerHTML;
	var cantidad = document.getElementById("cantidad" + i).value;
	var total = cantidad*precio;
	var div = document.getElementById("contentproductoslista");
	
	var resultado=0;
	for(var i = 0 ; i<lista.length;i++){
		if(lista[i].codigo==codigo){
			resultado = 1;
		}
	}
	
	if(cantidad.length==0 ||cantidad<=0 || cantidad%1!=0){
		alert("ingrese cantidad correcta");
				
	}
	else if(resultado==1){

			alert("el producto ya existe en la lista");
	}
	
	else if(parseInt(cantidad)>parseInt(stock)){
			console.log(cantidad, stock);
			alert("la cantidad excede al stock");
	}
	else{
				              //0       1        2         3         4        5       6
			//console.log(idproducto, codigo , stock, descripcion, precio, cantidad, total);
			console.log(cantidad, stock);
			lista.push({"idproducto": idproducto,"codigo": codigo ,"stock": stock, "descripcion": descripcion, "precio": precio,"cantidad": cantidad,"total": total});	
			hacertabla();
	}
	
}

function hacertabla(){
	
	//var tabla="<table width="+444+" border="+1+" cellpadding="+5+" align="'right'">"+
	//			"<tbody>"+
	var tabla =	"<thead>"+
				"<tr>"+
					"<td>Descripci�n</td>"+
					"<td>Cantidad</td>"+
					"<td>Total</td>"+
					"<td>Acciones</td>"+
				"</tr>"+
				"</thead>";
				  //0       1          2         3        4       5
	//console.log(codigo , stock, descripcion, precio, cantidad, total);
	//var codigo="";
	for(var i=0;i<lista.length;i++){
		//codigo=lista[i][0];
		tabla+='<tr>'+
				'<td>'+lista[i].descripcion+'</td>'+
				'<td id="celdacantidadlista'+i+'">'+lista[i].cantidad+'</td>'+
				'<td id="totalcelda'+i+'">'+lista[i].total+'</td>'+
				'<td><button onclick="eliminar(\''+lista[i].codigo+'\')">Delete</button><button id="btneditar'+i+'" onclick="editar(\''+lista[i].codigo+'\','+i+')">Edit</button><button id="btnsave'+i+'" onclick="save(\''+lista[i].codigo+'\','+i+')" disabled="true">Save</button></td>'+
			   '</tr>';
	}
		//tabla+="</table>";
	
	document.getElementById("tbodyproductoslista").innerHTML=tabla;
	
}


function emitir(){
	var rc = confirm("�Desea emitir la proforma?");
	if(rc){
		insertarproforma();
		
	}
	
}


function insertarproforma(){
	
	var serie=document.getElementById("serie").innerHTML;
	var cliente=document.getElementById("txtcliente").value;
	var fecha = document.getElementById("fecha").innerHTML;
	var hora = document.getElementById("hora").innerHTML;
	var datos=[{
				"serie":serie,
				"cliente":cliente,
				"fecha":fecha,
				"hora":hora
			  }];
	var jsondatos=JSON.stringify(datos);
	console.log(jsondatos);
	$.get("getProforma.php",{jsondatos:jsondatos},function(resultado){
		
			if(resultado==false){
				alert("error");	
			}
			else{
				console.log(resultado);
				if(resultado=="ok"){
					
				 insertardetalle();
				
				}
				
			}
		
		});

}


function insertardetalle(){
	var serie=document.getElementById("serie").innerHTML;
	var json=JSON.stringify(lista);
	console.log(json);
	$.get("getProforma.php?i="+serie,{json:json},function(resultado){
		
			if(resultado==false){
				alert("error");	
			}
			else{
				console.log(resultado);
				if(resultado=="ok"){
				 
				 savepdf();
				 atras();
				 alert("La proforma se emiti� con �xito");
				 location.reload();
				}
			}
		
		});

}

function generarserie(){

	var id="";
	const caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	for(var i=0;i<15;i++){
		id+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));
	}
	return id;
}

function visualizarProforma(){
	var cliente = document.getElementById("txtcliente").value;
	if(lista.length==0){
		alert("No hay productos en lista");
	}else if(cliente.length==0){
		alert("Ingrese nombre del cliente");
	}
	else{
		
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
		
		var proforma='<div id="contenedor">'+
					 '<div id="proforma">'+
						'<h3 align="center">PROFORMA</h3>'+
						'<div id="datos">'+
						'<table border="0">'+
						'<tr><td><label>Cliente: </label><div>'+cliente+'</div></td><td><label>Serie: </label><div id="serie">'+generarserie()+'</div></td></tr>'+
						'<tr><td><label>Fecha: </label><div id="fecha">'+anio+'-'+mes+'-'+dia+'</div></td><td><label>Hora de emisi�n: </label><div id="hora">'+hora+':'+minuto+':'+segundo+'</div></td></tr>'+
						'</table>'+
						'</div>'+
						'<br>'+
						'<div id="tabla">'+
						//			   <!-- 0       1          2         3        4       5 -->
						//console.log(codigo , stock, descripcion, precio, cantidad, total);-->
							'<table width="100%" border="1">'+
							'<tbody>'+
							  '<thead>'+
							  '<tr>'+
								'<td>C�digo</td>'+
								'<td>Descripci�n</td>'+
								'<td>Cantidad</td>'+
								'<td>P.U</td>'+
								'<td>Monto</td>'+
							  '</tr>'+
							  '</thead>';
							 
							  
							  var totalproforma=0;
							  for(var i=0;i<lista.length;i++)
							  {
								
								proforma+='<tr>'+
											'<td>'+lista[i].codigo+'</td>'+
											'<td>'+lista[i].descripcion+'</td>'+
											'<td>'+lista[i].cantidad+'</td>'+
											'<td>'+lista[i].precio+'</td>'+
											'<td>'+lista[i].total+'</td>'+
											'</tr>';				
									totalproforma += lista[i].total;	
							  }
							  
								  
								proforma+='</tbody></table>'+
								'</div>'+
								'<br>'+
								'<div><label>Total:</label> S/ '+totalproforma+'</div>'+
								'</div>'+
								'<div id="botones1">'+
								'<button onclick="atras()">Atras</button><button onclick="emitir()">Emitir Proforma</button>'+
								'</div>'+
								
								'</div>';
		document.getElementById("ventana").innerHTML=proforma;
		document.getElementById("ventana").style.display="block";			
	}

}

function atras(){
	document.getElementById("ventana").style.display="none";		
}


function listarproductos(){
	var descripcion = document.getElementById("txtproducto").value;
	//if(descripcion.length==0){
	//	alert("ingrese descripcion del producto buscado");
	//}else
	//{
		//alert("que fue");
		var xhttp = new XMLHttpRequest();
		xhttp.open('GET','http://localhost/licoreriaAlvarezv3/moduloVentas/getProducto.php?q='+descripcion,true);
		xhttp.send();
		xhttp.onreadystatechange = function(){
				if(this.readyState==4 && this.status==200){
					var json = JSON.parse(this.responseText);
					console.log(json);
					
					var tabla='<table width="534" border="1" cellpadding="5" align="left">'+
								 '<tbody>'+	
								  '<tr>'+
								  	'<td width="87">id.Producto</td>'+
									'<td width="87">C&oacute;d.Producto</td>'+
									'<td width="36">Stock</td>'+
									'<td width="177">Descripci&oacute;n</td>'+
									'<td width="39">Precio</td>'+
									'<td width="55">Cantidad</td>'+
									'<td width="52">Agregar</td>'+
								  '</tr>';
					var i = 0;
					for(var item of json){
						console.log(item.precio);
					 tabla+='<tr>'+
					 			'<td id="idproducto'+i+'">'+item.idproducto+'</td>'+
								'<td id="codigo'+i+'">'+item.codigo+'</td>'+
								'<td id="stock'+i+'">'+item.stock+'</td>'+
								'<td id="descripcion'+i+'">'+item.descripcion+'</td>'+
								'<td id="precio'+i+'">'+item.precio+'</td>'+
								'<td><input  size="1" type="number"  min="1" id="cantidad'+i+'"/></td>'+
								'<td><button onclick="agregar('+i+')">+</button></td>'+
							 '</tr>';
						i++;		 
					}
					tabla+="</tbody></table>";
					document.getElementById("contentproductos").innerHTML=tabla;
				}
				
			}
		
		
	//}
	
}



function eliminar(codigo){
	//alert(""+codigo);
	var rc = confirm("�Desea eliminar producto?");
	//console.log(rc);
	if(rc){
	console.log("funcionando"+codigo);
	for(var i =0;i<lista.length;i++){
		if(lista[i].codigo==codigo){
			lista.splice(i,1);
		}	
	}
	hacertabla();	
	}
	
}

function editar(codigo,i){
	console.log("funcionando");
	var cantidadcelda = document.getElementById("celdacantidadlista"+i);
	var cantidad = document.getElementById("celdacantidadlista"+i).innerHTML;
	
	
	cantidadcelda.innerHTML='<input id="cantidadlista'+i+'" size="1" width="50px" type="number"  min="1" value="'+cantidad+'"/>';
	document.getElementById("btneditar"+i).disabled=true;
	document.getElementById("btnsave"+i).disabled=false;
}

function save(codigo,i){
	
	console.log("funcionando");
	
	var cantidadcelda = document.getElementById("celdacantidadlista"+i);
	var totalcelda = document.getElementById("totalcelda"+i);
	var cantidad = document.getElementById("cantidadlista"+i).value;
	var stock=0;
	for(var j =0;j<lista.length;j++){
		if(lista[j].codigo==codigo){
			stock = lista[j].stock;
		}	
	}
	
	if(cantidad.length==0 ||cantidad<=0 || cantidad%1!=0){
		alert("ingrese cantidad correcta");
				
	}
	else if(parseInt(cantidad)>parseInt(stock)){
			//console.log(cantidad, stock);
			alert("la cantidad excede al stock");
	}
	else{
						//0       1          2         3        4       5
		//console.log(codigo , stock, descripcion, precio, cantidad, total);
		console.log(cantidad, stock);
		for(var j =0;j<lista.length;j++){
			if(lista[j].codigo==codigo){
				lista[j].cantidad=cantidad;
				lista[j].total=cantidad*lista[j].precio;
				totalcelda.innerHTML=""+lista[j].total;
			}	
		}
		cantidadcelda.innerHTML=""+cantidad;
		document.getElementById("btneditar"+i).disabled=false;
		document.getElementById("btnsave"+i).disabled=true;
	}
	
	
	
}

function savepdf(){
	
			const $elementoParaConvertir = document.getElementById("proforma"); // <-- Aqu� puedes elegir cualquier elemento del DOM
			html2pdf().set({
					margin: 1,
					filename: 'proforma.pdf',
					image: {
						type: 'jpeg',
						quality: 0.98
					},
					html2canvas: {
						scale: 3, // A mayor escala, mejores gr�ficos, pero m�s peso
						letterRendering: true,
					},
					jsPDF: {
						unit: "in",
						format: "a4",
						orientation: 'portrait' // landscape o portrait
					}
				})
				.from($elementoParaConvertir)
				.save()
				.catch(err => console.log(err));

}




