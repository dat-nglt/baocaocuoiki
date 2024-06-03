var links = document.querySelectorAll('.header__nav a');
        var currentURL = window.location.href;
        for (var i = 0; i < links.length; i++) {
            if (links[i].href === currentURL) {
                links[i].classList.add("current-page");
            }else if(currentURL.includes('?page=listaccounts&pageNumber=')){
                links[2].classList.add("current-page");
            }else if(currentURL.includes('?page=listproducts&pageNumber=')){
                links[3].classList.add("current-page");
            }else if(currentURL.includes('?page=listclassify&pageNumber=')){
                links[4].classList.add("current-page");
            }
            else if(currentURL.includes('?page=listbills&pageNumber=') || currentURL.includes('?page=detailbill&id=')){
                links[5].classList.add("current-page");
            }else if(currentURL.includes('?page=logistics&pageNumber=')){
                links[6].classList.add("current-page");
            }
        }