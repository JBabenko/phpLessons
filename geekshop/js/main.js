const API_URL = 'http://php.gb/geekshop';

Vue.component('products-list', {
  props: ['query'],
  template: `
  <div>
    <error v-if="responseStatus != 200" :error="responseStatus"></error>
    <main v-else class="production-list">
      <div class="production-item" v-for="item in filteredItems">
        <a href="single.html" class="production-item-link">
            <img :src="item.icon" :alt="item.name" class="production-item-img">
            <div class="production-item-text">
                <p class="production-item-title">{{ item.name }}</p>
                <p class="production-item-price">\${{ item.price }}.00</p>
            </div>
        </a>
        <div class="production-item-addtocart">
            <div class="production-addtocart-link" @click="handleAddToCartClick(item)">
                <img src="img/icons/cart_white.svg" alt="" class="production-cart-icon">
                <span class="production-addtocart-text">Add to Cart</span>
            </div>
        </div>
      </div>
    </main>
    </div>
    `,
  data() {
    return {
      goods: [],
      responseStatus: 200
    }
  },
  methods: {
    handleAddToCartClick(item) {
      this.$emit('onbuy', item);
    }
  },
  computed: {
    filteredItems() {
      const regexp = new RegExp(this.query, 'i');
      return this.goods.filter((item) => regexp.test(item.name))
    },
  },
  mounted() {
    fetch(`${API_URL}/goods`)
      .then( (response) => {
        if (response.ok) {
          return response.json();
        } else {
          this.responseStatus = response.status;
        }
      }).then((goods) => {
        return this.goods = goods;
      });
  }
});

Vue.component('cart', {
  props: ['cart', 'total'],
  template: `<div>
              <div class="drop-cart" v-if="cart.length">
                <div class="drop-cart-goods">
                  <div class="item-in-cart" v-for="item in cart">
                      <a href="single.html" class="drop-cart-link">
                          <img :src="item.icon" :alt="item.name" class="drop-cart-img">
                      </a>
                      <div class="drop-cart-desc">
                          <a href="single.html"
                              class="drop-cart-itemname drop-cart-link">{{ item.name }}</a>
                          <div class="stars">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star-half-alt"></i>
                          </div>
                          <div class="drop-cart-price">
                              <span class="cart-quantity">
                                  <i class="fas fa-angle-up cart-quantity-handle cart-quantity-plus"
                                      @click="handleChangeQuantityClick(item, item.quantity + 1)"
                                  ></i>
                                  <i class="fas fa-angle-down cart-quantity-handle cart-quantity-minus"
                                      @click="handleChangeQuantityClick(item, item.quantity - 1)"
                                  ></i>
                                  {{ item.quantity }}
                              </span> x 
                              <span class="cart-price">\${{ item.price }}.00</span>
                          </div>
                      </div>
                      <i class="fas fa-times-circle cart-remove" @click="handleRemoveFromCartClick(item)"></i>
                  </div>
              </div>
              <div class="drop-cart-total">
                  <span>total</span>
                  <span>\${{ total }}.00</span>
              </div>
              <div class="drop-cart-buttons">
                  <a href="checkout.html" class="drop-cart-checkout drop-cart-button">Checkout</a>
                  <a href="shopping-cart.html" class="drop-cart-gotocart drop-cart-button">Go to cart</a>
              </div>
            </div>
            <div class="drop-cart" v-else>
              Корзина пуста
            </div>
            </div>`,
  methods: {
    handleChangeQuantityClick(item, value) {
      this.$emit('onchangequantity', item, value);
    },
    handleRemoveFromCartClick(item) {
      this.$emit('onremoveclick', item);
    }
  }
});

Vue.component('search', {
  props: [],
  template: `
  <div>
    <div class="header-form-search">
      <input v-model="searchQuery" @keyup.enter="handleSearch" type="text" class="header-form-input" placeholder="Search for Item...">
      <button @click="handleSearch"  class="header-form-button"><i class="fas fa-search"></i></button>
    </div>
  </div>
  `,
  data() {
    return {
      searchQuery: ''
    }
  },
  methods: {
    handleSearch() {
      this.$emit('onsearch', this.searchQuery)
    }
  }
});

Vue.component('error', {
  props: ['error'],
  template: `<div>Ошибка при запросе с сервера. Код ошибки: {{ error }}</div>`
});

Vue.component('account-menu', {
  props: ['user'],
  template: `
    <div class="button header-account-button">{{ getUser }}
      <span class="header-account-arrow">▼</span>
      <ul class="header-account-menu" v-if="!user">
        <li class="header-account-menu-item" @click="handleOpenWindow('signin')">Вход</li>
        <li class="header-account-menu-item" @click="handleOpenWindow('signup')">Регистрация</li>
      </ul>
      <ul class="header-account-menu" v-else>
        <li class="header-account-menu-item">Профиль</li>
        <li class="header-account-menu-item">Оформить заказ</li>
        <li class="header-account-menu-item" @click="logOut">Выход</li>
      </ul>
    </div>
  `,
  methods: {
    handleOpenWindow(window) {
      this.$emit(`open-${window}`);
    },
    logOut() {
      this.$emit('logout');
    }
    
  },
  computed: {
    getUser() {
      return this.user === null ? 'My Account' : this.user.name;
    }
  },
});

Vue.component('sign-up', {
  props: ['isopen'],
  template: `
    <div class="modal modal-signup" v-if="isopen" @click.self="handleCloseWindow">
      <div class="modal__window">
        <h2 class="modal__title">Регистрация</h2>
        <form @submit.prevent="handleFormSubmit" class="signup modal-form">
            <label for="signup-name" class="modal-form__label">Ваше имя</label>
            <input v-model="name" id="signup-name" name="name" type="text" class="modal-form__input" required>
            
            <label for="signup-login" class="modal-form__label">Логин для входа</label>
            <input v-model="login" id="signup-login" name="login" type="text" class="modal-form__input" required>

            <label for="signup-pass" class="modal-form__label">Пароль</label>
            <input v-model="password" id="signup-pass" name="pass" type="password" class="modal-form__input" required>
            
            <input type="submit" value="Зарегистрироваться" class="modal-form__submit">
        </form> 
        <i class="fas fa-times modal__close" @click="handleCloseWindow"></i>
      </div>
    </div>
  `,
  data() {
    return {
      name: '',
      login: '',
      password: '',
    }
  },
  methods: {
    handleFormSubmit() {
      fetch(`${API_URL}/users`, {
        method: 'POST',
        body: JSON.stringify({
          name: this.name,
          login: this.login,
          pass: this.password,
        }),
        headers: {
          'Content-Type': 'application/json'
        }
      }).then(response => response.json())
        .then(result => {
          if (result.login) {
            this.handleCloseWindow();
            this.login = '';
            this.password = '';
            alert('Регистрация прошла успешно. Теперь вы можете зайти в аккаунт. Ваш логин: ' + result.login);
          } else {
            alert('Пользователь с таким именем существует!');
          }
          
        });

    },
    handleCloseWindow() {
      this.$emit('close');
    }
  }
});

Vue.component('sign-in', {
  props: ['isopen', 'user'],
  template: `
    <div class="modal modal-signup" v-if="isopen">
      <div class="modal__window">
        <span class="modal__error" v-if="error">{{ error }}</span>
        <h2 class="modal__title">Авторизация</h2>
        <form @submit.prevent="handleFormSubmit" class="signup modal-form">
            <label for="signup-login" class="modal-form__label">Логин</label>
            <input v-model="login" id="signup-login" name="login" type="text" class="modal-form__input" required>
            <label for="signup-pass" class="modal-form__label">Пароль</label>
            <input v-model="password" id="signup-pass" name="pass" type="password" class="modal-form__input" required>
            <input type="submit" value="Войти" class="modal-form__submit">
        </form> 
        <i class="fas fa-times modal__close" @click="handleCloseWindow"></i>
      </div>
    </div>
  `,
  data() {
    return {
      login: '',
      password: '',
      error: null,
    }
  },
  methods: {
    handleFormSubmit() {
      fetch(`${API_URL}/users?login=${this.login}&pass=${this.password}`)
        .then(response => response.json())
        .then(result => {
          if (result.access) {
            this.handleCloseWindow();
            this.login = '';
            this.password = '';
            this.error = null;
            localStorage.setItem('user', JSON.stringify(result.user));
            this.setUser(result.user);
          } else {
            this.error = result.message;
            this.password = '';
          }
          
        });

    },
    handleCloseWindow() {
      this.$emit('close');
    },
    setUser(user) {
      this.$emit('signin', user);
    }
  }
});

Vue.component('add-review', {
  props: ['isopen'],
  template: `
    <div class="modal modal-review" v-if="isopen">
      <div class="modal__window">
        <span class="modal__error" v-if="error">{{ error }}</span>
        <h2 class="modal__title">Добавить отзыв</h2>
        <form @submit.prevent="handleFormSubmit" class="add-review modal-form">
            <label for="review-text" class="modal-form__label">Ваш отзыв</label>
            <textarea v-model="text" id="review-text" name="text" type="text" class="modal-form__input modal-form__textarea" required></textarea>
            <label for="review-name" class="modal-form__label">Имя</label>
            <input v-model="name" id="review-name" name="name" type="text" class="modal-form__input" required>
            <input type="submit" value="Отправить" class="modal-form__submit">
        </form> 
        <i class="fas fa-times modal__close" @click="handleCloseWindow"></i>
      </div>
    </div>
  `,
  data() {
    return {
      name: '',
      text: '',
      error: null,
    }
  },
  methods: {
    handleFormSubmit() {
      fetch(`${API_URL}/reviews`, {
        method: 'POST',
        body: JSON.stringify({
          name: this.name,
          text: this.text,
          date: getDate(),
          status: 'pending',
        }),
        headers: {
          'Content-Type': 'application/json'
        },
      }).then(() => {
          alert('Ваш отзыв отправлен на модерацию');
          this.text = '';
          this.name = '';
          this.$emit('close');
        });

    },
    handleCloseWindow() {
      this.$emit('close');
    },
    setUser(user) {
      this.$emit('signin', user);
    }
  }
});

Vue.component('reviews', {
  template: `
    <div class="wrapper">
      <h3 class="title-extra">Отзывы</h3>
      <div class="container reviews">
          <ul class="reviews-list">
              <li class="review" v-for="item in allowed">
                <figure class="feedback-comment">
                  <img src="img/comment_photo.png" alt="" class="feedback-comment-photo">
                  <div class="feedback-comment-right">
                      <p class="feedback-comment-text">{{ item.text }}</p>
                      <p class="feedback-comment-name">{{ item.name }}</p>
                      <p class="feedback-comment-city">{{ item.date }}</p>
                  </div>
                </figure>
              </li>
          </ul>
          <button class="review-add button" @click="handleAddReviewClick">Написать отзыв</button>
      </div>
    </div>
    `,
  data() {
    return {
      allowed: [],
    }
  },
  methods: {
    handleAddReviewClick() {
      this.$emit('show-review');
    }
  },
  mounted() {
    fetch(`${API_URL}/reviews`)
      .then( (response) => response.json())
      .then((reviews) => {
        return this.allowed = reviews.filter(item => item.status === 'allowed');
      });
  },
});

const app = new Vue({
  el: '#app',
  data: {
    goods: [],
    cart: [],
    responseStatus: 200,
    searchQuery: '',
    cartTotal: 0,
    url: '',
    signUpWindow: false,
    signInWindow: false,
    addReviewWindow: false,
    user: null,
  },
  methods: {
    handleSearch(query) {
      this.searchQuery = query;
    },
    handleAddToCartClick(item) {
      const itemInCart = this.cart.find(cartItem => cartItem.id == item.id);
      
      if (!itemInCart) {
        return fetch(`${API_URL}/cart`, {
          method: 'POST',
          body: JSON.stringify({...item, quantity: 1}),
          headers: {
            'Content-Type': 'application/json'
          }
        }).then(response => response.json())
          .then((result) => {
            this.cart.push(result.item);
            this.cartTotal = result.total;
          });
      } else {
        return fetch(`${API_URL}/cart/${itemInCart.id}`, {
          method: 'PATCH',
          body: JSON.stringify({
            quantity: +itemInCart.quantity + 1
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        }).then(response => response.json())
          .then((result) => {
            const itemIdx = this.cart.findIndex(cartItem => cartItem.id == item.id);
            Vue.set(this.cart, itemIdx, result.item);
            this.cartTotal = result.total;
          });
      }
    },
    handleRemoveFromCartClick(item) {
      return fetch(`${API_URL}/cart/${item.id}`, {
          method: 'DELETE'
        }).then(response => response.json())
          .then((result) => {
            const itemIdx = this.cart.findIndex(cartItem => cartItem.id == item.id);
            Vue.delete(this.cart, itemIdx);
            this.cartTotal = result.total;
          });
    },
    handleChangeQuantityClick(item, value) {
      if (value <= 0) {
        return fetch(`${API_URL}/cart/${item.id}`, {
          method: 'DELETE'
        }).then(response => response.json())
          .then((result) => {
            const itemIdx = this.cart.findIndex(cartItem => cartItem.id == item.id);
            Vue.delete(this.cart, itemIdx);
            this.cartTotal = result.total;
        });
      } else {
        return fetch(`${API_URL}/cart/${item.id}`, {
          method: 'PATCH',
          body: JSON.stringify({
            quantity: value
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        }).then(response => response.json())
          .then((result) => {
          const itemIdx = this.cart.findIndex(cartItem => cartItem.id == item.id);
          Vue.set(this.cart, itemIdx, result.item);
          this.cartTotal = result.total;
        });
      }
    },
    signIn(user) {
      this.user = user;
    },
    logOut() {
        this.user = null;
        localStorage.removeItem('user');
      
    },
  },
  mounted() {
    fetch(`${API_URL}/cart`)
      .then((response) => response.json())
      .then((result) => {
        this.cart = result.cart;
        this.cartTotal = result.total;
      });

    const activeUser = JSON.parse(localStorage.getItem('user'));
    this.user = activeUser;
  }
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