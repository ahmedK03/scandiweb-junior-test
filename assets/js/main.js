$("document").ready(function () {
  $("#productType").change(function () {
    const selectedType = $(this).find(":selected").val();
    console.log(selectedType);
    showProductTypeInputs(selectedType);
  });
});

function showProductTypeInputs(type) {
  //   hide all form elements
  $(".product-type_inputs .form-group").addClass("d-none");
  // make sure that the initail input values are not disabled
  $(".product-type_inputs .form-group input").prop("disabled", false);
  // selected the preferred type parameter
  if (type) {
    // add d-none to none-selected types
    $(".product-type_inputs .form-group")
      .not(`#${type}.form-group`)
      .addClass("d-none");
    //   disable none selected inputs
    $(".product-type_inputs .form-group input")
      .not(`#${type}.form-group input`)
      .prop("disabled", true);
    //   show selected inputs
    $(`#${type}.form-group`).removeClass("d-none").addClass("d-block");
  }
}
