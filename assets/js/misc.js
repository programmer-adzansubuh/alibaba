var ChartColor = ["#5D62B4", "#54C3BE", "#EF726F", "#F9C446", "rgb(93.0, 98.0, 180.0)", "#21B7EC", "#04BCCC"];
var primaryColor = getComputedStyle(document.body).getPropertyValue('--primary');
var secondaryColor = getComputedStyle(document.body).getPropertyValue('--secondary');
var successColor = getComputedStyle(document.body).getPropertyValue('--success');
var warningColor = getComputedStyle(document.body).getPropertyValue('--warning');
var dangerColor = getComputedStyle(document.body).getPropertyValue('--danger');
var infoColor = getComputedStyle(document.body).getPropertyValue('--info');
var darkColor = getComputedStyle(document.body).getPropertyValue('--dark');
var lightColor = getComputedStyle(document.body).getPropertyValue('--light');
(function ($) {
  'use strict';
  $(function () {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('#sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required
    if (!$('#sidebar').hasClass("dynamic-active-class-disabled")) {
      var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
      $('#sidebar >.nav > li:not(.not-navigation-link) a').each(function () {
        var $this = $(this);
        if (current === "") {
          //for root url
          if ($this.attr('href').indexOf("index.html") !== -1) {
            $(this).parents('.nav-item').last().addClass('active');
            if ($(this).parents('.sub-menu').length) {
              $(this).addClass('active');
            }
          }
        } else {
          //for other url
          if ($this.attr('href').indexOf(current) !== -1) {
            $(this).parents('.nav-item').last().addClass('active');
            if ($(this).parents('.sub-menu').length) {
              $(this).addClass('active');
            }
            if (current !== "index.html") {
              $(this).parents('.nav-item').last().find(".nav-link").attr("aria-expanded", "true");
              if ($(this).parents('.sub-menu').length) {
                $(this).closest('.collapse').addClass('show');
              }
            }
          }
        }
      })
    }

    //Close other submenu in sidebar on opening any
    $("#sidebar > .nav > .nav-item > a[data-toggle='collapse']").on("click", function () {
      $("#sidebar > .nav > .nav-item").find('.collapse.show').collapse('hide');
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    window.onscroll = function() {makeSticy()};

    let navbar = document.getElementById("navbar");
    let sticky = navbar.offsetTop;

    function makeSticy() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("fixed-top");
      } else {
        navbar.classList.remove("fixed-top");
      }
    }

    $("tbody tr").click(function() {
      $(this).addClass('selected').siblings().removeClass("selected");
    });

  });
})(jQuery);

function getTimeFromPicker(str) {
  let d = new Date();
  let date = new Date(str),
      mnth = ("0" + (date.getMonth() + 1)).slice(-2),
      day = ("0" + date.getDate()).slice(-2),
      hours = ("0" + date.getHours()).slice(-2),
      minutes = ("0" + date.getMinutes()).slice(-2);
  return date.getFullYear()+'/'+mnth+'/'+day+' '+hours+':'+minutes+':'+d.getSeconds();
}

function createUUID() {
  let s = [];
  let hexDigits = "0123456789abcdef";
  for (let i = 0; i < 36; i++) {
    s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
  }
  s[14] = "4";  // bits 12-15 of the time_hi_and_version field to 0010
  s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1);  // bits 6-7 of the clock_seq_hi_and_reserved to 01
  s[8] = s[13] = s[18] = s[23] = "-";

  return s.join("");
}


function convertToRupiah(angka)
{
  var rupiah = '';
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return rupiah.split('',rupiah.length-1).reverse().join('');
}
/**
 * Usage example:
 * alert(convertToRupiah(10000000)); -> "Rp. 10.000.000"
 */

function convertToAngka(rupiah)
{
  return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}
/**
 * Usage example:
 * alert(convertToAngka("Rp 10.000.123")); -> 10000123
 */



//table listing

function app_handle_listing_horisontal_scroll(listing_obj)
{
  //get table object
  let table_obj = $('.table', listing_obj);

  //get count fixed collumns params
  let count_fixed_collumns = table_obj.attr('data-count-fixed-columns');

  let wrapper_obj;
  let wrapper_left_margin;
  let table_collumns_width;
  let table_collumns_margin;
  if (count_fixed_collumns > 0) {
    //get wrapper object
    wrapper_obj = $('.table-scrollable', listing_obj);

    wrapper_left_margin = 0;

    table_collumns_width = [];
    table_collumns_margin = [];

    //calculate wrapper margin and fixed column width
    $('th', table_obj).each(function (index) {
      if (index < count_fixed_collumns) {
        wrapper_left_margin += $(this).outerWidth();
        table_collumns_width[index] = $(this).outerWidth();
      }
    });

    //calcualte margin for each column
    $.each(table_collumns_width, function (key, value) {
      let next_margin;
      if (key === 0) {
        table_collumns_margin[key] = wrapper_left_margin;
      } else {
        next_margin = 0;
        $.each(table_collumns_width, function (key_next, value_next) {
          if (key_next < key) {
            next_margin += value_next;
          }
        });

        table_collumns_margin[key] = wrapper_left_margin - next_margin;
      }
    });

    //set wrapper margin
    if (wrapper_left_margin > 0) {
      wrapper_obj.css('cssText', 'margin-left:' + wrapper_left_margin + 'px !important; width: auto')
    }

    //set position for fixed columns
    $('tr', table_obj).each(function () {
      //get current row height
      let current_row_height = $(this).outerHeight();

      $('th,td', $(this)).each(function (index) {

        //set row height for all cells
        $(this).css('height', current_row_height);


        //set position
        if (index < count_fixed_collumns) {
          $(this).css('position', 'absolute')
              .css('margin-left', '-' + table_collumns_margin[index] + 'px')
              .css('margin-top', '-0.0px')
              .css('height', current_row_height + 0.9)
              .css('width', table_collumns_width[index]);

          $(this).addClass('table-fixed-cell')
        }
      })
    })
  }
}