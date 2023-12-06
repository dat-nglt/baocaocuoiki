document.querySelector('#newImg').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
      var imageUrl = event.target.result;
      var img = document.createElement('img');
      img.src = imageUrl;
      var oldimg = document.querySelector('#oldimg');
      oldimg.style.display="none";
      var imageContainer = document.querySelector('#imgContainer');
      imageContainer.innerHTML = '';
      imageContainer.appendChild(img);
    };
    reader.readAsDataURL(file);
  });