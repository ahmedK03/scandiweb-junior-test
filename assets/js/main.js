$("document").ready(function () {
  $("#productType").change(function () {
    const selectedType = $(this).find(":selected").val();
    const typeId = $(this).find(":selected").attr("data-id");
    showAdditionalProductInputs(selectedType, typeId);
  });
});

function showAdditionalProductInputs(type, id) {
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
    //   disable none-selected inputs
    $(".product-type_inputs .form-group input")
      .not(`#${type}.form-group input`)
      .prop("disabled", true);
    //   show selected inputs
    $(`#${type}.form-group`).removeClass("d-none").addClass("d-block");
    // assign val to the product type id hidden input
    $("#typeId").val(id);
  }
}

function skuChecker(sku) {
  $.ajax({
    url: "requests/requests.php",
    type: "GET",
    data: `sku=${sku}&action=check`,
    success: function (res) {
      console.log(res);
    },
    error: function (err) {
      console.error(err);
    },
  });
}

function addProduct() {
  $("#product_form").validate({
    errorClass: "text-danger",
    rules: {
      sku: {
        required: true,
        minlength: 3,
      },
      name: {
        required: true,
        minlength: 3,
      },
      price: {
        required: true,
        number: true,
      },
      type: {
        required: true,
      },
      size: {
        required: true,
        number: true,
      },
      height: {
        required: true,
        number: true,
      },
      width: {
        required: true,
        number: true,
      },
      length: {
        required: true,
        number: true,
      },
      weight: {
        required: true,
        number: true,
      },
    },
    messages: {
      sku: {
        required: "Please, submit required data",
        minlength: "Please, provide the data of indicated type",
      },
      name: {
        required: "Please, submit required data",
        minlength: "Please, provide the data of indicated type",
      },
      price: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      size: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      height: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      width: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      length: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      weight: {
        required: "Please, submit required data",
        number: "Please, provide the data of indicated type",
      },
      type: {
        required: "Please, submit required data",
      },
    },
    onfocusout: function (el) {
      //  check sku value in database
      if (el.name == "sku" && el.value.trim()) {
        skuChecker(el.value);
      }
    },
    submitHandler: function () {
      $.ajax({
        url: "requests/requests.php",
        type: "POST",
        dataType: "html",
        data: $("#product_form").serialize() + "&action=add",
        success: function (res) {
          console.log(res);
        },
        error: function (err) {
          console.error(err);
        },
      });
    },
  });
}

addProduct();
