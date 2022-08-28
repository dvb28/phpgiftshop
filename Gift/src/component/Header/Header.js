import { $ } from "../Component.js"; 

const header = $('.header')
const accountBtn = $('.no-login__account');
const userBtn = $('.action-user');
const cartBtn = $('.action-cart');
const helpBtn = $('.no-login__help');
const overlay = $('.overlay');
const overlayCheckbox = document.getElementById("overlay-checkbox");

var Header = {
  handleEvent() {
    // Window Handle Scroll
    window.addEventListener("scroll", function (e) {
      if (this.scrollY > 1) {
        header.classList.add("scrolling");
      } else {
        header.classList.remove("scrolling");
      }
    });

    // Check Overlaycheck
    let checkOverLay = () => {
      if(overlayCheckbox.checked == true) {
        header.classList.add('overlay-check');
      } else {
        header.classList.remove('overlay-check');
      }
    }

    // Overlay Handle Click
    overlay.onclick = () => {
      let array = [];
      if(!localStorage.getItem('status')) {
        array = [accountBtn, helpBtn]
      } else if(localStorage.getItem('status') == 'signIn') {
        array = [userBtn, cartBtn]
      }
      array.forEach((item) => {
          if(item.getAttribute('aria-expanded') == 'true') {
            item.click();
            overlayCheckbox.checked == true ? overlayCheckbox.checked = true : overlayCheckbox.checked = false;
            checkOverLay();
            return;
          }
      });
    }
    // Handle Overlay Show
    let showOrHideOverlay = (currClick, nextClick) => {
      if(nextClick.getAttribute('aria-expanded') == 'true') {
        nextClick.click();
      } else if(nextClick.getAttribute('aria-expanded') == 'false') {
        if(currClick.getAttribute('aria-expanded') == 'true') {
          overlayCheckbox.checked = true;
        } else if(currClick.getAttribute('aria-expanded') == 'false'){
          overlayCheckbox.checked = false;
        }
      }
      checkOverLay();
    }
    if(!localStorage.getItem('status')) {
      // Account Btn Click
      accountBtn.onclick = () => {
        showOrHideOverlay(accountBtn, helpBtn);
      };
      // Help Btn Click
      helpBtn.onclick = () => {
        showOrHideOverlay(helpBtn, accountBtn);
      };
    } else if(localStorage.getItem('status') == 'signIn'){
      // User Btn Click
      userBtn.onclick = () => {
        showOrHideOverlay(userBtn, cartBtn);
      };
      // Cart Btn Click
      cartBtn.onclick = () => {
        showOrHideOverlay(cartBtn, userBtn);
      };
    }
  },
  start() {
      // Onload
      window.onload = () => {
        overlayCheckbox.checked = false;
      },
    Header.handleEvent();
  },
};

Header.start();
