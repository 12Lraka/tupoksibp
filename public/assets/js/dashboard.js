require.config({
    shim: {
        'bootstrap': ['jquery'],
        'sparkline': ['jquery'],
        'tablesorter': ['jquery'],        
        'core': ['bootstrap', 'jquery'],
    },
    paths: {
        'core': 'assets/js/core',
        'jquery': 'assets/js/jquery.min',
        'bootstrap': 'assets/js/bootstrap.bundle.min',
        'tablesorter': 'assets/js/vendors/jquery.tablesorter.min',
    }
});

require(['core']);

function startTimeClock() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTimeClock(m);
    s = checkTimeClock(s);
    document.getElementById('clock').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startTimeClock, 500);
}

function checkTimeClock(i) {
    if (i < 10) {
        i = "0" + i
    };
    return i;
}

function fileValidationPdf() {
    var fileInput =
        document.getElementById('filePdf');

    var filePath = fileInput.value;

    // Allowing file type 
    var allowedExtensions =
        /(\.pdf)$/i;

    if (!allowedExtensions.exec(filePath)) {
        toastr['error']("Format file tidak valid", "Kesalahan")
        fileInput.value = '';
        return false;
    } 
}

