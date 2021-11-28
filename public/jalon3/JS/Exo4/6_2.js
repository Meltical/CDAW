let dropbox = document.getElementById("dropbox");
let upload = document.getElementById("upload");
let preview = document.getElementById("preview");

function handleFiles(files) {

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (!file.type.startsWith('image/')) { continue }
        if (preview.children[0] != null) { preview.children[0].remove() }
        let img = document.createElement("img");
        img.src = file;
        preview.append(img)

        const reader = new FileReader();
        reader.onload = (function (aImg) { return function (e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
        upload.style.visibility = "hidden"
    }
}

function droppedImage(event) {
    event.preventDefault();
    handleFiles(event.dataTransfer.files);
}
