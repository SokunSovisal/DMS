isWindows = -1 < navigator.platform.indexOf("Win"), isWindows ? ($(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(), $("html").addClass("perfect-scrollbar-on")) : $("html").addClass("perfect-scrollbar-off");

var transparent = !0,
    mobile_menu_visible = 0,
    mobile_menu_initialized = !1;

function debounce(t, n, i) {
    var r;
    return function() {
        var e = this,
            a = arguments;
        clearTimeout(r), r = setTimeout(function() {
            r = null, i || t.apply(e, a)
        }, n), i && !r && t.apply(e, a)
    }
}
$(document).ready(function() {
    md.checkSidebarImage(), md.initMinimizeSidebar(), $(".dropdown-menu a.dropdown-toggle").on("click", function(e) {
        var a = $(this),
            t = $(this).offsetParent(".dropdown-menu");
        return $(this).next().hasClass("show") || $(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), $(this).next(".dropdown-menu").toggleClass("show"), $(this).closest("a").toggleClass("open"), $(this).parents("a.dropdown-item.dropdown.show").on("hidden.bs.dropdown", function(e) {
            $(".dropdown-menu .show").removeClass("show")
        }), t.parent().hasClass("navbar-nav") || a.next().css({
            top: a[0].offsetTop,
            left: t.outerWidth() - 4
        }), !1
    });
}),
$(document).on("click", ".navbar-toggler", function() {
    if ($toggle = $(this), 1 == mobile_menu_visible) $("html").removeClass("nav-open"), $(".close-layer").remove(), setTimeout(function() {
        $toggle.removeClass("toggled")
    }, 400), mobile_menu_visible = 0;
    else {
        setTimeout(function() {
            $toggle.addClass("toggled")
        }, 430);
        var e = $('<div class="close-layer"></div>');
        0 != $("body").find(".main-panel").length ? e.appendTo(".main-panel") : $("body").hasClass("off-canvas-sidebar") && e.appendTo(".wrapper-full-page"), setTimeout(function() {
            e.addClass("visible")
        }, 100), e.click(function() {
            $("html").removeClass("nav-open"), mobile_menu_visible = 0, e.removeClass("visible"), setTimeout(function() {
                e.remove(), $toggle.removeClass("toggled")
            }, 400)
        }), $("html").addClass("nav-open"), mobile_menu_visible = 1
    }
}), md = {
    misc: {
        navbar_menu_visible: 0,
        active_collapse: !0,
        disabled_collapse_init: 0
    },
    checkSidebarImage: function() {
        $sidebar = $(".sidebar"), image_src = $sidebar.data("image"), void 0 !== image_src && (sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>', $sidebar.append(sidebar_container))
    },
    initMaterialWizard: function() {
        // Code for the Validator
        var $validator = $('.card-wizard form').validate({
          rules: {
              tr_em_id: {
                  required: true
              },
              em_id: {
                  required: true
              },
              td_date: {
                  required: true
              }
          },

          highlight: function(element) {
              $(element).closest('.custom-select').removeClass('is-valid').addClass('is-invalid');
          },
          success: function(element) {
              $(element).closest('.custom-select').removeClass('is-invalid').addClass('is-valid');
          },
          errorPlacement : function(error, element) {
              $(element).append(error);
          }
        });
        // Wizard Initialization
        $('.card-wizard').bootstrapWizard({
          'tabClass': 'nav nav-pills',
          'nextSelector': '.btn-next',
          'previousSelector': '.btn-previous',

          onNext: function(tab, navigation, index) {
              var $valid = $('.card-wizard form').valid();
              if (!$valid) {
                  $validator.focusInvalid();
                  return false;
              }
          },

          onInit: function(tab, navigation, index) {
              //check number of tabs and fill the entire row
              var $total = navigation.find('li').length;
              var $wizard = navigation.closest('.card-wizard');

              $first_li = navigation.find('li:first-child a').html();
              $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
              $('.card-wizard .wizard-navigation').append($moving_div);

              refreshAnimation($wizard, index);

              $('.moving-tab').css('transition', 'transform 0s');
          },

          onTabClick: function(tab, navigation, index) {
              var $valid = $('.card-wizard form').valid();

              if (!$valid) {
                  return false;
              } else {
                  return true;
              }
          },

          onTabShow: function(tab, navigation, index) {
              var $total = navigation.find('li').length;
              var $current = index + 1;

              var $wizard = navigation.closest('.card-wizard');

              // If it's the last tab then hide the last button and show the finish instead
              if ($current >= $total) {
                  $($wizard).find('.btn-next').hide();
                  $($wizard).find('.btn-finish').show();
              } else {
                  $($wizard).find('.btn-next').show();
                  $($wizard).find('.btn-finish').hide();
              }

              button_text = navigation.find('li:nth-child(' + $current + ') a').html();

              setTimeout(function() {
                  $('.moving-tab').text(button_text);
              }, 150);

              var checkbox = $('.footer-checkbox');

              if (!index == 0) {
                  $(checkbox).css({
                      'opacity': '0',
                      'visibility': 'hidden',
                      'position': 'absolute'
                  });
              } else {
                  $(checkbox).css({
                      'opacity': '1',
                      'visibility': 'visible'
                  });
              }

              refreshAnimation($wizard, index);
          }
        });


        // Prepare the preview for profile picture
        $("#wizard-picture").change(function() {
          readURL(this);
        });

        $('[data-toggle="wizard-radio"]').click(function() {
          wizard = $(this).closest('.card-wizard');
          wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
          $(this).addClass('active');
          $(wizard).find('[type="radio"]').removeAttr('checked');
          $(this).find('[type="radio"]').attr('checked', 'true');
        });

        $('[data-toggle="wizard-checkbox"]').click(function() {
          if ($(this).hasClass('active')) {
              $(this).removeClass('active');
              $(this).find('[type="checkbox"]').removeAttr('checked');
          } else {
              $(this).addClass('active');
              $(this).find('[type="checkbox"]').attr('checked', 'true');
          }
        });

        $('.set-full-height').css('height', 'auto');

        //Function to show image before upload

        function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                  $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
              }
              reader.readAsDataURL(input.files[0]);
          }
        }

        $(window).resize(function() {
          $('.card-wizard').each(function() {
              $wizard = $(this);

              index = $wizard.bootstrapWizard('currentIndex');
              refreshAnimation($wizard, index);

              $('.moving-tab').css({
                  'transition': 'transform 0s'
              });
          });
        });

        function refreshAnimation($wizard, index) {
          $total = $wizard.find('.nav li').length;
          $li_width = 100 / $total;

          total_steps = $wizard.find('.nav li').length;
          move_distance = $wizard.width() / total_steps;
          index_temp = index;
          vertical_level = 0;

          mobile_device = $(document).width() < 600 && $total > 3;

          if (mobile_device) {
              move_distance = $wizard.width() / 2;
              index_temp = index % 2;
              $li_width = 50;
          }

          $wizard.find('.nav li').css('width', $li_width + '%');

          step_width = move_distance;
          move_distance = move_distance * index_temp;

          $current = index + 1;

          if ($current == 1 || (mobile_device == true && (index % 2 == 0))) {
              move_distance -= 8;
          } else if ($current == total_steps || (mobile_device == true && (index % 2 == 1))) {
              move_distance += 8;
          }

          if (mobile_device) {
              vertical_level = parseInt(index / 2);
              vertical_level = vertical_level * 38;
          }

          $wizard.find('.moving-tab').css('width', step_width);
          $('.moving-tab').css({
              'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
              'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

          });
        }
    },
    initMinimizeSidebar: function() {
        $("#minimizeSidebar").click(function() {
            $(this);
            1 == md.misc.sidebar_mini_active ? ($("body").removeClass("sidebar-mini"), md.misc.sidebar_mini_active = !1) : ($("body").addClass("sidebar-mini"), md.misc.sidebar_mini_active = !0);
            var e = setInterval(function() {
                window.dispatchEvent(new Event("resize"))
            }, 180);
            setTimeout(function() {
                clearInterval(e)
            }, 1e3)
        })
    },
    checkScrollForTransparentNavbar: debounce(function() {
        260 < $(document).scrollTop() ? transparent && (transparent = !1, $(".navbar-color-on-scroll").removeClass("navbar-transparent")) : transparent || (transparent = !0, $(".navbar-color-on-scroll").addClass("navbar-transparent"))
    }, 17),
    initRightMenu: debounce(function() {
        $sidebar_wrapper = $(".sidebar-wrapper"), mobile_menu_initialized ? 991 < $(window).width() && ($sidebar_wrapper.find(".navbar-form").remove(), $sidebar_wrapper.find(".nav-mobile-menu").remove(), mobile_menu_initialized = !1) : ($navbar = $("nav").find(".navbar-collapse").children(".navbar-nav"), mobile_menu_content = "", nav_content = $navbar.html(), nav_content = '<ul class="nav navbar-nav nav-mobile-menu">' + nav_content + "</ul>", navbar_form = $("nav").find(".navbar-form").get(0).outerHTML, $sidebar_nav = $sidebar_wrapper.find(" > .nav"), $nav_content = $(nav_content), $navbar_form = $(navbar_form), $nav_content.insertBefore($sidebar_nav), $navbar_form.insertBefore($nav_content), $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(e) {
            e.stopPropagation()
        }), window.dispatchEvent(new Event("resize")), mobile_menu_initialized = !0)
    }, 200)
};


(function(window) {
    'use strict';

    var Waves = Waves || {};
    var $$ = document.querySelectorAll.bind(document);

    // Find exact position of element
    function isWindow(obj) {
        return obj !== null && obj === obj.window;
    }

    function getWindow(elem) {
        return isWindow(elem) ? elem : elem.nodeType === 9 && elem.defaultView;
    }

    function offset(elem) {
        var docElem, win,
            box = {top: 0, left: 0},
            doc = elem && elem.ownerDocument;

        docElem = doc.documentElement;

        if (typeof elem.getBoundingClientRect !== typeof undefined) {
            box = elem.getBoundingClientRect();
        }
        win = getWindow(doc);
        return {
            top: box.top + win.pageYOffset - docElem.clientTop,
            left: box.left + win.pageXOffset - docElem.clientLeft
        };
    }

    function convertStyle(obj) {
        var style = '';

        for (var a in obj) {
            if (obj.hasOwnProperty(a)) {
                style += (a + ':' + obj[a] + ';');
            }
        }

        return style;
    }

    var Effect = {

        // Effect delay
        duration: 550,

        show: function(e, element) {

            // Disable right click
            if (e.button === 2) {
                return false;
            }

            var el = element || this;

            // Create ripple
            var ripple = document.createElement('div');
            ripple.className = 'wave-ripple';
            el.appendChild(ripple);

            // Get click coordinate and element witdh
            var pos         = offset(el);
            var relativeY   = (e.pageY - pos.top);
            var relativeX   = (e.pageX - pos.left);
            var scale       = 'scale('+((el.clientWidth / 100) * 10)+')';

            // Support for touch devices
            if ('touches' in e) {
              relativeY   = (e.touches[0].pageY - pos.top);
              relativeX   = (e.touches[0].pageX - pos.left);
            }

            // Attach data to element
            ripple.setAttribute('data-hold', Date.now());
            ripple.setAttribute('data-scale', scale);
            ripple.setAttribute('data-x', relativeX);
            ripple.setAttribute('data-y', relativeY);

            // Set ripple position
            var rippleStyle = {
                'top': relativeY+'px',
                'left': relativeX+'px'
            };

            ripple.className = ripple.className + ' wave-notransition';
            ripple.setAttribute('style', convertStyle(rippleStyle));
            ripple.className = ripple.className.replace('wave-notransition', '');

            // Scale the ripple
            rippleStyle['-webkit-transform'] = scale;
            rippleStyle['-moz-transform'] = scale;
            rippleStyle['-ms-transform'] = scale;
            rippleStyle['-o-transform'] = scale;
            rippleStyle.transform = scale;
            rippleStyle.opacity   = '1';

            rippleStyle['-webkit-transition-duration'] = Effect.duration + 'ms';
            rippleStyle['-moz-transition-duration']    = Effect.duration + 'ms';
            rippleStyle['-o-transition-duration']      = Effect.duration + 'ms';
            rippleStyle['transition-duration']         = Effect.duration + 'ms';

            rippleStyle['-webkit-transition-timing-function'] = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-moz-transition-timing-function']    = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-o-transition-timing-function']      = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['transition-timing-function']         = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';

            ripple.setAttribute('style', convertStyle(rippleStyle));
        },

        hide: function(e) {
            TouchHandler.touchup(e);

            var el = this;
            var width = el.clientWidth * 1.4;

            // Get first ripple
            var ripple = null;
            var ripples = el.getElementsByClassName('wave-ripple');
            if (ripples.length > 0) {
                ripple = ripples[ripples.length - 1];
            } else {
                return false;
            }

            var relativeX   = ripple.getAttribute('data-x');
            var relativeY   = ripple.getAttribute('data-y');
            var scale       = ripple.getAttribute('data-scale');

            // Get delay beetween mousedown and mouse leave
            var diff = Date.now() - Number(ripple.getAttribute('data-hold'));
            var delay = 350 - diff;

            if (delay < 0) {
                delay = 0;
            }

            // Fade out ripple after delay
            setTimeout(function() {
                var style = {
                    'top': relativeY+'px',
                    'left': relativeX+'px',
                    'opacity': '0',

                    // Duration
                    '-webkit-transition-duration': Effect.duration + 'ms',
                    '-moz-transition-duration': Effect.duration + 'ms',
                    '-o-transition-duration': Effect.duration + 'ms',
                    'transition-duration': Effect.duration + 'ms',
                    '-webkit-transform': scale,
                    '-moz-transform': scale,
                    '-ms-transform': scale,
                    '-o-transform': scale,
                    'transform': scale,
                };

                ripple.setAttribute('style', convertStyle(style));

                setTimeout(function() {
                    try {
                        el.removeChild(ripple);
                    } catch(e) {
                        return false;
                    }
                }, Effect.duration);
            }, delay);
        },

        // Little hack to make <input> can perform waves effect
        wrapInput: function(elements) {
            for (var a = 0; a < elements.length; a++) {
                var el = elements[a];

                if (el.tagName.toLowerCase() === 'input') {
                    var parent = el.parentNode;

                    // If input already have parent just pass through
                    if (parent.tagName.toLowerCase() === 'i' && parent.className.indexOf('wave-effect') !== -1) {
                        continue;
                    }

                    // Put element class and style to the specified parent
                    var wrapper = document.createElement('i');
                    wrapper.className = el.className + ' wave-input-wrapper';

                    var elementStyle = el.getAttribute('style');

                    if (!elementStyle) {
                        elementStyle = '';
                    }

                    wrapper.setAttribute('style', elementStyle);

                    el.className = 'wave-button-input';
                    el.removeAttribute('style');

                    // Put element as child
                    parent.replaceChild(wrapper, el);
                    wrapper.appendChild(el);
                }
            }
        }
    };


    /**
     * Disable mousedown event for 500ms during and after touch
     */
    var TouchHandler = {
        /* uses an integer rather than bool so there's no issues with
         * needing to clear timeouts if another touch event occurred
         * within the 500ms. Cannot mouseup between touchstart and
         * touchend, nor in the 500ms after touchend. */
        touches: 0,
        allowEvent: function(e) {
            var allow = true;

            if (e.type === 'touchstart') {
                TouchHandler.touches += 1; //push
            } else if (e.type === 'touchend' || e.type === 'touchcancel') {
                setTimeout(function() {
                    if (TouchHandler.touches > 0) {
                        TouchHandler.touches -= 1; //pop after 500ms
                    }
                }, 500);
            } else if (e.type === 'mousedown' && TouchHandler.touches > 0) {
                allow = false;
            }

            return allow;
        },
        touchup: function(e) {
            TouchHandler.allowEvent(e);
        }
    };


    /**
     * Delegated click handler for .wave-effect element.
     * returns null when .wave-effect element not in "click tree"
     */
    function getWavesEffectElement(e) {
        if (TouchHandler.allowEvent(e) === false) {
            return null;
        }

        var element = null;
        var target = e.target || e.srcElement;

        while (target.parentElement !== null) {
            if (!(target instanceof SVGElement) && target.className.indexOf('wave-effect') !== -1) {
                element = target;
                break;
            } else if (target.classList.contains('wave-effect')) {
                element = target;
                break;
            }
            target = target.parentElement;
        }

        return element;
    }

    /**
     * Bubble the click and show effect if .wave-effect elem was found
     */
    function showEffect(e) {
        var element = getWavesEffectElement(e);

        if (element !== null) {
            Effect.show(e, element);

            if ('ontouchstart' in window) {
                element.addEventListener('touchend', Effect.hide, false);
                element.addEventListener('touchcancel', Effect.hide, false);
            }

            element.addEventListener('mouseup', Effect.hide, false);
            element.addEventListener('mouseleave', Effect.hide, false);
        }
    }

    Waves.displayEffect = function(options) {
        options = options || {};

        if ('duration' in options) {
            Effect.duration = options.duration;
        }

        //Wrap input inside <i> tag
        Effect.wrapInput($$('.wave-effect'));

        if ('ontouchstart' in window) {
            document.body.addEventListener('touchstart', showEffect, false);
        }

        document.body.addEventListener('mousedown', showEffect, false);
    };

    /**
     * Attach Waves to an input element (or any element which doesn't
     * bubble mouseup/mousedown events).
     *   Intended to be used with dynamically loaded forms/inputs, or
     * where the user doesn't want a delegated click handler.
     */
    Waves.attach = function(element) {
        //FUTURE: automatically add waves classes and allow users
        // to specify them with an options param? Eg. light/classic/button
        if (element.tagName.toLowerCase() === 'input') {
            Effect.wrapInput([element]);
            element = element.parentElement;
        }

        if ('ontouchstart' in window) {
            element.addEventListener('touchstart', showEffect, false);
        }

        element.addEventListener('mousedown', showEffect, false);
    };

    window.Waves = Waves;

    document.addEventListener('DOMContentLoaded', function() {
        Waves.displayEffect();
    }, false);

})(window);

$('.datetimepicker').datetimepicker();
$('.datepicker').datetimepicker({
    format: 'L'
});
$('.daypicker').datetimepicker({
    format: 'DD'
});
$('.time24picker').datetimepicker({
    format: 'HH:mm'
});
$('.time12picker').datetimepicker({
    format: 'LT'
});


function getId(id) {
  $('#getid').val(id);
}


$('#datatables').DataTable({
  "language": {
    "decimal":        "",
    "emptyTable":     "ពុំមានទិន្នន័យឡើយ",
    "info":           "បង្ហាញ _START_ ដល់ _END_ នៃ _TOTAL_ ជួរ",
    "infoEmpty":      "បង្ហាញ 0 ដល់ 0 នៃ 0 ជួរ",
    "infoFiltered":   "(filtered ពី _MAX_ សរុប ជួរ)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "បង្ហាញ _MENU_ ជួរ",
    "loadingRecords": "កំពុងដំណើរការ...",
    "processing":     "កំពុងដំណើរការ...",
    "search":         "ស្វែងរក:",
    "zeroRecords":    "ពុំមានទិន្នន័យឡើយ",
    "paginate": {
        "first":      "ដំបូង",
        "last":       "ចុងក្រោយ",
        "next":       "បន្ទាប់",
        "previous":   "ថយ"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
  }
});