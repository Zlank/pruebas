function validateAnyo(anyo)
{

    var anyoActual = (new Date()).getFullYear();

    if (anyo.value.match(/^[12][09]\d{2}$/) && Number(anyo.value) <= anyoActual) {
        return true;
    }

    alert("El año debe ser correcto. Entre 1900 y " + anyoActual);
    return false;
}
