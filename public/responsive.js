function $(id) {
            return document.getElementById(id)
        }
        var upload_button = $("upload_button"),
            up = $("up");
        document.onclick = function () {
            up.style.display = "none";
        }

        upload_button.addEventListener('click', function (e) {
            stopFunc(e);
            up.style.display = "block";
        }, false)
        up .addEventListener('click', function (e) {
            stopFunc(e);
        }, false)
        
        function stopFunc(e) { 
            e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
        }