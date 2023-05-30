document.addEventListener('DOMContentLoaded', function() {
    let triggerSound = function() {
        return new Promise(function(resolve) {
            let audio = document.querySelector('audio');
            if (audio.paused) {
                audio.play().then(function() {
                    resolve();
                });
            } else {
                audio.pause();
                audio.paused = true;
                resolve();
            }

        }).then(function() {
            document.querySelector('section.permission').classList.toggle('muted');
        })
    }
    document.querySelector( 'section.permission' ).addEventListener( 'click', function() {
        triggerSound().then(function() {
            document.querySelector('h2').classList.toggle('muted');
        });
    });
    document.querySelector( 'h2' ).addEventListener( 'click', function() {
        triggerSound().then(function() {
            document.querySelector('h2').classList.toggle('muted');
        });
    });

});