var formBtns = document.querySelectorAll('.js-btnForm')
var modal = document.querySelector('.js-modal')
var modalContainer = document.querySelector('.js-modal-container')
var addBtn = document.querySelector('.js-btnAdd')
var modalAdd = document.querySelector('.js-modal-add')
var modalContainerAdd = document.querySelector('.js-modal-container-add')
var modalCloseS = document.querySelectorAll('.js-modal-close')

for (var i = 0; i< formBtns.length; i++) {
    
    formBtns[i].addEventListener('click', function() {
        var dataID = this.getAttribute("data-id");
        var checkLink = "index.php?page=listclassfity&id=" + dataID;

        window.location.href = checkLink;   
        modal.classList.add('openForm');
    });
}

var currentURL = window.location.href;
var checkLink = "index.php?page=listclassfity&id="; 

if (currentURL.indexOf(checkLink) !== -1) {
    modal.classList.add('openForm');
}

function addForm() {
    modalAdd.classList.add('openForm');
}


function closeForm() {
    modal.classList.remove('openForm')
    window.location.href = "index.php?page=listclassfity";
}

for (var modalClose of modalCloseS) {
    modalClose.addEventListener('click', closeForm)
    
}

addBtn.addEventListener('click', addForm)

modal.addEventListener('click', closeForm)

modalAdd.addEventListener('click', closeForm)

modalContainer.addEventListener('click', function(event)
    {
        event.stopPropagation()
    })

modalContainerAdd.addEventListener('click', function(event)
    {
        event.stopPropagation()
    })    


