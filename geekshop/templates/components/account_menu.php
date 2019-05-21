<div class="button header-account-button">
  <?php if (!$activeUser) : ?>
    Вход/Регистрация
  <?php else : ?>
    <?= $activeUser['name'] ?>
  <?php endif; ?>

  <span class="header-account-arrow">▼</span>

  <?php if (!$activeUser) : ?>

  <ul class="header-account-menu">
    <li class="header-account-menu-item" @click="isSignInOpen = !isSignInOpen">Вход</li>
    <li class="header-account-menu-item" @click="isSignUpOpen = !isSignUpOpen">Регистрация</li>
  </ul>

  <?php else : ?>

  <ul class="header-account-menu">
    <li class="header-account-menu-item">Профиль</li>
    <li class="header-account-menu-item">Оформить заказ</li>
    <li class="header-account-menu-item"><a href="<?= $pageAddr ?>?userexit=true">Выход</a></li>
  </ul>

  <?php endif; ?>

</div>

<div class="modal modal-signup" v-if="isSignUpOpen">
  <div class="modal__window">
    <h2 class="modal__title">Регистрация</h2>
    <form method="POST" action="public/sign_up.php" class="signup modal-form">
      <label for="signup-name" class="modal-form__label">Ваше имя</label>
      <input id="signup-name" name="sign-up_name" type="text" class="modal-form__input" required>

      <label for="signup-login" class="modal-form__label">Логин для входа</label>
      <input v-model="login" id="signup-login" name="sign-up_login" type="text" class="modal-form__input" required>

      <label for="signup-pass" class="modal-form__label">Пароль</label>
      <input id="signup-pass" name="sign-up_pass" type="password" class="modal-form__input" required>

      <input type="submit" value="Зарегистрироваться" class="modal-form__submit">
    </form>
    <i class="fas fa-times modal__close" @click="isSignUpOpen = !isSignUpOpen"></i>
  </div>
</div>

<div class="modal modal-signup" v-if="isSignInOpen">
  <div class="modal__window">
    <h2 class="modal__title">Авторизация</h2>
    <form method="POST" action="public/sign_in.php" class="signup modal-form">
      <label for="signup-login" class="modal-form__label">Логин</label>
      <input id="signup-login" name="sign-in_login" type="text" class="modal-form__input" required>
      <label for="signup-pass" class="modal-form__label">Пароль</label>
      <input id="signup-pass" name="sign-in_pass" type="password" class="modal-form__input" required>
      <input type="submit" value="Войти" class="modal-form__submit">
    </form>
    <i class="fas fa-times modal__close" @click="isSignInOpen = !isSignInOpen"></i>
  </div>
</div>