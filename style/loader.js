
document.querySelector('.overlayLoader').style.display = 'flex';

window.addEventListener("load", function() {

    setTimeout(function() {
        document.querySelector('.overlayLoader').style.display = 'none';
    }, 500);
});

window.addEventListener("beforeunload", function() {
    document.querySelector('.overlayLoader').style.display = 'flex';


}); 


window.addEventListener("pageshow", function(event) {
    if (event.persisted) {
        setTimeout(function(){
            document.querySelector('.overlayLoader').style.display = 'none';
        },800)
    }
});