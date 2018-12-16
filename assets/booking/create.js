$(document).ready(
    function () {
        $('#departureDate').datepicker({
            'dateFormat':'yy-mm-dd'
        });
        $(document)
            .on('click', 'form button[type=submit]', function (e) {
                if (!isValid()) {
                    e.preventDefault();
                }
            });
    }
);

function isValid() {
    let errorMessage = "";

    let departureDate = $('#departureDate').prop('value');
    if (departureDate === "") {
        errorMessage = 'La fecha de salida no puede estar vacia<br/>';
    }
    let departure = $('#departure').prop('value');
    if (departure === "") {
        errorMessage += 'La ciudad de salida no puede estar vacia<br/>';
    }
    let destination = $('#destination').prop('value');
    if (destination === "") {
        errorMessage += 'La ciudad de llegada no puede estar vacia<br/>';
    }
    if (destination === departure) {
        errorMessage += 'La ciudad de salida debe ser distinta a la ciudad de llegada<br/>';
    }
    if (errorMessage !== "") {
        $("#errorMessage p").html(errorMessage);
        $("#errorMessage").show();
        $("#successMessage").hide();
        return false;
    }
    return true;
}