var links = document.querySelectorAll('.header__nav a');
        var currentURL = window.location.href;
        for (var i = 0; i < links.length; i++) {
            if (links[i].href === currentURL) {
                links[i].classList.add("current-page");
            }else if(currentURL.includes('?page=listaccounts&pageNumber=')){
                links[1].classList.add("current-page");
            }else if(currentURL.includes('?page=listproducts&pageNumber=')){
                links[2].classList.add("current-page");
            }else if(currentURL.includes('?controller=admin&action=book&page=')){
                links[3].classList.add("current-page");
            }
            else if(currentURL.includes('?controller=admin&action=borrow&page=')){
                links[4].classList.add("current-page");
            }
            else if(currentURL.includes('?controller=admin&action=fine&page=')){
                links[6].classList.add("current-page");
            }
        }