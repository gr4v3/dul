document.addEventListener('DOMContentLoaded', function() {
    Mustache.Formatters = {
        'uppercase': function (str) {
            return str.toUpperCase();
        },
        'lpad': function (str, num, sep) {
            sep = sep || " ";
            str = "" + str;
            let filler = "";
            while ((filler.length + str.length) < num) { filler += sep }
            return (filler + str).slice(-num);
        },
        'date': function (dt) {
            let lpad  = Mustache.Formatters.lpad,
                day   = lpad(dt.getDate(), 2, "0"),
                month = lpad(dt.getMonth()+1, 2, "0");
            return  day + "/" + month + "/" + dt.getFullYear();
        },
        'price' : function(num) {
            return accounting.formatMoney(num, "€", 2, ".", ",")
        }
    };
    let lang = store.get('lang');
    let UUID = store.get('UUID', false);
    if (UUID === false) {
        UUID = crypto.randomUUID();
        store.set('UUID', UUID);
    }
    let cart = store.get('cart', false);
    if (cart === false) {
        cart =  {
            items: {},
            customer: {
                uuid: UUID,
                lang: store.get('lang')
            },
            total: 0
        };
        store.set('cart', cart);
    }
    const cartButton = document.querySelector('div:has(.fa-cart-shopping)');
    if (cart.total) {
        cartButton.dataset.qtd = String(cart.total);
    }
    cartButton.addEventListener('click', function() {
        let dialog = document.querySelector('dialog');
        if (dialog) {
            dialog.parentElement.removeChild(dialog);
        }
        dialog = document.createElement('dialog');
        document.body.appendChild(dialog);
        let item = {
            checkout: [],
            total: 0
        }
        for(let size in cart.items) {
            if (cart.items.hasOwnProperty(size)) {
                item.checkout.push({
                    sku: 'DUL' + String(size).padStart(3, '0') + String(cart.items[size]).padStart(2, '0'),
                    size: size,
                    amount: cart.items[size],
                    unit: 15,
                    total: 15 * cart.items[size],
                });
                item.total+= 15 * cart.items[size];
            }
        }
        fetch('views/cart.tmpl?' + new Date().getMilliseconds()).then(function(response) {
            response.text().then(function(template) {
                dialog.innerHTML = Mustache.render(template, item);
                dialog.showModal();
                dialog.querySelector('.fa-circle-xmark').addEventListener('click', function() {
                    dialog.parentElement.removeChild(dialog);
                })
                dialog.querySelector('button.btn-danger').addEventListener('click', function() {
                    if (confirm('Tem a certeza ?')) {
                        cartButton.attributes.removeNamedItem('data-qtd');
                        store.set('cart', {
                            items: {},
                            customer: {
                                uuid: UUID,
                                lang: store.get('lang')
                            },
                            total: 0
                        });
                        dialog.close();
                    }

                })
                dialog.querySelector('button.btn-success').addEventListener('click', function() {
                    fetch('paypal/index.php', {
                        method: 'POST',
                        body: JSON.stringify(cart),
                        headers: { "Content-Type": "application/json" }
                    }).then(function(response) {
                        response.text().then(function(link) {
                            window.location = link;
                        })
                    })
                })
            })
        })
    })
    fetch('views/store/' + lang + '.tmpl').then(function(response) {
        response.text().then(function(template) {
            document.querySelector('main > div').innerHTML = template;
            document.querySelectorAll('form').forEach(function(element) {
                element.onsubmit = function() {
                    if(element.checkValidity()) {
                        let cartUpdated = store.get('cart', false);
                        let data = {
                            size: element.elements.namedItem('size').value,
                            qtd: Number(element.elements.namedItem('qtd').value)
                        };
                        if (!cartUpdated.items.hasOwnProperty(data.size)) {
                            cartUpdated.items[data.size] = 0;
                        }
                        cartUpdated.items[data.size]+= data.qtd;
                        cartUpdated.total = Object.values(cartUpdated.items).reduce((a, b) => a + b, 0);
                        cartButton.dataset.qtd = String(cartUpdated.total);
                        store.set('cart', cartUpdated);
                    }
                    return false;
                }
            })
        })
    })
})