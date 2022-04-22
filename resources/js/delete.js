$(window).on("load", function () {
    $("body").on('click', '.submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Você tem certeza ?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Sim, exclua-o!",
            cancelButtonText: "Não, cancele!",
        }).then((result) => {
            if (result.isConfirmed) {
                var $this = $(this);
                document.getElementById("formLaravel" + $this.attr("idform")).submit();
            }
        })
    });

    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function submitForm(btn) {
    btn.disabled = true;
    btn.form.submit();
    return false;
}
