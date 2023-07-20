const loadImg = document.querySelector('.load-img');
console.log(loadImg);
loadImg.addEventListener('change', function () {
    const [file] = loadImg.files
    if (file) {
        blah.src = URL.createObjectURL(file)
        blah.style.display = '';
    }
})
