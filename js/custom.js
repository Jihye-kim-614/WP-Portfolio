(function ($) {
  // 브라우저 버전 체크
  (function () {
    // 외부 라이브러리와 충돌을 막고자 모듈화.
    // 브라우저 및 버전을 구하기 위한 변수들.
    "use strict";
    var agent = navigator.userAgent.toLowerCase(),
      name = navigator.appName,
      browser;

    // MS 계열 브라우저를 구분하기 위함.
    if (
      name === "Microsoft Internet Explorer" ||
      agent.indexOf("trident") > -1 ||
      agent.indexOf("edge/") > -1
    ) {
      browser = "ie";
      if (name === "Microsoft Internet Explorer") {
        // IE old version (IE 10 or Lower)
        agent = /msie ([0-9]{1,}[\.0-9]{0,})/.exec(agent);
        browser += parseInt(agent[1]);
      } else {
        // IE 11+
        if (agent.indexOf("trident") > -1) {
          // IE 11
          browser += 11;
        } else if (agent.indexOf("edge/") > -1) {
          // Edge
          browser = "edge";
        }
      }
    } else if (agent.indexOf("safari") > -1) {
      // Chrome or Safari
      if (agent.indexOf("opr") > -1) {
        // Opera
        browser = "opera";
      } else if (agent.indexOf("chrome") > -1) {
        // Chrome
        browser = "chrome";
      } else {
        // Safari
        browser = "safari";
      }
    } else if (agent.indexOf("firefox") > -1) {
      // Firefox
      browser = "firefox";
    }

    // IE: ie7~ie11, Edge: edge, Chrome: chrome, Firefox: firefox, Safari: safari, Opera: opera
    document.getElementsByTagName("html")[0].className = browser;
  })();

  // Variables
  var $html = $("html"),
    $body = $("body"),
    $siteHeader = $body.find(".site-header"),
    $menuBtn = $(".menu-btn"),
    $menuContainer = $(".menu-container"),
    $overlay = $(".overlay"),
    $scrollTopBtn = $body.find(".scroll-top");

  $(document).ready(function () {
    // 서브메뉴 드롭다운
    var subMenu = $(".sub-menu");
    if (!$(".menu-item-has-children").hasClass("show")) {
      $(".current-menu-parent").addClass("show");
    }
    // 모바일
    if ($(".more-navigation").find("menu-item-has-children")) {
      $(".menu-item-has-children").prepend('<div class="toggle-btn"></div>');
      $(".menu-item-has-children .toggle-btn").click(function () {
        $(this).toggleClass("show");
        $(this).parent(".menu-item-has-children").toggleClass("show");
      });
    }

    // Header - More navigation
    $menuBtn.click(function () {
      $(this).toggleClass("active");

      // active 상태
      if ($(this).hasClass("active")) {
        $("html, body").css({
          overflow: "hidden",
        });
        $menuContainer.addClass("active");
        $overlay.addClass("active");
      } else {
        $("html, body").css({
          overflow: "",
        });
        $menuContainer.removeClass("active");
        $overlay.removeClass("active");
      }
    });

    // 클릭시 닫힘
    $overlay.click(function () {
      $searchContainer.removeClass("active");
      $searchBtn.removeClass("active");
      $menuContainer.removeClass("active");
      $menuBtn.removeClass("active");
      $(this).removeClass("active");
      $("html, body").css({
        overflow: "",
      });
    });

    // Scroll Top 버튼
    $scrollTopBtn.click(function () {
      $html.animate(
        {
          scrollTop: 0,
        },
        400
      );
      return false;
    });
  });
})(jQuery);
