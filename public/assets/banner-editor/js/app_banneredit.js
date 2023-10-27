//scripts availabel
require.config({
  shim: {
    bootstrap: {
      deps: ["jquery"],
    },
    sweetalert2: {
      deps: ["jquery"],
    },
  },
  paths: {
    // html5shiv:'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min',
    // respond:'https://oss.maxcdn.com/respond/1.4.2/respond.min',
    jquery: "../../js/jquery-3.5.1.min",
    sweetalert2: "../../js/sweetalert2.min",
    bootstrap: "vendor/bootstrap/bootstrap.min",
    darktooltip: "vendor/darktooltip/dist/jquery.darktooltip",
    jscolor: "vendor/jscolor/jscolor",
    slick: "vendor/slick/slick.min",
    banneredit: "banner",
  },
});

//Common js
require(["jquery", "sweetalert2"], function ($, Swal) {
  btns = document.getElementsByClassName("guardarBtn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
      Swal.fire({ title: "Guardando Cambios", allowOutsideClick: false });
      Swal.showLoading();
      var data = new FormData();
      var file_data = $("#imagenbanner" + this.id)[0].files;
      data.append("_token", token);
      data.append("id", this.id);
      data.append("image", file_data[0]);
      data.append("texto_1", $("#texto1_" + this.id).val());
      var set1 = new Set(["1", "2", "3", "4", "6", "7", "8", "10", "11"]);
      var set2 = new Set(["1", "4"]);
      var set3 = new Set(["2", "3", "4", "5", "6", "7", "8", "9", "10"]);
      if (set1.has(this.id)) {
        console.log("ture");
        data.append("texto_2", $("#texto2_" + this.id).val());
      }
      if (set2.has(this.id)) {
        data.append("texto_3", $("#texto3_" + this.id).val());
      }
      if (set3.has(this.id)) {
        data.append("texto_boton", $("#textoboton_" + this.id).val());
      }
      $.ajax({
        type: "post",
        url: routeName,
        data: data,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (result) {
          Swal.close();
          if (result.error) {
            Swal.fire({
              type: "error",
              title: "Ocurrio un error",
              text: "Lo sentimos pero no pudimos guardar los cambios, por favor intentelo mas tarde.",
              confirmButtonText: "Aceptar",
              confirmButtonColor: "#2c5099",
            });
          } else {
            Swal.fire({
              type: "success",
              title: "Se han guardado tus cambios correctamente",
              text: "Tus cambios se guardaron correctamente!, ahora podras visualizarlos en la pagina.",
              footer:
                `<a style="background-color: #2c5099;
                    border-left-color: #2c5099;
                    border-right-color: #2c5099;"
                    class="swal2-confirm swal2-styled" href="` +
                routeNameRedirec +
                `">Continuar</a>`,
              showConfirmButton: false,
              allowOutsideClick: false,
            });
          }
        },
      });
    });
  }
});
require(["jquery", "bootstrap", "sweetalert2", "slick"], function () {
  $(".tabbed-menu > ul").slick({
    dots: false,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 4,
        },
      },

      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  // banner tabs
  $(".tabs li").click(function () {
    if ($(this).hasClass("selected") === false) {
      $(".tabs li").removeClass("selected");
      $(this).addClass("selected");
    }
    var selectionId = $(this).attr("id");
    //$('.content').fadeOut('100', function () {
    $("div .page").removeClass("visible");
    $(".page#" + selectionId).addClass("visible");
    //$('.content').fadeIn('100');
    //});
  });

  // tooltip ini
  $('[data-toggle="tooltip"]').tooltip();
  // banner hover color change
  $(".banner")
    .on("mouseenter", function () {
      $("[data-hcolor]:not(.banner-btn)", $(this)).each(function () {
        var color = $(this).attr("data-hcolor");
        $(this).find("span.text").css({
          color: color,
        });
      });
    })
    .on("mouseleave", function () {
      $("[data-hcolor]:not(.banner-btn)", $(this)).each(function () {
        $(this).find("span.text").css({
          color: "",
        });
      });
    });
  // banner hover color change
  $(".banner-btn[data-hcolor]")
    .on("mouseenter", function () {
      var color = $(this).attr("data-hcolor");
      $(this).find("span.text").css({
        color: color,
      });
    })
    .on("mouseleave", function () {
      $(this).find("span.text").css({
        color: "",
      });
    });
  // Remove Loader
  $("body").addClass("loaded");
});
// flowtype - make banner text responsive
require(["jquery"], function () {
  $.fn.flowtype = function (options) {
    var settings = $.extend(
        {
          maximum: 9999,
          minimum: 1,
          maxFont: 9999,
          minFont: 1,
          fontRatio: 10,
        },
        options
      ),
      changes = function (el) {
        var $el = $(el),
          elw = $el.width();
        (width =
          elw > settings.maximum
            ? settings.maximum
            : elw < settings.minimum
            ? settings.minimum
            : elw),
          (fontBase = width / settings.fontRatio),
          (fontSize =
            fontBase > settings.maxFont
              ? settings.maxFont
              : fontBase < settings.minFont
              ? settings.minFont
              : fontBase);
        $el.css("font-size", fontSize + "px");
        //console.log(elw,fontSize )
      };
    return this.each(function () {
      var that = this;
      var timer;
      var cachedWidth = $(window).width();
      $(window).resize(function () {
        var newWidth = $(window).width();
        if (newWidth !== cachedWidth) {
          $(".banner-caption", that).addClass("calc");
          clearTimeout(timer);
          timer = setTimeout(doneResizing, 500);
          cachedWidth = newWidth;
        }
      });
      changes(this);

      function doneResizing() {
        changes(that);
        $(".banner-caption", that).removeClass("calc");
      }
    });
  };
  $(".autosize-text").each(function () {
    $this = $(this);
    var fontratio = parseInt($this.attr("data-fontratio"));
    $this.flowtype({
      fontRatio: fontratio,
    });
  });
});
// Banner Edit
require(["jquery", "banneredit", "jscolor"], function () {
  $.fn.outerHTML = function () {
    return !this.length
      ? this
      : this[0].outerHTML ||
          (function (el) {
            var div = document.createElement("div");
            div.appendChild(el.cloneNode(true));
            var contents = div.innerHTML;
            div = null;
            return contents;
          })(this[0]);
  };

  function getBannerContainer(target) {
    var $bannerContainer;
    if (target.hasClass("category-block")) {
      $bannerContainer = ".category-block";
    } else if (target.hasClass("category-slider-item")) {
      $bannerContainer = ".category-slider-item";
    } else if (target.hasClass("banner-wrap")) {
      $bannerContainer = ".banner-wrap";
    } else {
      $bannerContainer = ".banner";
    }
    return $bannerContainer;
  }
  $modalBannerPopup = $("#modalBannerPopup");
  $modalPaste = $("#modalPaste");
  $(document).on("click", "#removeBanner", function (e) {
    var target = $(e.target);
    if (target.closest(".banner-wrap").length) {
      target = target.closest(".banner-wrap");
    } else if (target.closest(".category-block").length) {
      target = target.closest(".category-block");
    } else if (target.closest(".category-slider-item").length) {
      target = target.closest(".category-slider-item");
    } else if (target.closest(".banner").length) {
      target = target.closest(".banner");
    }
    var colAction = $("#colAction").detach();
    var bannerAction = $("#bannerAction").detach();
    $("body").prepend(colAction);
    $("body").prepend(bannerAction);
    $("#addCode").show();
    $("#editCode").show();
    target.remove();
    e.preventDefault();
  });

  var savedFlag = false;

  // сохраняем и закрываем
  $(".save-code").on("click", function (e) {
    savedFlag = true;
    var target = $("#customBlock .edited-now");
    var currentBanner = $("#modalBannerPopup .output-banner").children(
      ":first"
    );
    //    if (target.hasClass('banner-wrap')){
    //       target=target.children(":first");
    //    }
    var $bannerID = getBannerID(currentBanner);
    var $bannerContainer = getBannerContainer(currentBanner);
    target.replaceWith($bannerID.find($bannerContainer).outerHTML());
    var $autosize = $("#customBlock .edited-now");
    setTimeout(function () {
      if ($autosize.length && $autosize.hasClass("autosize-text")) {
        var fontratio = parseInt($autosize.attr("data-fontratio"));
        $autosize.flowtype({
          fontRatio: fontratio,
        });
      }
    }, 500);
    $modalBannerPopup.modal("hide");
    e.preventDefault();
  });

  // закрывает редактор баннера без сохранения
  $modalBannerPopup.on("hidden.bs.modal", function (e) {
    if (!savedFlag) {
      var target = $(".edited-now");
      //    if (target.hasClass('banner-wrap')){
      //       target=target.children(":first");
      //    }
      var $bannerID = getBannerID(target);
      var bannerTemp = $bannerID.detach();
      $("body").append(bannerTemp);
      $(".edited-now").each(function () {
        $(this).removeClass("edited-now");
      });
    } else savedFlag = false;
  });

  // кнопка добавить код с баннерами
  $("#pasteRowCode").on("click", function () {
    $modalPaste.modal("show");
    $("#pasteRow").val("");
  });

  // добавляем и сохраняем
  $("#applyCode").on("click", function () {
    var pasteVal = $("#pasteRow").val();
    if (~pasteVal.indexOf("block")) {
      if (~pasteVal.indexOf("container")) {
        $("#customBlock").html($("#pasteRow").val());
        $modalPaste.modal("hide");
        $("#customBlock")
          .find(".autosize-text")
          .each(function () {
            var $this = $(this);
            var fontratio = parseInt($this.attr("data-fontratio"));
            $this.flowtype({
              fontRatio: fontratio,
            });

            if ($("#customBlock .block").hasClass("full-nopad")) {
              $(".gutter").prop("checked", true);
            }

            if ($("#customBlock .block").hasClass("fullwidth")) {
              $("input[name='layoutmodeblock'][val='fullwidth']").prop(
                "checked",
                "checked"
              );
            } else {
              $("input[name='layoutmodeblock'][val='boxed']").prop(
                "checked",
                "checked"
              );
            }

            if ($("#customBlock .block").hasClass("mt-0")) {
              $("#offsetTop option[value='mt-0']").attr("selected", "selected");
            } else if ($("#customBlock .block").hasClass("mt-3")) {
              $("#offsetTop option[value='mt-3']").attr("selected", "selected");
            } else if ($("#customBlock .block").hasClass("mt-4")) {
              $("#offsetTop option[value='mt-4']").attr("selected", "selected");
            } else if ($("#customBlock .block").hasClass("mt-6")) {
              $("#offsetTop option[value='mt-6']").attr("selected", "selected");
            } else if ($("#customBlock .block").hasClass("mt-7")) {
              $("#offsetTop option[value='mt-7']").attr("selected", "selected");
            } else
              $("#offsetTop option[value='default']").attr(
                "selected",
                "selected"
              );
          });
      } else {
        $(".error-text", $modalPaste).text(
          'The code is not correct. The "div.container" is missing.'
        );
      }
    } else {
      $(".error-text", $modalPaste).text(
        'The code is not correct. The "div.block" is missing.'
      );
    }
  });

  // Кнопка панели МОЙ БАННЕР
  $("#editMy").on("click", function (e) {
    var $panel = $("#myBanner");
    $panel.slideToggle();
    $("#closeEditMy").toggleClass("hidden");
    $(this).toggleClass("hidden");
    e.preventDefault();
  });
  $("#closeEditMy").on("click", function (e) {
    var $panel = $("#myBanner");
    $panel.slideToggle();
    $("#editMy").toggleClass("hidden");
    $(this).toggleClass("hidden");
    e.preventDefault();
  });

  // !!! ВСЕ БАННЕРЫ ИНИЦИАЛИЗАЦИЯ

  if ($(".banner-edit").length) {
    $(".edit-banner-4").BannerEdit({
      banner: $(".edit-banner-4")
        .closest(".banner-edit")
        .find(".banner.style-4"),
      text: [
        {
          input: ".edit-text-4-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-4-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });

    $(".edit-banner-5").BannerEdit({
      banner: $(".edit-banner-5")
        .closest(".banner-edit")
        .find(".banner.style-5"),
      text: [
        {
          input: ".edit-text-5-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-5-2",
          bnrtext: ".text-2",
          effect: false,
        },
        {
          input: ".edit-text-5-3",
          bnrtext: ".text-3",
          effect: false,
        },
      ],
    });
    $(".edit-banner-6").BannerEdit({
      banner: $(".edit-banner-6")
        .closest(".banner-edit")
        .find(".banner.style-6"),
      text: [
        {
          input: ".edit-text-6-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-6-2",
          bnrtext: ".text-2",
          effect: false,
        },
        {
          input: ".edit-text-6-3",
          bnrtext: ".text-3",
          effect: false,
        },
      ],
    });
    $(".edit-banner-7").BannerEdit({
      banner: $(".edit-banner-7")
        .closest(".banner-edit")
        .find(".banner.style-7"),
      text: [
        {
          input: ".edit-text-7-4",
          bnrtext: ".banner-btn",
          effect: false,
        },
        {
          input: ".edit-text-7-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-7-2",
          bnrtext: ".text-2",
          effect: false,
        },
        {
          input: ".edit-text-7-3",
          bnrtext: ".text-3-inner",
          effect: false,
        },
      ],
    });

    $(".edit-banner-8").BannerEdit({
      banner: $(".edit-banner-8")
        .closest(".banner-edit")
        .find(".banner.style-8"),
      text: [
        {
          input: ".edit-text-8-2",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-8-1",
          bnrtext: ".text-1",
          effect: false,
        },
      ],
    });

    $(".edit-banner-11").BannerEdit({
      banner: $(".edit-banner-11")
        .closest(".banner-edit")
        .find(".banner.style-11"),
      text: [
        {
          input: ".edit-text-11-3",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-11-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-11-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });
    $(".edit-banner-12").BannerEdit({
      banner: $(".edit-banner-12")
        .closest(".banner-edit")
        .find(".banner.style-12"),
      text: [
        {
          input: ".edit-text-12-3",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-12-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-12-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });
    $(".edit-banner-13").BannerEdit({
      banner: $(".edit-banner-13")
        .closest(".banner-edit")
        .find(".banner.style-13"),
      text: [
        {
          input: ".edit-text-13-3",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-13-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-13-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });

    $(".edit-banner-14").BannerEdit({
      banner: $(".edit-banner-14")
        .closest(".banner-edit")
        .find(".banner.style-14"),
      text: [
        {
          input: ".edit-text-14-2",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-14-1",
          bnrtext: ".text-1",
          effect: false,
        },
      ],
    });
    $(".edit-banner-15").BannerEdit({
      banner: $(".edit-banner-15")
        .closest(".banner-edit")
        .find(".banner.style-15"),
      text: [
        {
          input: ".edit-text-15-3",
          bnrtext: ".banner-btn",
          effect: true,
        },
        {
          input: ".edit-text-15-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-15-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });

    $(".edit-banner-16").BannerEdit({
      banner: $(".edit-banner-16")
        .closest(".banner-edit")
        .find(".banner.style-16"),
      text: [
        {
          input: ".edit-text-16-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-16-2",
          bnrtext: ".text-2",
          effect: false,
        },
      ],
    });

    $(".edit-banner-17").BannerEdit({
      banner: $(".edit-banner-17")
        .closest(".banner-edit")
        .find(".banner.style-17"),
      text: [
        {
          input: ".edit-text-17-1",
          bnrtext: ".text-1",
          effect: false,
        },
        {
          input: ".edit-text-17-2",
          bnrtext: ".text-2",
          effect: true,
        },
        {
          input: ".edit-text-17-3",
          bnrtext: ".text-3",
          effect: false,
        },
      ],
    });
  }
  // END ВСЕ БАННЕРЫ ИНИЦИАЛИЗАЦИЯ
});
