const API_URL = 'http://localhost:8888';

Vue.component('reviews-pending', {
    template: `
        <div class="reviews">
            <ul class="reviews-list">
                <li class="review" v-for="item in pending">
                    <figure class="feedback-comment">
                        <img src="../img/comment_photo.png" alt="" class="feedback-comment-photo">
                        <div class="feedback-comment-right">
                            <p class="feedback-comment-text">{{ item.text }}</p>
                            <p class="feedback-comment-name">{{ item.name }}</p>
                            <p class="feedback-comment-city">{{ item.date }}</p>
                        </div>
                    </figure>
                    <div class="review__controls">
                        <button class="review__allow review__button" @click="handleModerateClick(item, 'allowed')">Одобрить</button>
                        <button class="review__reject review__button" @click="handleModerateClick(item, 'rejected')">Отклонить</button>
                    </div>
                    
                </li>
            </ul>
        </div>
    `,
    data() {
        return {
            pending: [],
        }
    },
    methods: {
        handleModerateClick(item, action) {
            return fetch(`${API_URL}/reviews/${item.id}`, {
                method: 'PATCH',
                body: JSON.stringify({
                    status: action,
                }),
                headers: {
                    'Content-Type': 'application/json'
                },
            }).then(response => response.json())
                .then(result => {
                    this.pending = result.filter(item => item.status === 'pending');
                    this.$emit('count-pending-reviews', this.pending.length);
                });
        }
    },
    mounted() {
        fetch(`${API_URL}/reviews`)
            .then( (response) => response.json())
            .then((reviews) => {
                this.pending = reviews.filter(item => item.status === 'pending');
                this.$emit('count-pending-reviews', this.pending.length);
            });
    }
});

Vue.component('reviews-allowed', {
    template: `
        <div class="reviews">
            <ul class="reviews-list">
                <li class="review" v-for="item in allowed">
                    <figure class="feedback-comment">
                        <img src="../img/comment_photo.png" alt="" class="feedback-comment-photo">
                        <div class="feedback-comment-right">
                            <p class="feedback-comment-text">{{ item.text }}</p>
                            <p class="feedback-comment-name">{{ item.name }}</p>
                            <p class="feedback-comment-city">{{ item.date }}</p>
                        </div>
                    </figure>
                    <div class="review__controls">
                        <button class="review__allow review__button" @click="handleModerateClick(item, 'pending')">Изменить решение</button>
                        <button class="review__reject review__button" @click="handleDeleteClick(item)">Удалить</button>
                    </div>
                </li>
            </ul>
        </div>
    `,
    data() {
        return {
            pending: [],
            allowed: [],
        }
    },
    methods: {
        handleModerateClick(item, action) {
            fetch(`${API_URL}/reviews/${item.id}`, {
                method: 'PATCH',
                body: JSON.stringify({
                    status: action,
                }),
                headers: {
                    'Content-Type': 'application/json'
                },
            }).then(response => response.json())
                .then(result => {
                    this.allowed = result.filter(item => item.status === 'allowed');
                    this.pending = result.filter(item => item.status === 'pending');
                    this.$emit('count-pending-reviews', this.pending.length);
                });
        },
        handleDeleteClick(item) {
            if (confirm('Это действие удалит отзыв навсегда. Уверены?')) {
                fetch(`${API_URL}/reviews/${item.id}`, {
                    method: 'DELETE',
                }).then(response => response.json())
                    .then(result => {
                        this.allowed = result.filter(item => item.status === 'allowed');
                    });
            }
        },
    },
    mounted() {
        fetch(`${API_URL}/reviews`)
            .then( (response) => response.json())
            .then((reviews) => {
                this.allowed = reviews.filter(item => item.status === 'allowed');
            });
    }
});

Vue.component('reviews-rejected', {
    template: `
        <div class="reviews">
            <ul class="reviews-list">
                <li class="review" v-for="item in rejected">
                    <figure class="feedback-comment">
                        <img src="../img/comment_photo.png" alt="" class="feedback-comment-photo">
                        <div class="feedback-comment-right">
                            <p class="feedback-comment-text">{{ item.text }}</p>
                            <p class="feedback-comment-name">{{ item.name }}</p>
                            <p class="feedback-comment-city">{{ item.date }}</p>
                        </div>
                    </figure>
                    <div class="review__controls">
                        <button class="review__allow review__button" @click="handleModerateClick(item, 'pending')">Изменить решение</button>
                        <button class="review__reject review__button" @click="handleDeleteClick(item)">Удалить</button>
                    </div>
                </li>
            </ul>
        </div>
    `,
    data() {
        return {
            pending: [],
            rejected: [],
        }
    },
    methods: {
        handleModerateClick(item, action) {
            fetch(`${API_URL}/reviews/${item.id}`, {
                method: 'PATCH',
                body: JSON.stringify({
                    status: action,
                }),
                headers: {
                    'Content-Type': 'application/json'
                },
            }).then(response => response.json())
                .then(result => {
                    this.rejected = result.filter(item => item.status === 'rejected');
                    this.pending = result.filter(item => item.status === 'pending');
                    this.$emit('count-pending-reviews', this.pending.length);
                });
        },
        handleDeleteClick(item) {
            if (confirm('Это действие удалит отзыв навсегда. Уверены?')) {
                fetch(`${API_URL}/reviews/${item.id}`, {
                    method: 'DELETE',
                }).then(response => response.json())
                    .then(result => {
                        this.rejected = result.filter(item => item.status === 'rejected');
                    });
            }
        },
    },
    mounted() {
        fetch(`${API_URL}/reviews`)
            .then( (response) => response.json())
            .then((reviews) => {
                this.rejected = reviews.filter(item => item.status === 'rejected');
            });
    }
});

const appAdmin = new Vue({
    el: '#app-admin',
    data: {
        reviewTabs: [
            {
                name: 'pending', 
                text: 'Ждут модерации',
            },{
                name: 'allowed', 
                text: 'Принятые',
            },{
                name: 'rejected', 
                text: 'Отклоненные',
            }],
        currentReviewTab: {
            name: 'pending', 
            text: 'Ждут модерации',
        },
        countPendindReviews: null,
    },
    methods: {
        getPendindReviewsLength(val) {
            this.countPendindReviews = val;
        }
    },
    computed: {
        currentReviewsComponent() {
            return `reviews-${this.currentReviewTab.name}`
        }
    }
    
});