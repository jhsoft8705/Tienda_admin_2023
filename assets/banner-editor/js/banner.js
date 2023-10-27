define(["jquery", "sweetalert2"], function () {
  $.fn.BannerEdit = function (options) {
    var $editbox = this,
      options = $.extend($.fn.BannerEdit.defaults, options),
      $banner = $(options.banner),
      $output = $("#output"),
      textarray = options.text,
      $bnrimage = $(".image", $editbox),
      $vertalign = $(".vertalign", $editbox),
      $horalign = $(".horalign", $editbox),
      $bnrpadh = $(".bnrpadh", $editbox),
      $bnrpadv = $(".bnrpadv", $editbox),
      $fontratio = $(".fontratio", $editbox),
      $bnrlink = $(".bnrlink", $editbox),
      $btnlink = $(".btnlink", $editbox),
      $targetlink = $(".targetlink", $editbox),
      $bnrpadt = $(".bnrpadt", $editbox),
      $bnrpadr = $(".bnrpadr", $editbox),
      $bnrpadb = $(".bnrpadb", $editbox),
      $bnrpadl = $(".bnrpadl", $editbox),
      $padbox = $(".pad-box-wrapper", $editbox),
      $hoverscale = $(".hoverscale", $editbox);

    //console.log($banner);

    for (var i = 0; i < textarray.length; i++) {
      iniTextInput(
        textarray[i].input,
        textarray[i].bnrtext,
        textarray[i].effect
      );
    }

    function iniTextInput(input, bnrtext, effect) {
      //console.log('iniTextInput');
      var $input = $(input, $editbox),
        $bnrtext = $(bnrtext, $banner),
        effect = effect,
        $text = $(".text", $input),
        $textcolor = $(".text-color", $input),
        $texthcolor = $(".text-hcolor", $input),
        $textbgcolor = $(".text-bgcolor", $input),
        $textbgcolorstatic = $(".text-bgcolorstatic", $input),
        $textbghcolor = $(".text-bghcolor", $input);

      if (effect) {
        if ($text.length) {
          $text.val($("span.text", $bnrtext).text());
        }
        if ($textcolor.length) {
          $textcolor.val(rgb2hex($("> span", $bnrtext).css("color")));
        }
        if ($texthcolor.length) {
          $texthcolor.val($bnrtext.attr("data-hcolor"));
        }
        if ($textbgcolor.length) {
          $textbgcolor.val(
            rgb2hex($("> span", $bnrtext).css("background-color"))
          );
          $textbghcolor.val(
            rgb2hex($("span.hoverbg", $bnrtext).css("background-color"))
          );
        }
        $text.on("change", function () {
          var text = $(this).val();
          if (text == "") {
            $bnrtext.addClass("hidden");
          } else $bnrtext.removeClass("hidden");
          $("span.text", $bnrtext).text($(this).val());
        });
        $textcolor.on("change", function () {
          var color = "#" + $(this).val();
          $("> span", $bnrtext).css({
            color: color,
          });
        });
        $texthcolor.on("change", function () {
          var color = "#" + $(this).val();
          $bnrtext.attr("data-hcolor", color);
        });
        $textbgcolor.on("change", function () {
          var color = "#" + $(this).val();
          $("> span", $bnrtext).css({
            "background-color": color,
          });
        });
        $textbghcolor.on("change", function () {
          var color = "#" + $(this).val();
          $("span.hoverbg", $bnrtext).css({
            "background-color": color,
          });
          $("> span", $bnrtext).css({
            "border-color": color,
          });
        });
      } else {
        if ($text.length) {
          $text.val($bnrtext.text());
        }
        if ($textcolor.length) {
          $textcolor.val(rgb2hex($bnrtext.css("color")));
        }
        $text.on("change", function () {
          var text = $(this).val();
          if (text == "") {
            $bnrtext.addClass("hidden");
          } else $bnrtext.removeClass("hidden");
          $bnrtext.text($(this).val());
        });
        $textcolor.on("change", function () {
          var color = "#" + $(this).val();
          $bnrtext.css({
            color: color,
          });
          if ($bnrtext.css("border-top-style") != "none")
            $bnrtext.css({
              "border-color": color,
            });
          $bnrtext.css({
            color: color,
          });
        });
        if ($textbgcolorstatic.length) {
          $textbgcolorstatic.val(rgb2hex($bnrtext.css("background-color")));
        }
        $textbgcolorstatic.on("change", function () {
          var color = "#" + $(this).val();
          $bnrtext.css({
            "background-color": color,
          });
          if ($bnrtext.closest(".style-20").length) {
            $bnrtext.find(".text-corner").css({
              "border-bottom-color": color,
            });
          }
        });
        $textbgcolor.on("change", function () {
          var color = "#" + $(this).val();
          $bnrtext.parent().css({
            "background-color": color,
          });
        });
      }
    }

    var rangeSlider = function () {
      var slider = $(".range-slider"),
        range = $(".range-slider-range"),
        value = $(".range-slider-value");
      slider.each(function () {
        range.on("input", function () {
          $(this).next(value).html(this.value);
        });
      });
    };
    //rangeSlider();

    function rgb2hex(rgb) {
      //console.log(rgb);
      //  if (rgb == 'transparent') return 'transparent'

      if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

      rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

      function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
      }
      return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    function updateOutput(output) {
      var $output = output,
        $target = $banner.parent();
      if ($banner.parent("a").length) {
        $target = $banner.parent("a").parent();
      }
      $output.val(
        $target
          .html()
          .replace(/\n/g, "")
          .replace(/[\t ]+\</g, "<")
          .replace(/\>[\t ]+\</g, "><")
          .replace(/\>[\t ]+$/g, ">")
          .replace(/style="font-size:.*?"/g, "")
        //				.replace(/https:/g, "")
        //				.replace(/http:/g, "")
      );
    }
    updateOutput($output);

    document
      .getElementById("copyButton")
      .addEventListener("click", function () {
        copyToClipboard(document.getElementById("output"));
      });

    function copyToClipboard(elem) {
      // create hidden text element, if it doesn't already exist
      var targetId = "_hiddenCopyText_";
      var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
      var origSelectionStart, origSelectionEnd;
      if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
      } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
          var target = document.createElement("textarea");
          target.style.position = "absolute";
          target.style.left = "-9999px";
          target.style.top = "0";
          target.id = targetId;
          document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
      }
      // select the content
      var currentFocus = document.activeElement;
      target.focus();
      target.setSelectionRange(0, target.value.length);

      // copy the selection
      var succeed;
      try {
        succeed = document.execCommand("copy");
      } catch (e) {
        succeed = false;
      }
      // restore original focus
      if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
      }

      if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
      } else {
        // clear temporary content
        target.textContent = "";
      }
      return succeed;
    }

    // set start params

    if ($(".banner-caption", $banner).hasClass("vertb")) {
      $vertalign.val("vertb");
    } else if ($(".banner-caption", $banner).hasClass("vertt")) {
      $vertalign.val("vertt");
    } else {
      $vertalign.val("vertm");
    }

    if ($(".banner-caption", $banner).hasClass("horc")) {
      $horalign.val("horc");
    } else if ($(".banner-caption", $banner).hasClass("horr")) {
      $horalign.val("horr");
    } else {
      $horalign.val("horl");
    }

    var $bnrpad_valh, $bnrpad_valv, $fontratio_val;

    $bnrpad_valh =
      Math.round(
        100 -
          (100 * $(".banner-caption", $banner).width()) /
            $(".banner-caption", $banner).parent().width(),
        10
      ) / 2;
    $bnrpadh.val($bnrpad_valh);
    $bnrpadh.next(".range-slider-value").html($bnrpad_valh);

    $bnrpad_valv =
      Math.round(
        100 -
          (100 * $(".banner-caption", $banner).height()) /
            $(".banner-caption", $banner).parent().height(),
        10
      ) / 2;
    $bnrpadv.val($bnrpad_valv);
    $bnrpadv.next(".range-slider-value").html($bnrpad_valv);

    $bnrpadt.val(
      Math.round(
        (parseInt($(".banner-caption", $banner).css("top")) * 100) /
          $(".banner-caption", $banner).parent().outerHeight()
      ),
      10
    );

    $bnrpadr.val(
      Math.round(
        (parseInt($(".banner-caption", $banner).css("right")) * 100) /
          $(".banner-caption", $banner).parent().outerWidth()
      ),
      10
    );

    $bnrpadb.val(
      Math.round(
        (parseInt($(".banner-caption", $banner).css("bottom")) * 100) /
          $(".banner-caption", $banner).parent().outerHeight()
      ),
      10
    );

    $bnrpadl.val(
      Math.round(
        (parseInt($(".banner-caption", $banner).css("left")) * 100) /
          $(".banner-caption", $banner).parent().outerWidth()
      ),
      10
    );

    $fontratio_val = parseFloat($banner.attr("data-fontratio"));

    if ($fontratio.data("start")) {
      $fontratio.val(($fontratio.data("start") - $fontratio_val).toFixed(1));
    } else {
      if ($fontratio_val > 15) {
        $fontratio.data("fontsize", 21);
        $fontratio.data("start", 21);
      } else if ($fontratio_val > 8) {
        $fontratio.data("fontsize", 16);
        $fontratio.data("start", 16);
      } else {
        $fontratio.data("fontsize", 12);
        $fontratio.data("start", 12);
      }
      $fontratio.val(($fontratio.data("fontsize") - $fontratio_val).toFixed(1));
    }

    //console.log(($fontratio.data('fontsize') - $fontratio_val).toFixed(1))
    //$fontratio.next('.range-slider-value').html(($fontratio.data('fontsize') - $fontratio_val).toFixed(1));

    $bnrimage.val($("img", $banner).attr("src"));

    if (
      $banner.hasClass("image-hover-scale") ||
      $(".category-image", $banner).hasClass("image-hover-scale")
    ) {
      $hoverscale.prop("checked", true);
    }

    if ($targetlink.length) {
      if ($("a.banner-btn-wrap", $banner).length) {
        $targetlink.val("linkbtn");
        $bnrlink.hide();
        $btnlink.show().val($("a.banner-btn-wrap", $banner).attr("href"));
      } else {
        $targetlink.val("linkbnr");
        $btnlink.hide();
        $bnrlink.show().val($banner.parent("a.banner-wrap").attr("href"));
      }
    } else {
      if ($banner.children("a").length)
        $bnrlink.val($banner.children("a").attr("href"));
      else if ($banner.parent("a.banner-wrap").length)
        $bnrlink.val($banner.parent("a.banner-wrap").attr("href"));
      else $bnrlink.val($banner.attr("href"));
    }

    // events

    $(".show-code", $editbox).on("click", function () {
      updateOutput($output);
    });

    $bnrimage.on("change", function () {
      $("img", $banner).attr("src", $(this).val());
    });

    $bnrlink.on("change", function () {
      if ($banner.children("a").length)
        $banner.children("a").attr("href", $(this).val());
      else if ($banner.parent("a").length)
        $banner.parent("a").attr("href", $(this).val());
      else $banner.attr("href", $(this).val());
    });

    $btnlink.on("change", function () {
      $(".banner-btn", $banner).parent("a").attr("href", $(this).val());
    });

    $padbox
      .on("mouseover", function () {
        $(".banner-caption", $banner).addClass("active");
      })
      .on("mouseleave", function () {
        $(".banner-caption", $banner).removeClass("active");
      });

    $vertalign.on("change", function () {
      var vert = $(this).val();
      $(".banner-caption", $banner)
        .removeClass("vertt vertb vertm")
        .addClass(vert);
    });

    $horalign.on("change", function () {
      var hor = $(this).val();
      $(".banner-caption", $banner).removeClass("horc horl horr").addClass(hor);
    });

    $bnrpadh.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        left: pad + "%",
        right: pad + "%",
      });
    });

    $bnrpadv.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        top: pad + "%",
        bottom: pad + "%",
      });
    });

    $bnrpadt.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        top: pad + "%",
      });
    });

    $bnrpadr.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        right: pad + "%",
      });
    });

    $bnrpadb.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        bottom: pad + "%",
      });
    });

    $bnrpadl.on("change", function () {
      var pad = $(this).val();
      $(".banner-caption", $banner).css({
        left: pad + "%",
      });
    });

    $fontratio.on("change", function () {
      var fontRatio = $fontratio.data("fontsize") - $(this).val();
      $banner.attr("data-fontratio", fontRatio);
      $banner.flowtype({
        fontRatio: fontRatio,
      });
    });

    $hoverscale.on("change", function () {
      if ($banner.hasClass("category-block"))
        $(".category-image", $banner).toggleClass("image-hover-scale");
      else $banner.toggleClass("image-hover-scale");
    });

    $targetlink.on("change", function () {
      console.log("$targetlink");
      var target = $(this).val();
      if (target == "linkbtn") {
        if ($banner.parent("a").length) {
          $banner.unwrap();
        }
        $(".banner-btn", $banner).wrap(
          "<a href='" + $btnlink.val() + "' class='banner-btn-wrap'></a>"
        );
        $bnrlink.hide();
        $btnlink.show().val($(".banner-btn", $banner).parent("a").attr("href"));
      } else {
        $banner.wrap(
          "<a href='" + $bnrlink.val() + "' class='banner-wrap'></a>"
        );
        if ($(".banner-btn", $banner).parent("a").length) {
          $(".banner-btn", $banner).unwrap();
        }
        $btnlink.hide();
        $bnrlink.show().val($banner.parent("a").attr("href"));
      }
    });
  };

  $.fn.BannerEdit.defaults = {
    banner: null,
    text: null,
  };
});
