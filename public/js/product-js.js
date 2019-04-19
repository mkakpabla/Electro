let images = document.querySelectorAll('.img-item');
images.forEach(image => {
    image.addEventListener('click', function (e) {
        e.preventDefault();
        let src = this.firstChild.src;
        let parent = this.parentNode.parentNode;
        parent.firstChild.src = src

    })
});
