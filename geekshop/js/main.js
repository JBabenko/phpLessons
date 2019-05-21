new Vue({
  el: '#app',
  data: {
    isAddReviewOpen: false,
    isSignUpOpen: false,
    isSignInOpen: false
  },
  mounted() {
    document.querySelector('#app').style.display = 'block';
  }
});