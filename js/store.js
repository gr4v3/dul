
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
    let UUID = store.get('UUID', false);
    if (UUID === false) {
        try {
            UUID = Crypto.randomUUID();
        } catch (e) {
            UUID = 'testing123';
        }
        store.set('UUID', UUID);
    }
    let cart = store.get('cart', false);
    if (cart === false) {
        cart =  {
            items: {},
            customer: {
                uuid: UUID,
                details: {}
            },
            notes: false,
            total: 0
        };
        document.querySelectorAll('select#size option').forEach(function(option) {
            if (option.disabled === false) {
                cart.items[option.value] = 0;
            }
        })
        store.set('cart', cart);
    }
    const cartButton = document.querySelector('div:has(.fa-cart-shopping)');
    cartButton.dataset.qtd = cart.total;
    document.querySelectorAll('form').forEach(function(element) {
        element.onsubmit = function() {
            if(element.checkValidity()) {
                let data = {
                    size: element.elements.namedItem('size').value,
                    qtd: element.elements.namedItem('qtd').value
                }
                cart.items[data.size]+= Number(data.qtd);
                cart.total+= Number(data.qtd);
                cartButton.dataset.qtd = cart.total;
                store.set('cart', cart);
            }
            return false;
        }
    })
    cartButton.addEventListener('click', function() {
        let dialog = document.querySelector('dialog');
        if (!dialog) {
            dialog = document.createElement('dialog');
            document.body.appendChild(dialog);
        }
        cart.checkout = [];
        cart.total = 0;
        for(let size in cart.items) {
            if (cart.items[size]) {
                cart.checkout.push({
                    size: size,
                    amount: cart.items[size],
                    unit: 15,
                    total: 15 * cart.items[size],
                });
                cart.total+= 15 * cart.items[size];
            }
        }
        fetch('views/cart.tmpl').then(function(response) {
            response.text().then(function(template) {
                dialog.innerHTML = Mustache.render(template, cart);
                dialog.showModal();
                dialog.querySelector('button.btn-danger').addEventListener('click', function() {
                    if (confirm('Tem a certeza ?')) {
                        cart =  {
                            items: {},
                            customer: {
                                uuid: UUID,
                                details: {}
                            },
                            notes: false,
                            total: 0
                        };
                        document.querySelectorAll('select#size option').forEach(function(option) {
                            if (option.disabled === false) {
                                cart.items[option.value] = 0;
                            }
                        })
                        cartButton.attributes.removeNamedItem('data-qtd');
                        store.set('cart', cart);
                        dialog.close();
                    }

                })
            })
        })

    })
})