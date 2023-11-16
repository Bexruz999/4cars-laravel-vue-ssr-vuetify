let headerMobile = document.querySelector(".header-mobile");
let headerMobileBurger = document.querySelector(".header-mobile__burger");
let productCountMinus = document.querySelector(".product-btn__count-minus");
let productCountPlus = document.querySelector(".product-btn__count-plus");
let productCountNum = document.querySelector(".product-btn__count-num");


  if (productCountMinus !=null & productCountPlus != null) {
    var productCountNum_num = 0;
    productCountNum.innerHTML = productCountNum_num;
    productCountMinus.onclick = function () {
      if (productCountNum_num >= 1) {
        productCountNum_num = productCountNum_num - 1;
        productCountNum.innerHTML = productCountNum_num;
      }
    }
    productCountPlus.onclick = function () {
      productCountNum_num = productCountNum_num + 1;
      productCountNum.innerHTML = productCountNum_num;
    }

  }


headerMobileBurger.onclick = function() {
  headerMobileBurger.classList.toggle("active-menu")
  headerMobile.classList.toggle("active-menu")
  document.body.classList.toggle("no_scroll")
};


window.onscroll = function() {
  stickyHeader()
};

function stickyHeader() {
  if (document.body.scrollTop > headerMobile.offsetHeight || document.documentElement.scrollTop > headerMobile.offsetHeight) {
    headerMobile.classList.add('sticky');
  } else {
    headerMobile.classList.remove('sticky');
  }
}
function addToBasket(id) {
    console.log(id);
    window.axios.get('/api/add_basket/' + id)
        .then((response) => {
            console.log(response.data)
        })
        .catch( (error) => {});
}
