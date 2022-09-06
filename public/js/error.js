const errorBox = document.querySelector("#error");
errorBox.style.bottom = "10%";
errorBox.addEventListener("click", fechar)

function fechar() {
    errorBox.removeEventListener("click", fechar);
    errorBox.style.bottom = "-15%";
    setTimeout(() => { errorBox.parentElement.removeChild(errorBox) }, 300);
}