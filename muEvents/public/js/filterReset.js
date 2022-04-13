//azzera il contenuto dei campi con cui filtrare

$(function () {
    $('#azzera').on('click', function (e) {
        $("#description,#date").each(function () {
            this.value = "";
        });
        //nella select pone come elemento selezionato quello di default (valore "")
        $("#organizer option[value=''],#region option[value='']").prop('selected', true);
    });
});
