/*=========


Template Name: Portfolio -  HTML Template

=========*/

/*=========
----- JS INDEX -----

=========*/

$(document).ready(function($) {

	// Whole Script Strict Mode Syntax
	"use strict";
    $("[data-background").each(function() {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    });

	      // Magnific popup
          $('.youtube-btn').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'https://www.youtube.com/',
    
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
    
                },
                srcAction: 'iframe_src',
            }
         });  
         $(".trending-carousel").owlCarousel({
          nav: true,
          loop:false,
          dots: false,
          pagination: false,
          margin: 25,
          autoHeight: false,
          stagePadding: 50,
          responsive:{
            0:{
              items: 1,
              stagePadding: 0,
              margin: 30,
            },
            767:{
              items: 2,
              stagePadding: 25,
            },
            1000:{
              items: 3,
            }
          }
        });
        var $portfolioSlider = $(".categories-slider");
          $portfolioSlider.owlCarousel({
              loop: false,
              nav: true,
              navText: [
                  '<i class="fa fa-chevron-left"></i>',
                  '<i class="fas fa-chevron-right"></i>',
              ],
              dots: false,
              autoplay: false,
              margin: 15,
              responsive: {
                  0: {
                      items: 1,
                  },
                  575: {
                    items: 2,
                 },
                  768: {
                      items: 2,
                  },
                  992: {
                      items: 3,
                  },
                  1399: {
                      items: 5,
                  },
              }
          });
      
          
        // Activate Bootstrap tab when clicking on a tab item in the carousel
        $('.nav-link').on('click', function() {
          $('.nav-link').removeClass('active');
          $(this).addClass('active');
        });
      
      
      
        const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon"),
        links = document.querySelectorAll(".link");
      
        pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
            
            pwFields.forEach(password => {
                if(password.type === "password"){
                    password.type = "text";
                    eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
                    return;
                }
                password.type = "password";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            })
            
        })
      });     
      
      links.forEach(link => {
        link.addEventListener("click", e => {
          e.preventDefault(); //preventing form submit
          forms.classList.toggle("show-signup");
        })
      });
 // utlity
 function qs(elem) {
  return document.querySelector(elem);
}
function qsa(elem) {
  return document.querySelectorAll(elem);
}

// globals
var activeCon = 0,
  totalCons = 0;

// elements

const v_cons = qsa(".video-con"),
  a_cons = qsa(".active-con"),
  v_count = qs("#video-count"),
  info_btns = qsa("#lower-info div"),
  drop_icon = qs("#drop-icon"),
  video_list = qs("#v-list"),
  display = qs("#display-frame");

// activate container
function activate(con) {
  deactivateAll();
  indexAll();
  countVideos(con.querySelector(".index").innerHTML);
  con.classList.add("active-con");
  con.querySelector(".index").innerHTML = "►";
}
// deactivate all container
function deactivateAll() {
  v_cons.forEach((container) => {
    container.classList.remove("active-con");
  });
}
// index containers
function indexAll() {
  var i = 1;
  v_cons.forEach((container) => {
    container.querySelector(".index").innerHTML = i;
    i++;
  });
}
// update video count
function countVideos(active) {
  v_count.innerHTML = active + " / " + v_cons.length;
}
// icon activate
function toggle_icon(btn) {
  if (btn.classList.contains("icon-active")) {
    btn.classList.remove("icon-active");
  } else btn.classList.add("icon-active");
}
// toggle video list
function toggle_list() {
  if (video_list.classList.contains("li-collapsed")) {
    drop_icon.style.transform = "rotate(0deg)";
    video_list.classList.remove("li-collapsed");
  } else {
    drop_icon.style.transform = "rotate(180deg)";
    video_list.classList.add("li-collapsed");
  }
}
function loadVideo(url) {
  display.setAttribute("src", url);
}

//******************
// Main Function heres
//******************
window.addEventListener("load", function () {
  // starting calls
  indexAll(); // container indexes
  countVideos(1);
  activate(v_cons[0]);
  loadVideo(v_cons[0].getAttribute("video"));

  // Event handeling goes here
  // on each video container click
  v_cons.forEach((container) => {
    container.addEventListener("click", () => {
      activate(container);
      loadVideo(container.getAttribute("video"));
    });
  });
  // on each button click
  info_btns.forEach((button) => {
    button.addEventListener("click", () => {
      toggle_icon(button);
    });
  });
  // drop icon click
  drop_icon.addEventListener("click", () => {
    toggle_list();
  });
});
});

