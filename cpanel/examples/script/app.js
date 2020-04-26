$(document).ready(() => {
    let btn = $("#changePsd");
    let url = "traitement/modPass.php"
    btn.click((e) => {
        e.preventDefault();

        $.ajax({
            url: url,
            type: "POST",
            data: $(".changePsd").serialize(),
            success: (data) => {
                $(".psdChange").html(data);
                $(".psdChange").reset();
            },
            error: (err) => {
                $(".psdChange").html(err);
            }
        })
    })
});