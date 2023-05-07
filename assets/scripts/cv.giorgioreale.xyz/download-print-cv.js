document.addEventListener("DOMContentLoaded", () => {
    const buttonDownloadPrintCV = document.querySelector("#button-download-print-cv");
    if (!!buttonDownloadPrintCV) {
        buttonDownloadPrintCV.addEventListener("click", (event) => {
            event.preventDefault();
            window.print();
        });
    }
});