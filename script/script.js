$(document).ready(() => {
  $(".btn-link").click((e) => {
    e.preventDefault();
    let url = "traitement.php";
    let elements = [
      ".error_nom",
      ".error_prenom",
      ".error_tel",
      ".error_email",
      ".error_pays",
      ".error_ville",
      ".error_msg",
    ];
    $.ajax({
      type: "POST",
      url: url,
      data: $("form").serialize(),
      success: function (data) {
        let result = JSON.parse(data);

        if (!result.success) {
          let errors = result.errors;
          $(".msg_success").html("");
          $(".error_nom").html(errors.errorNom);
          $(".error_prenom").html(errors.errorPrenom);
          $(".error_tel").html(errors.errorTelephone);
          $(".error_email").html(errors.errorEmail);
          $(".error_pays").html(errors.errorPays);
          $(".error_ville").html(errors.errorVille);
          $(".error_msg").html(errors.errorMessage);
        } else {
          let inputs = $("input");
          elements.forEach((el) => {
            $(el).html("");
          });

          for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
          }

          $("select")[0].selectedIndex = 0;
          $("textarea")[0].value = "";


          $(".msg_success").html(result.success);
        }
      },
      error: function () {
        alert("error");
      },
    });
  });
});
