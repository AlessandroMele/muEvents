//pop-up di conferma in caso di eliminazione 

$(function () {
    $('.delete').on('submit', function () {
        return confirm("Sei sicuro di confermare?");
    });
});

