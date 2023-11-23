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
            document.getElementById('basketCount').innerText = sum(response.data)
            console.log(response.data)
        })
        .catch( (error) => {});
}
function sum( obj ) {
    var sum = 0;
    for( var el in obj ) {
        if( obj.hasOwnProperty( el ) ) {
            sum += parseFloat( obj[el] );
        }
    }
    return sum;
}


//<editor-fold desc="Basket form">
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        //document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    /*for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }*/
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}

function addaddress(n) {
    console.log(document.getElementById('address').value = 'test address main js 138');
    document.getElementById('address2').innerText = 'test address main js 138';
    nextPrev(n);
}
//</editor-fold>
