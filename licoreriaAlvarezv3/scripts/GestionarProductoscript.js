
function limpiar(){

	document.getElementById("NombreProducto").value="";
	document.getElementById("Precio").value="";
	document.getElementById("Stock").value="";	
}
 
function guardarProducto(n){

	var producto=[];
	var codigo = "cod00"+n;
	var nombre = document.getElementById("NombreProducto").value;
	var precio = document.getElementById("Precio").value;
	var stock = document.getElementById("Stock").value;
	
	var resultado=0

	for(var i=0;i<n;i++){

		if (document.getElementById("descripcion"+i)!=null) {

			if (nombre==document.getElementById("descripcion"+i).innerHTML) {

				resultado = 1;
				
			}
			
		}

	}
	
	if(nombre.length > 6 && precio > 0 && stock > 0 && stock%1 == 0){

		if(resultado==0){

			producto.push(codigo, nombre, precio, stock);	
			//window.location.href = "controllerGestionarProducto.php?producto ="+producto;

			var jsonProducto = JSON.stringify(producto);
			$.post("getProducto.php",{arrayProductos:jsonProducto},function(data){

				if(data==false){

					alert("error");

				}else{
					if(data=="ok"){
						alert("Se ha guardado el producto correctamente");
						location.reload();
					}else{
						alert("El producto no se ha guardado correctamente");
					}
					
					

				}

			

	
			});

		}
		if(resultado==1){

			alert("Este producto ya existe en el sistema");
		}


		
		
	}
	else{

		alert("Datos no validos");
	}
	

	//alert(producto[0]);

}

function editar(i){

	var stock = document.getElementById("stock" + i).innerHTML;
	var descripcion = document.getElementById("descripcion" + i).innerHTML;
	var precio = document.getElementById("precio" + i).innerHTML;
	var codigo = document.getElementById("codigo"+i).innerHTML;

	document.getElementById("Ventana").style.display="block";

	document.getElementById("NombreProductoActualizar").value=descripcion;
	document.getElementById("PrecioActualizar").value=precio;
	document.getElementById("StockActualizar").value = stock;
	document.getElementById("codigoActualizar").innerHTML =codigo;
	
}

function actualizar(){


	var arrayProductos=[]
	var stock = document.getElementById("StockActualizar").value;
	var nombre = document.getElementById("NombreProductoActualizar").value;
	var precio = document.getElementById("PrecioActualizar").value;
	var codigo = document.getElementById("codigoActualizar").innerHTML;

	if(nombre.length > 6 && precio > 0 && stock > 0 && stock%1 == 0){


		arrayProductos.push(codigo, nombre, precio, stock);	

		var jsonProductoActualizar = JSON.stringify(arrayProductos)
		$.post("getProducto.php",{arrayProductosActualizar:jsonProductoActualizar},function(data){

			if(data==false){

				alert("error");

			}else{
				if(data=="ok"){
					alert("Se ha actualizado el producto correctamente");
					
					location.reload();
				}else{
					alert("Error al actualizar producto");
				}
				
				

			}

		});

		
	}
	else{

		alert("Datos no validos");
	}
}

function Volver(){

	document.getElementById("Ventana").style.display="none";
}