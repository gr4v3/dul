document.addEventListener('DOMContentLoaded', function() {
    let triggerSound = function() {
        return new Promise(function(resolve) {
            let audio = document.querySelector('audio');
            if (audio.paused) {
                audio.play().then(function() {
                    //dataLayer.push({'event': 'select_item'});
                    resolve();
                });
            } else {
                audio.pause();
                audio.paused = true;
                //dataLayer.push({'event': 'select_item'});
                resolve();
            }

        }).then(function() {
            document.querySelector('section.permission').classList.toggle('muted');
        })
    }
    let articleContainer = document.querySelector('div.article');
    if (articleContainer) {
        let pathname = window.location.pathname.slice(1,3);
        if (pathname.length && ['fr', 'pt', 'en'].indexOf(pathname)>-1) {
            store.set('lang', pathname);
        }
        let lang = store.get('lang', 'pt');
        fetch('/views/landing/' + lang + '.tmpl').then(function(response) {
            response.text().then(function(template) {
                let div = document.createElement('div');
                div.innerHTML = template;
                articleContainer.parentElement.replaceChild(div.querySelector('article'), articleContainer);
                div = null;
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
            })
        })
    }
});