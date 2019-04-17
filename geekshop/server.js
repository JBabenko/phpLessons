const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();

app.use(express.static('./public'));
app.use(bodyParser.json());

app.get('/goods', (req, res) => {
    fs.readFile('./db/goods.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        res.send(data);
    });
});

app.get('/cart', (req, res) => {
    fs.readFile('./db/cart.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        const cart = JSON.parse(data);
        const total = cart.reduce((acc, item) => {
            return acc + item.price * item.quantity;
        }, 0);

        res.send({
            total: total,
            cart: cart,
        });
    });
});

app.post('/cart', (req, res) => {
    fs.readFile('./db/cart.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        
        const cart = JSON.parse(data);
        cart.push(req.body);

        const total = cart.reduce((acc, item) => {
            return acc + item.price * item.quantity;
        }, 0);

        fs.writeFile('./db/cart.json', JSON.stringify(cart), () => {
            res.send({
                item: req.body,
                total: total
            });
        });

        
        fs.readFile('./db/stats.json', 'utf-8', (err, data) => {
            if (err) {
                console.log(err);
                res.send('Ошибка');            
            }

            const stat = JSON.parse(data);
            const newStat = {
                action: 'Add item in cart',
                itemId: req.body.id,
                itemName: req.body.name,
                date: getDate()
            }

            stat.push(newStat);

            fs.writeFile('./db/stats.json', JSON.stringify(stat), () => {
                console.log('Item added in cart');
            });
        });
    });
});

app.patch('/cart/:id', (req, res) => {
    fs.readFile('./db/cart.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        let cart = JSON.parse(data);
        const quantityBefore = cart.find(item => item.id == req.params.id).quantity;

        cart = cart.map(item => {
            if (+item.id === +req.params.id) {
                item.quantity = req.body.quantity;
            }
            return item;
        });

        const itemAfterChange = cart.find(item => item.id == req.params.id);

        const total = cart.reduce((acc, item) => {
            return acc + item.price * item.quantity;
        }, 0);
        
        fs.writeFile('./db/cart.json', JSON.stringify(cart), () => {
            res.send({
                item: itemAfterChange,
                total: total
            });
        });

        fs.readFile('./db/stats.json', 'utf-8', (err, data) => {
            if (err) {
                console.log(err);
                res.send('Ошибка');            
            }

            const stat = JSON.parse(data);
            const newStat = {
                action: 'Change item quantity',
                itemId: itemAfterChange.id,
                itemName: itemAfterChange.name,
                oldValue: quantityBefore,
                newValue: itemAfterChange.quantity,
                date: getDate()
            }

            stat.push(newStat);

            fs.writeFile('./db/stats.json', JSON.stringify(stat), () => {
                console.log('Change item quantity');
            });
        });
    });
});

app.delete('/cart/:id', (req, res) => {
    fs.readFile('./db/cart.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }
        let cart = JSON.parse(data);
        const deletedItem = cart.find(item => item.id == req.params.id);
        cart = cart.filter(item => item.id != req.params.id);

        const total = cart.reduce((acc, item) => {
            return acc + item.price * item.quantity;
        }, 0);

        fs.writeFile('./db/cart.json', JSON.stringify(cart), () => {
            res.send({
                cart: cart,
                total: total,
            });
        });

        fs.readFile('./db/stats.json', 'utf-8', (err, data) => {
            if (err) {
                console.log(err);
                res.send('Ошибка');            
            }

            const stat = JSON.parse(data);
            const newStat = {
                action: 'Delete item from cart',
                itemId: deletedItem.id,
                itemName: deletedItem.name,
                date: getDate()
            }

            stat.push(newStat);

            fs.writeFile('./db/stats.json', JSON.stringify(stat), () => {
                console.log('Item deleted from cart');
            });
        });
    });
});

app.post('/users', (req, res) => {
    fs.readFile('./db/users.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        const users = JSON.parse(data);

        const existing = users.find(item => item.login === req.body.login);

        if (!existing) {
            users.push(req.body);
            fs.writeFile('./db/users.json', JSON.stringify(users), () => {
                res.send({
                    login: req.body.login,
                });
            });
        } else {
            fs.writeFile('./db/users.json', JSON.stringify(users), () => {
                res.send({
                    login: false,
                });
            });
        }
        
        
    });
});

app.get('/users', (req, res) => {
    fs.readFile('./db/users.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        const users = JSON.parse(data);
        if (Object.keys(req.query).length === 0) {
            res.send();
        }
        
        const login = req.query.login;
        const pass = req.query.pass;
        
        const existing = users.find(item => item.login === login);

        if (existing) {
            if (existing.pass === pass) {
                res.send({
                    access: true,
                    user: existing,
                });
            } else {
                res.send({
                    access: false,
                    message: 'Пароль введен неверно',
                });
            }
        } else {
            res.send({
                access: false,
                message: 'Такого пользователя нет',
            });
        }

    });
});

app.patch('/users/:login', (req, res) => {
    fs.readFile('./db/users.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        let users = JSON.parse(data);

        users = users.map(item => {
            if (item.login === req.params.login) {
                item.cart = req.body.cart;
            }
            return item;
        });
        
        fs.writeFile('./db/users.json', JSON.stringify(users), () => {
            res.send();
        });
    });
});

app.get('/reviews', (req, res) => {
    fs.readFile('./db/reviews.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        res.send(data);
    });
});

app.post('/reviews', (req, res) => {
    fs.readFile('./db/reviews.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }
        const reviews = JSON.parse(data);
        req.body.id = reviews.length + 1;
        reviews.push(req.body);

        fs.writeFile('./db/reviews.json', JSON.stringify(reviews), () => {
            res.send('Отзыв отправлен на модерацию');
        });
    });
});

app.patch('/reviews/:id', (req, res) => {
    fs.readFile('./db/reviews.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }

        let reviews = JSON.parse(data);
        reviews = reviews.map(item => {
            if (+item.id === +req.params.id) {
                item.status = req.body.status;
            }
            return item;
        });

        fs.writeFile('./db/reviews.json', JSON.stringify(reviews), () => {
            res.send(reviews);
        });
    });
});

app.delete('/reviews/:id', (req, res) => {
    fs.readFile('./db/reviews.json', 'utf-8', (err, data) => {
        if (err) {
            console.log(err);
            res.send('Ошибка');            
        }
        let reviews = JSON.parse(data);
        reviews = reviews.filter(item => +item.id !== +req.params.id);

        fs.writeFile('./db/reviews.json', JSON.stringify(reviews), () => {
            res.send(reviews);
        });
    });
});

app.listen(8888, () => {
    console.log('Server has been started');
});

function getDate() {
    const d = new Date();
    const year = d.getFullYear();
    let month = d.getMonth() + 1;
    month = month < 10 ? '0' + month : month;
    let date = d.getDate();
    date = date < 10 ? '0' + date : date;
    let hours = d.getHours();
    hours = hours < 10 ? '0' + hours : hours;
    let minutes = d.getMinutes();
    minutes = minutes < 10 ? '0' + minutes : minutes;
    let seconds = d.getSeconds();
    seconds = seconds < 10 ? '0' + seconds : seconds;
  
    return `${date}.${month}.${year} ${hours}:${minutes}:${seconds}`;
 }