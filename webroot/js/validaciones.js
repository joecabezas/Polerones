//Contiene las funciones javascript especialmente desarrolladas para la aplicacion

function validaFormulario(form)
{
	
	if(Empty(form.nombre.value)) // Pregunta si el campo nombre viene vacio
	{
		alert('Ingrese su nombre');  // Si viene vacio envia un alerta
		form.nombre.focus(); // Pone el cursor en el campo validado
		return false; // Detine el envio del formulario
	}
	
	if(!isRut(form.rut.value)) // Pregunta si el campo viene vacio y ademas que sea un RUT válido
	{
		alert('Ingrese su RUT')	 // Si viene vacio o no es RUT válido envia un alerta
		form.rut.focus(); // Pone el cursor en el campo validado
		form.rut.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	if(!isRut(form.rut2.value+'-'+form.digito.value)) // Pregunta si el campo rut2 más el campo digito forman un RUT valido
	{
		alert('Ingrese su RUT')	 // Si viene alguno vacio o no forman un RUT válido envia un alerta
		form.rut2.focus(); // Pone el cursor en el campo validado
		form.rut2.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	if(!isInteger(form.fono.value)) // Valida que el campo sea númerico
	{
		alert('Ingrese su teléfono') // Si viene vacio o con letras envia un alerta
		form.fono.focus(); // Pone el cursor en el campo validado
		form.fono.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	if(!isMail(form.mail.value)) // Valida que no venga vacio y sea un e-mail válido 
	{
		alert('Ingrese su e-mail')  // Si no es valido envia un alerta
		form.mail.focus(); // Pone el cursor en el campo validado
 		form.mail.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	if(!isURL(form.url.value)) // Valida que no venga vacio y sea una URL válida 
	{
		alert('Ingrese una URL válido')  // Si no es valido envia un alerta
		form.url.focus(); // Pone el cursor en el campo validado
 		form.url.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	
	if(!isDate(form.fecha.value)) // Valida que no venga vacio y sea una fecha válida en formato dd/mm/aaaa
	{
		alert('Ingrese una fecha válida en formato dd/mm/aaaa')  // Si no es valido envia un alerta
		form.fecha.focus(); // Pone el cursor en el campo validado
 		form.fecha.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	if(!isAlpha(form.alfabetico.value)) // Valida que no venga vacio y contenga solo caracteres alfabeticos
	{
		alert('Ingrese solo caracteres alfabeticos')  // Si no es valido envia un alerta
		form.alfabetico.focus(); // Pone el cursor en el campo validado
 		form.alfabetico.select(); // Selecciona el texto ingresado en el campo
		return false; // Detine el envio del formulario
	}
	
	
	sw=0;
	for (i=0;i<form.radiobutton.length && sw==0;i++) {
		if (form.radiobutton[i].checked) sw=1;
	}
	if (!sw) {
		alert('Seleccione una opción');
		form.radiobutton[0].focus();
		return false;
	}
	
	
	if(!isSelected(form.ciudad)) // Valida que se seleccione una opcion del pulldown
	{
		alert('Seleccione una ciudad') // Si no es valido envia un alerta
		form.ciudad.focus(); // Pone el cursor en el campo validado
		return false;
	}
	
	if(!isSelected(form.comuna)) // Valida que se seleccione una opcion con un value distinto a '0'
	{
		alert('Seleccione una comuna') // Si no es valido envia un alerta
		form.comuna.focus(); // Pone el cursor en el campo validado
		return false; // Detine el envio del formulario
	}
	
	
return; // Si pasa todas las validaciones el formulario se envia.

}


